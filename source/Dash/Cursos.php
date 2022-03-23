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
        $curso = new \Source\Models\Curso;
        $uploadFile = new \CoffeeCode\Uploader\File('storage/attachments', $this->path);
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

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed()))
            $data['logo'] = $uploadImg->upload($file, md5(uniqid(time())));

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['nome']);
        $nomeAnexos = $data['nomeAnexos'];
        unset($data['nomeAnexos']);

        foreach ($data as $key => $value) $curso->{$key} = $value;

        if (!$curso->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $curso->fail()->getMessage()
            ]);
            return;
        }

        /** Upload dos Anexos do Curso */
        if (isset($_FILES['anexos']) && current($_FILES['anexos']['error']) == 0) {

            $dataAnexos = normalizeFiles($_FILES['anexos']);

            for ($i = 0; $i < count($dataAnexos); $i++)
                $dataAnexos[$i]['nomeAnexo'] = $nomeAnexos[$i];

            foreach ($dataAnexos as $anexo) {
                $oAnexo = new \Source\Models\Anexo;
                $oAnexo->nome = $anexo['nomeAnexo'];
                $oAnexo->nome_arquivo = $anexo['name'];
                $oAnexo->arquivo = $uploadFile->upload($anexo, md5(uniqid(time())));
                $oAnexo->id_curso = $curso->data()->id;
                $oAnexo->save();
            }
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("cursos.home")
        ]);

        return;
    }

    public function removerAnexo($data)
    {
        $anexo = (new \Source\Models\Anexo())->findById($data['id']);

        if (file_exists($anexo->arquivo))
            unlink($anexo->arquivo);
        $anexo->destroy();

        header("Location: " .  SITE['root'] . "/admin/cursos/edit/{$data['curso']}");
        exit;
    }

    public function edit($data): void
    {

        $curso = (new \Source\Models\Curso())->findById($data['id']);
        $anexos = (new \Source\Models\Anexo())->find("id_curso = :id_curso", "id_curso={$data['id']}")->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cursos-create", [
            "title" => "Cursos",
            "titleHeader" => "Edição",
            "curso" => $curso,
            "anexos" => $anexos,
        ]);
    }
}
