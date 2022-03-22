<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Cursos extends DashController
{
    private $path = 'cursos';

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $cursos = (new \Source\Models\Curso)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cursos", [
            "title" => "Cursos",
            "titleHeader" => "Registros",
            "cursos" =>  $cursos
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/cursos-create", [
            "title" => "Cursos",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {
        // echo '<pre>$data<br />'; print_r($data); echo '</pre>';
        // echo '<pre>$_FILES<br />'; print_r($_FILES); echo '</pre>';die;
        // die;

        $curso = new \Source\Models\Curso;
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);
        $user = \Source\Session\Session::get('user');
        $slug = new \Ausi\SlugGenerator\SlugGenerator();

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        /** LOGO */
        $file = $_FILES['logo'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            $data['logo'] = $uploadImg->upload($file, md5(uniqid(time())));
            // $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['nome']);

        foreach ($data as $key => $value) $curso->{$key} = $value;

        if (!$curso->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $curso->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("cursos.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $curso = (new \Source\Models\Curso())->findById($data['id']);

        echo $this->view->render("theme/admin/cursos-create", [
            "title" => "Posts",
            "titleHeader" => "Edição",
            "curso" => $curso,
        ]);
    }
}
