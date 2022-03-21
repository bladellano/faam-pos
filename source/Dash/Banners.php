<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;

class Banners extends DashController
{
    private $path = 'banners';

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {

        $banners = (new \Source\Models\Banner)->find()->order('updated_at DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/banners", [
            "title" => "Banners",
            "titleHeader" => "Registros",
            "banners" =>  $banners
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/banners-create", [
            "title" => "Banners",
            "titleHeader" => "Cadastrar",
        ]);
    }

    public function register($data): void
    {
  
        $banner = new \Source\Models\Banner;
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
        $data['slug'] = $slug->generate($data['title']);

        foreach ($data as $key => $value) $banner->{$key} = $value;
  
        if (!$banner->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("banners.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $banner = (new \Source\Models\Banner())->findById($data['id']);

        echo $this->view->render("theme/admin/banners-create", [
            "title" => "Banners",
            "titleHeader" => "Edição",
            "banner" => $banner,
        ]);
    }

    public function changeOrderBanner($data)
    {
        $banner = (new \Source\Models\Banner())->findById($data['id']);

        if($banner){

            $banner->registration_order = 1;

            if (!$banner->save()) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => $banner->fail()->getMessage()
                ]);
                return;
            }

            flash("success", "Ordem alterada com sucesso!");

            header("Location: " . SITE['root'] . "/admin/banners");
    
            return;
        }

    }

    public function update($data): void
    {

        $banner = (new \Source\Models\Banner())->findById($data['id']);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($banner->image)) {
                unlink($banner->image);
                unlink($banner->image_thumb);
            }

            $data['image'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['image_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['slug'] = $slug->generate($data['title']);
        unset($data['id']);

        foreach ($data as $key => $value) $banner->{$key} = $value;

        if (!$banner->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/banners/edit/{$banner->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $banner = (new \Source\Models\Banner())->findById($data['id']);

        if (file_exists($banner->image)) {
            unlink($banner->image);
            unlink($banner->image_thumb);
        }

        if (!$banner->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $banner->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("banners.home");

        return;
    }
}
