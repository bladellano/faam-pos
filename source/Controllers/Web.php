<?php

namespace Source\Controllers;

use Source\Seo;
use Source\Mailer;
use Source\Models\Area;
use Source\Models\Lead;
use Source\Models\Anexo;
use Source\Models\Curso;
use Source\Models\Banner;
use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Paginator\Paginator;
use Source\Models\Parceiro;
use Source\Models\Post;

/**
 * Class Web
 * @package Source\Controllers
 */
class Web extends Controller
{

    /**
     * Web constructor.
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function search(): void
    {
        $connect = Connect::getInstance();
        $SQL = "SELECT * FROM pos_cursos";
        $cursos = ($connect->query($SQL))->fetchAll();
        $cursos = array_column($cursos, "nome");
        print json_encode($cursos);
    }

    public function home(): void
    {
        $banners = (new Banner)->find()->order("updated_at DESC")->fetch(true) ?? [];
        $areas = (new Area)->find()->order("nome ASC")->fetch(true) ?? [];
        $noticias = (new Post())->find("type = :type", "type=post")->order("updated_at DESC")->limit(3)->fetch(true);
        $agendas = (new Post())->find("type = :type", "type=schedule")->order("updated_at DESC")->limit(3)->fetch(true);
        $parceiros = (new Parceiro())->find()->fetch(true);

        $sobre = (new Post())->find("slug = :slug", "slug=sobre")->fetch();
        $fiquePorDentro = (new Post())->find("id = :id", "id=30")->fetch();

        $connect = Connect::getInstance();
        $SQL = "SELECT pa.slug as area, pc.* FROM pos_cursos pc LEFT JOIN pos_areas pa ON pa.id = pc.id_area";
        $cursos = ($connect->query($SQL))->fetchAll();

        $head = (new Seo())->render(
            SITE['name'],
            SITE['desc'],
            SITE['root'],
            asset("images/favicon.png"),
        );

        echo $this->view->render("theme/site/home", [
            "banners" => $banners,
            "areas" => $areas,
            "cursos" => $cursos,
            "noticias" => $noticias,
            "agendas" => $agendas,
            "parceiros" => $parceiros,
            "head" => $head,
            "sobre" => $sobre,
            "fiquePorDentro" => $fiquePorDentro,
        ]);
    }

    public function page($data): void
    {

        $params = http_build_query([
            'slug' => $data['slug'],
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        /** Página não encontrada */
        if (!$page) {
            header("Location: " . $this->router->route("web.home"));
            exit;
        }

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/favicon.png'),
        );

        echo $this->view->render("theme/site/page", [
            "page" => $page,
            "head" => $head
        ]);
    }

    public function cursosArea($data): void
    {
        $limit = 8;

        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $search = filter_input(INPUT_GET, "search", FILTER_DEFAULT);

        $connect = Connect::getInstance();

        $SQL = "SELECT
        pa.nome as area,
        pc.id as id,
        pc.slug as slug,
        pc.nome as nome
        FROM pos_areas pa INNER JOIN pos_cursos pc ON pa.id = pc.id_area 
        WHERE TRUE 
        AND pa.slug = '{$data['slug']}' ";

        $statement = $connect->query($SQL);
        $count = $statement->rowCount();

        $paginator = new Paginator(SITE['root'] . "/cursos-area/{$data['slug']}?search={$search}&page=", "Página", ["Primeira página", "«"], ["Última página", "»"]);

        $paginator->pager($count, $limit, $page, 2);

        $SQL .= " LIMIT {$paginator->limit()} OFFSET {$paginator->offset()} ";

        $statement = $connect->query($SQL);
        $cursos =  $statement->fetchAll();

        echo $this->view->render("theme/site/cursos-area", [
            "head" => "",
            "title" => 'Todos os cursos por área - '. (isset($cursos[0]->area) ?$cursos[0]->area : '*') ,
            "cursos" => $cursos,
            "pages" => $paginator->render()
        ]);
    }

    public function cursos(): void
    {

        $curso = new Curso();
        $limit = 8;

        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $search = filter_input(INPUT_GET, "search", FILTER_DEFAULT);
        $ensino = filter_input(INPUT_GET, "ensino", FILTER_DEFAULT);

        $terms = NULL;
        $params = NULL;

        if (!empty($ensino)) :
            $terms  = "ensino LIKE :ensino";
            $params = "ensino=%{$ensino}%";
        endif;

        if (!empty($search)) :
            $terms  = "nome LIKE :nome";
            $params = "nome=%{$search}%";
        endif;

        $paginator = new Paginator(SITE['root'] . "/cursos?search={$search}&page=", "Página", ["Primeira página", "«"], ["Última página", "»"]);

        $paginator->pager($curso->find($terms, $params)->count(), $limit, $page, 2);

        $cursos = $curso->find($terms, $params)->limit($paginator->limit())->offset($paginator->offset())->fetch(true) ?? [];

        echo $this->view->render("theme/site/cursos", [
            "head" => "",
            "title" => 'Todos os Cursos',
            "cursos" => $cursos,
            "pages" => $paginator->render()
        ]);
    }

    public function posts(): void
    {
        $post = new Post();
        $limit = 8;

        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);

        $parse = (parse_url($_SERVER['REQUEST_URI']));
        $parse['path'] = str_replace('/', '', $parse['path']);

        switch ($parse['path']):
            case 'noticias':
                $type = 'post';
                break;
            case 'agendas':
                $type = 'schedule';
                break;
        endswitch;

        $terms = NULL;
        $params = NULL;

        if (!empty($type)) :
            $terms  = "type = :type";
            $params = "type={$type}";
        endif;

        $paginator = new Paginator(SITE['root'] . "/" . $parse['path'] . "?page=", "Página", ["Primeira página", "«"], ["Última página", "»"]);

        $paginator->pager($post->find($terms, $params)->count(), $limit, $page, 2);

        $posts = $post->find($terms, $params)->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . ucfirst($parse['path']),
            SITE['desc'] . ". Todos os posts",
            DS . $parse['path'],
            asset('images/favicon.png'),
        );

        echo $this->view->render("theme/site/posts", [
            "head" => [],
            "title" => ucfirst($parse['path']),
            "posts" => $posts,
            "pages" => $paginator->render(),
            "head" => $head
        ]);
    }

    public function getCurso($data): void
    {
        $curso = (new Curso())->find("slug = :slug", "slug={$data['slug']}")->fetch();
        $anexos = (new Anexo())->find("id_curso = :id_curso", "id_curso={$curso->id}")->fetch(true) ?? [];

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $curso->nome,
            SITE['desc'] . $curso->sobre_o_curso,
            DS . $curso->slug,
            asset('images/favicon.png'),
        );

        echo $this->view->render("theme/site/curso", [
            "head" => [],
            "curso" => $curso,
            "anexos" => $anexos,
            "head" => $head
        ]);
    }

    public function showBanner($data): void
    {
        $banner = (new Banner())->find("slug = :slug", 'slug=' . $data['slug'])->fetch() ?? [];

        echo $this->view->render("theme/site/banner", [
            "title" => "Banner",
            "banner" => $banner,
        ]);
    }

    public function showPosts($data): void
    {
        $post = (new Post())->find("slug = :slug", 'slug=' . $data['slug'])->fetch() ?? [];

        $title = $post->type == 'post' ? 'Notícias' : 'Agendas';

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $post->title,
            SITE['desc'] . $post->description,
            DS . $post->slug,
            asset('images/favicon.png'),
        );

        echo $this->view->render("theme/site/post", [
            "title" =>  $title,
            "post" => $post,
            "head" => $head
        ]);
    }

    public function showParceiros($data): void
    {
        $parceiro = (new Parceiro())->find("slug = :slug", 'slug=' . $data['slug'])->fetch() ?? [];

        echo $this->view->render("theme/site/parceiro", [
            "title" =>  "Parceiros",
            "parceiro" => $parceiro,
        ]);
    }

    public function sendFormContact($data)
    {
        $data['ciente'] = (isset($data['ciente'])) ? "SIM" : "NÃO";

        $captcha = $data['g-recaptcha-response'];

        $res = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".reCAPTCHA['servidor']."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));

        unset($data['g-recaptcha-response']);

        if (in_array("", $data) || $data['ciente'] == "NÃO" || !$res->success) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos ou marque corretament o reCAPTCHA"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message, $data['typeForm']);

        $mailer = new Mailer($data['email'], $data['nome'], "Formulário de Contato - {$data['typeForm']}", utf8_decode($message));

        if (!$mailer->send()) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Problema ao enviar e-mail!"
            ]);
            return;
        } else {

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Enviado com sucesso!"
            ]);
            return;
        }
    }

    private function leadCapture($data, $message, $type = 'form'): bool
    {
        $lead = new Lead();

        $lead->name = $data['nome'];
        $lead->email = $data['email'];
        $lead->content = base64_encode($message);
        $lead->origin = $_SERVER['HTTP_REFERER'];
        $lead->type = $type;

        if ($lead->save())
            return true;
        return false;
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = filter_var($data["errcode"], FILTER_VALIDATE_INT);

        echo $this->view->render("theme/error", [
            "title" => "Erro {$error}",
            "error" => $error
        ]);
    }
}
