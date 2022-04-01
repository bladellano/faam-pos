<?php

namespace Source\Controllers;

use Source\Seo;
use Source\Mailer;
use Source\Models\Car;
use Source\Models\Area;
use Source\Models\Lead;
use Source\Models\Anexo;
use Source\Models\Curso;
use Source\Models\Banner;
use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Paginator\Paginator;
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

    /**
     * Monta tela principal
     */
    public function home(): void
    {
        $banners = (new Banner)->find()->order("updated_at DESC")->fetch(true) ?? [];
        $areas = (new Area)->find()->order("nome ASC")->fetch(true) ?? [];

        $noticias = (new Post())->find("type = :type", "type=post")->limit(3)->fetch(true);
        $agendas = (new Post())->find("type = :type", "type=schedule")->limit(3)->fetch(true);

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
            "head" => $head
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
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "page" => $page,
            "head" => $head
        ]);
    }

    public function cursos(): void
    {
        $curso = new Curso();
        $limit = 8;

        $page = filter_input(INPUT_GET, "page", FILTER_VALIDATE_INT);
        $search = filter_input(INPUT_GET, "search", FILTER_DEFAULT);

        $terms = NULL;
        $params = NULL;

        if (!empty($search)) :
            $terms  = "nome LIKE :nome";
            $params = "nome=%{$search}%";
        endif;

        $paginator = new Paginator(SITE['root'] . "/cursos?search={$search}&page=","Página", ["Primeira página", "«"], ["Última página", "»"]);

        $paginator->pager($curso->find($terms, $params)->count(), $limit, $page, 2);

        $cursos = $curso->find($terms, $params)->limit($paginator->limit())->offset($paginator->offset())->fetch(true);

        echo $this->view->render("theme/site/cursos", [
            "head" => [],
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
        $parse['path'] = str_replace('/', '', $parse['path'] );

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

        echo $this->view->render("theme/site/posts", [
            "head" => [],
            "title" => ucfirst($parse['path']),
            "posts" => $posts,
            "pages" => $paginator->render()
        ]);
    }

    public function getCurso($data): void
    {
        $curso = (new Curso())->find("slug = :slug", "slug={$data['slug']}")->fetch();
        $anexos = (new Anexo())->find("id_curso = :id_curso", "id_curso={$curso->id}")->fetch(true) ?? [];

        /** Seo */
        /* $head = (new Seo())->render(
            SITE['name'] . " | " . $car->nome_titulo,
            SITE['desc'] . $car->nome_subtitulo,
            DS . $car->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        ); */

        echo $this->view->render("theme/site/curso", [
            "head" => [],
            "curso" => $curso,
            "anexos" => $anexos
        ]);
    }


    public function contactUs(): void
    {
        $params = http_build_query([
            'slug' => 'fale-conosco',
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        /** Seo */
        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "head" =>  $head,
            "page" => $page,
            "showForm" => 'form-contact-us.php',
            "typeForm" => 'fluid'
        ]);
        exit;
    }

    public function partsAndAccessories()
    {
        $params = http_build_query([
            'slug' => 'pecas-e-acessorios',
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "head" => $head,
            "page" => $page,
            "showForm" => 'form-scheduling.php',
            "typeForm" => 'container'
        ]);
        exit;
    }

    public function testDrive(): void
    {

        $params = http_build_query([
            'slug' => 'test-drive',
            'type' =>  'page'
        ]);

        $page = (new \Source\Models\Post)->find("slug = :slug AND type = :type", $params)->fetch() ?? [];

        $head = (new Seo())->render(
            SITE['name'] . " | " . $page->title,
            SITE['desc'] . $page->description,
            DS . $page->slug,
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/page", [
            "head" => $head,
            "page" => $page,
            "showForm" => 'form-scheduling.php',
            "typeForm" => 'container'
        ]);
        exit;
    }

    /** Métodos Car */
    public function semiNew(): void
    {
        $title = "Semi-novos";

        $head = (new Seo())->render(
            SITE['name'] . " | " . $title,
            SITE['desc'] . "Semi-novos de veículos",
            DS . "semi-novos",
            asset('images/image-default-vega-kia.jpeg', 'site', 0),
        );

        echo $this->view->render("theme/site/semi-novos", [
            "head" => $head
        ]);
    }

    public function news(): void
    {
        $newsCars = (new Car())->find("novo = :novo", 'novo=1')->fetch(true) ?? [];

        echo $this->view->render("theme/site/novos", [
            "title" => "Novos",
            "newsCars" => $newsCars,
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

        echo $this->view->render("theme/site/post", [
            "title" =>  $title,
            "post" => $post,
        ]);
    }
    public function sendFormContactUs($data)
    {

        $data['aceita_receber_email'] = isset($data['aceita_receber_email']) ? 'SIM' : 'NÃO';
        $data['aceita_receber_sms'] = isset($data['aceita_receber_sms']) ? 'SIM' : 'NÃO';

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

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

    public function sendFormScheduling($data)
    {

        if (in_array("", $data)) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

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

    public function sendFormContact($data)
    {
        $data['ciente'] = (isset($data['ciente'])) ? "SIM" : "NÃO";
        $data['usar_veiculo_usado'] = (isset($data['usar_veiculo_usado'])) ? "SIM" : "NÃO";
        $data['financiamento'] = (isset($data['financiamento'])) ? "SIM" : "NÃO";

        if (in_array("", $data) || $data['ciente'] == "NÃO") {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        $message = $this->view->render("theme/site/email-sent-default", ["data" => $data]);

        /** Captura lead */
        $this->leadCapture($data, $message);

        #print($message); die;

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
