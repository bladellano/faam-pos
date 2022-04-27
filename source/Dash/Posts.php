<?php

namespace Source\Dash;

use Source\Models\Category;
use CoffeeCode\DataLayer\Connect;
use Source\Dash\Controller as DashController;

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

        $posts = array_map(function ($item) {

            switch ($item->type):
                case 'page':
                    $item->type = '<span class="badge bg-info">Página</span>';
                    break;
                case 'schedule':
                    $item->type = '<span class="badge bg-warning">Agenda</span>';
                    break;
                case 'post':
                    $item->type = '<span class="badge bg-success">Notícia</span>';
                    break;
            endswitch;

            return $item;
        }, $posts);

        echo $this->view->render("theme/admin/posts", [
            "title" => "Posts",
            "titleHeader" => "Registros",
            "posts" =>  $posts
        ]);
    }

    public function list()
    {
        $connect = Connect::getInstance();

        $query = '';
        $output = [];

        $_GET["draw"] = !isset($_GET["draw"]) ? 1 : $_GET["draw"];

        $query .= "SELECT 
        pos_posts.*, 
        articles_categories.category FROM pos_posts  
        LEFT JOIN articles_categories  
        ON articles_categories.id = pos_posts.id_category ";

        /** Valor buscado */
        $query .= ' WHERE TRUE ';

        if (isset($_GET["search"]["value"]) && !isset($_REQUEST['form_filter'])) {
            $query .= ' AND pos_posts.type LIKE "%' . $_GET["search"]["value"] . '%" ';
            $query .= ' OR pos_posts.title LIKE "%' . $_GET["search"]["value"] . '%" ';
            $query .= ' OR pos_posts.slug LIKE "%' . $_GET["search"]["value"] . '%" ';
            $query .= ' OR pos_posts.description LIKE "%' . $_GET["search"]["value"] . '%" ';
        }

        if (isset($_REQUEST['form_filter'])) {
            extract($_REQUEST['form_filter'][0]);
            $query .= " AND pos_posts.{$name} = '{$value}' ";
        }

        $queryTotal = $query;

        if (isset($_GET['order'])) {
            $query .= 'ORDER BY ' . ($_GET['order']['0']['column'] + 1) . ' ' . $_GET['order']['0']['dir'] . ' ';
        } else {
            $query .= 'ORDER BY pos_posts.id DESC ';
        }

        if (isset($_GET['length']) && $_GET['length'] != -1) {
            $query .= 'LIMIT ' . $_GET['start'] . ', ' . $_GET['length'];
        }

        $statement = $connect->query($query);
        $total = ($connect->query( $queryTotal ))->rowCount();
        $result = $statement->fetchAll();
        $data = [];
        $filtered_rows = $statement->rowCount();

        foreach ($result as $row) {

            switch ($row->type):
                case 'page':
                    $row->type = '<span class="badge bg-info">Página</span>';
                    break;
                case 'schedule':
                    $row->type = '<span class="badge bg-warning">Agenda</span>';
                    break;
                case 'post':
                    $row->type = '<span class="badge bg-success">Notícia</span>';
                    break;
            endswitch;

            $subArray = [];
            $subArray[] = $row->id;
            $subArray[] = $row->title;
            $subArray[] = $row->description;
            $subArray[] = $row->slug;
            $subArray[] = $row->type;
            $subArray[] = '<div align="center"><input type="radio" name="changeOrder" onChange=\'window.location.href = "'.SITE['root'] .'/admin/posts/change-order/'.$row->id.'"\'></div>';
            $subArray[] = convertDatePtbr($row->created_at);
            $subArray[] = convertDatePtbr($row->updated_at);
            $subArray[] = '<a href="posts/edit/'.$row->id.'" class="btn btn-default btn-sm" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a> 
                            <a onclick="return confirm(\'Deseja realmente excluir este registro?\')" href="posts/delete/'.$row->id.'" class="btn btn-default btn-sm" title="Excluir">
                                <i class="fas fa-trash-alt"></i>
                            </a>';
            $data[] = $subArray;
        }

        $output = [
            "draw"              =>  intval($_GET["draw"]),
            "recordsTotal"      =>  $filtered_rows,
            "recordsFiltered"   =>  $total,
            "data"              =>  $data
        ];

        echo json_encode($output);
        exit;
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
        $file = $_FILES['file'] ?? null;

        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {
            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        $data['id_user'] = $user['id'];
        $data['slug'] = $slug->generate($data['title']);

        foreach ($data as $key => $value) {
            $post->{$key} = $value;
        }

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

        /** Somente para o "Fique por dentro" */
        $disabled = "";
        if ($post->id == 30) {
            $disabled = "style='pointer-events: none;background-color: #ddd;color: #999;'";
        }


        echo $this->view->render("theme/admin/posts-create", [
            "title" => "Posts",
            "titleHeader" => "Edição",
            "post" => $post,
            "categories" => $this->categories,
            "disabled" =>  $disabled
        ]);
    }

    public function changeOrder($data)
    {
        $post = (new \Source\Models\Post())->findById($data['id']);

        if ($post) {
            $post->updated_at = date('Y-m-d H:m:s');

            if (!$post->save()) {
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => $post->fail()->getMessage()
                ]);
                return;
            }

            flash("success", "Ordem alterada com sucesso!");

            header("Location: " . SITE['root'] . "/admin/posts");

            return;
        }
    }

    public function update($data): void
    {
        $post = (new \Source\Models\Post())->findById($data['id']);
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $user = \Source\Session\Session::get('user');

        $file = $_FILES['file'] ?? null;
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

        foreach ($data as $key => $value) {
            $post->{$key} = $value;
        }

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

        $post->cover = null;
        $post->cover_thumb = null;

        if ($post->save()) {
            flash("success", "Capa excluída com sucesso!");
        }

        header("Location: " . SITE['root'] . "/admin/posts/edit/{$post->id}");
        exit;
    }
}
