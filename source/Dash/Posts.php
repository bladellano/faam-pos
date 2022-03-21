<?php

namespace Source\Dash;

use Source\Dash\Controller as DashController;
use Source\Models\Category;
use stdClass;

class Posts extends DashController
{
    private $path = 'posts';
    private $categories;

    public function __construct($router)
    {
        parent::__construct($router);
        $this->categories = (new Category())->find()->fetch(true);
    }

    public function home(): void
    {

        $posts = (new \Source\Models\Post)->find()->order('id DESC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/posts", [
            "title" => "Posts",
            "titleHeader" => "Registros",
            "posts" =>  $posts
        ]);
    }

    public function create(): void
    {
        echo $this->view->render("theme/admin/posts-create", [
            "title" => "Posts",
            "titleHeader" => "Cadastrar",
            "categories" => $this->categories
        ]);
    }

    public function register($data): void
    {

        $post = new \Source\Models\Post;
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);
        $user = \Source\Session\Session::get('user');
        $slug = new \Ausi\SlugGenerator\SlugGenerator();

        /** FILE */
        $file = $_FILES['file'] ?? NULL;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['title']);

        foreach ($data as $key => $value) $post->{$key} = $value;

        if (!$post->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Cadastrado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => $this->router->route("posts.home")
        ]);
        return;
    }

    public function edit($data): void
    {

        $post = (new \Source\Models\Post())->findById($data['id']);

        echo $this->view->render("theme/admin/posts-create", [
            "title" => "Posts",
            "titleHeader" => "Edição",
            "post" => $post,
            "categories" => $this->categories
        ]);
    }

    public function update($data): void
    {
        $post = (new \Source\Models\Post())->findById($data['id']);
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $user = \Source\Session\Session::get('user');

        $file = $_FILES['file'] ?? NULL;
        /** FILE */
        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($post->cover)) {
                unlink($post->cover);
                unlink($post->cover_thumb);
            }

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['title']);

        unset($data['id']);

        foreach ($data as $key => $value) $post->{$key} = $value;

        if (!$post->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Alterado com sucesso!");

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/posts/edit/{$post->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $post = (new \Source\Models\Post())->findById($data['id']);

        /* Apaga a imagem principal */

        if (file_exists($post->cover)) {
            unlink($post->cover);
            unlink($post->cover_thumb);
        }

        if (!$post->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $post->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("posts.home");

        return;
    }

    public function removeCover($data)
    {
        $post = (new \Source\Models\Post())->findById($data['id']);

        if (file_exists($post->cover)) {
            unlink($post->cover);
            unlink($post->cover_thumb);
        }

        $post->cover = NULL;
        $post->cover_thumb = NULL;

        if ($post->save())
            flash("success", "Capa excluída com sucesso!");

        header("Location: " . SITE['root'] . "/admin/posts/edit/{$post->id}");
        exit;
    }
}
