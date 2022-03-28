<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Areas extends DashController
{
    private $path = 'areas';

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $areas = (new \Source\Models\Area)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/areas", [
            "title" => "Áreas",
            "titleHeader" => "Registros",
            "areas" =>  $areas
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/areas-create", [
            "title" => "Áreas",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {

        $parceiro = new \Source\Models\Area;
        $user = \Source\Session\Session::get('user');
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {
            $data['imagem'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['nome']);

        foreach ($data as $key => $value) $parceiro->{$key} = $value;

        if (!$parceiro->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $parceiro->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("areas.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $area = (new \Source\Models\Area())->findById($data['id']);

        echo $this->view->render("theme/admin/areas-create", [
            "title" => "Áreas",
            "titleHeader" => "Edição",
            "area" => $area,
        ]);
    }

    public function update($data): void
    {

        $area = (new \Source\Models\Area())->findById($data['id']);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($area->imagem)) {
                unlink($area->imagem);
                unlink($area->imagem_thumb);
            }

            $data['imagem'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['imagem_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['slug'] = $slug->generate($data['nome']);
        unset($data['id']);

        foreach ($data as $key => $value) $area->{$key} = $value;

        if (!$area->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $area->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/areas/edit/{$area->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $area = (new \Source\Models\Area())->findById($data['id']);

        if (file_exists($area->imagem)) {
            unlink($area->imagem);
            unlink($area->imagem_thumb);
        }

        if (!$area->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $area->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("areas.home");

        return;
    }
}
