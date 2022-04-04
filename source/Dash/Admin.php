<?php

namespace Source\Dash;

use Source\Models\Car;
use Source\Models\Lead;
use Source\Models\Post;
use Source\Models\User;
use Source\Models\Anexo;
use Source\Models\Banner;
use CoffeeCode\DataLayer\Connect;
use Source\Dash\Controller as DashController;

class Admin extends DashController
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function home(): void
    {
        $postsQtd = (new Post())->find()->count();

        echo $this->view->render("theme/admin/home", [
            "title" => "Dash",
            "products" =>  [],
            "titleHeader" => "Home",
            "postsQtd" => $postsQtd,
        ]);
    }

    public function getAttachments()
    {
        $anexos = (new Anexo())->find()->fetch(true);

        $connect = Connect::getInstance();
        $SQL = "SELECT id, nome, nome_arquivo, arquivo, created_at FROM pos_anexos WHERE id_curso IS NULL";
        $anexos = ($connect->query($SQL))->fetchAll();

        $anexos = array_map(function ($item) {
            $item->created_at = convertDatePtbr($item->created_at);
            return $item;
        }, $anexos);

        $retorno['data'] = $anexos;

        print(json_encode($retorno));
    }

    public function deleteAttachments($data)
    {
        $anexo = (new Anexo())->findById($data['id']);

        if (file_exists($anexo->arquivo))
            unlink($anexo->arquivo);

        if ($anexo->destroy()) {
            print json_encode([
                "success" => 1,
                "message" => "Anexo excluído com sucesso!"
            ]);
            return;
        } else {
            print json_encode([
                "success" => 0,
                "message" => "Anexo excluído com sucesso!"
            ]);
            return;
        }
    }

    public function attachments($data)
    {
        $file = $_FILES['arquivo'];

        if (in_array("", $data) || $file['error'] > 0) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Preencha todos os campos"
            ]);
            return;
        }

        if ($data['tipo'] == "File") :
            $uploadFile = new \CoffeeCode\Uploader\File('storage/attachments', "site");
        else :
            $uploadFile = new \CoffeeCode\Uploader\Image('storage/attachments', "site");
        endif;

        try {
            $uploaded = $uploadFile->upload($file, md5(uniqid(time())));
        } catch (\Exception $e) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $e->getMessage()
            ]);
            return;
        }

        $anexo = new Anexo();
        $anexo->nome = $data['nome'];
        $anexo->nome_arquivo = $file['name'];
        $anexo->arquivo = $uploaded;

        if ($anexo->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => "Anexo gravado com sucesso!"
            ]);
            return;
        } else {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $anexo->fail()->getMessage()
            ]);
            return;
        }
    }

    /**
     * @param $data
     */
    public function error($data): void
    {
        $error = "";
        echo $this->view->render("theme/admin/404", [
            "title" => "Erro {$error}",
            "error" => $error
        ]);
    }
}
