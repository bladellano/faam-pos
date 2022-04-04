<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Parceiros extends DashController
{
    private $path = 'parceiros';

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $parceiros = (new \Source\Models\Parceiro)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/parceiros", [
            "title" => "Parceiros",
            "titleHeader" => "Registros",
            "parceiros" =>  $parceiros
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/parceiros-create", [
            "title" => "Parceiros",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {

        $parceiro = new \Source\Models\Parceiro;
        $user = \Source\Session\Session::get('user');
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {
            $data['image'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['image_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['name']);

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
            "url" => $this->router->route("parceiros.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $parceiro = (new \Source\Models\Parceiro())->findById($data['id']);

        echo $this->view->render("theme/admin/parceiros-create", [
            "title" => "Parceiros",
            "titleHeader" => "Edição",
            "parceiro" => $parceiro,
        ]);
    }

    public function update($data): void
    {

        $parceiro = (new \Source\Models\Parceiro())->findById($data['id']);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($parceiro->image)) {
                unlink($parceiro->image);
                unlink($parceiro->image_thumb);
            }

            $data['image'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['image_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['slug'] = $slug->generate($data['name']);
        unset($data['id']);

        foreach ($data as $key => $value) $parceiro->{$key} = $value;

        if (!$parceiro->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $parceiro->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/parceiros/edit/{$parceiro->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $parceiro = (new \Source\Models\Parceiro())->findById($data['id']);

        if (file_exists($parceiro->image)) {
            unlink($parceiro->image);
            unlink($parceiro->image_thumb);
        }

        if (!$parceiro->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $parceiro->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("parceiros.home");

        return;
    }
}
