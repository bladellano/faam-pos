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

        $erro = [];
        /** Upload dos Anexos do Curso */
        if (isset($_FILES['anexos']) && current($_FILES['anexos']['error']) == 0) {

            $dataAnexos = normalizeFiles($_FILES['anexos']);

            for ($i = 0; $i < count($dataAnexos); $i++)
                $dataAnexos[$i]['nomeAnexo'] = $nomeAnexos[$i];

            foreach ($dataAnexos as $anexo) {
                $oAnexo = new \Source\Models\Anexo;
                $oAnexo->nome = $anexo['nomeAnexo'];
                $oAnexo->nome_arquivo = $anexo['name'];

                try {
                    $oAnexo->arquivo = $uploadFile->upload($anexo, md5(uniqid(time())));
                    $oAnexo->id_curso = $curso->id;
                    $oAnexo->save();
                } catch (\Exception $e) {
                    $erro[] = "'{$anexo['nomeAnexo']}': {$e->getMessage()}";
                }
            }
        }

        if (count($erro)) {
            flash("alert", "Criado com sucesso! <br>Mas o arquivo " . implode(", ", $erro) . ". <br>Não é permitido arquivos de imagens em documentos.");
        } else {
            flash("success", "Criado com sucesso!");
        }

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

        if ($anexo->destroy())
            flash("success", "Anexo excluído com sucesso!");

        header("Location: " .  SITE['root'] . "/admin/cursos/edit/{$data['curso']}");
        exit;
    }

    public function removerLogo($data)
    {
        $curso = (new \Source\Models\Curso())->findById($data['curso']);

        if (file_exists($curso->logo))
            unlink($curso->logo);

        $curso->logo = NULL;

        if ($curso->save())
            flash("success", "Logo excluída com sucesso!");

        header("Location: " . SITE['root'] . "/admin/cursos/edit/{$curso->id}");
        exit;
    }

    public function removerCover($data)
    {
        $curso = (new \Source\Models\Curso())->findById($data['curso']);

        if (file_exists($curso->cover)) :
            unlink($curso->cover);
            unlink($curso->cover_thumb);
        endif;

        $curso->cover = NULL;
        $curso->cover_thumb = NULL;

        if ($curso->save())
            flash("success", "Capa excluída com sucesso!");

        header("Location: " . SITE['root'] . "/admin/cursos/edit/{$curso->id}");
        exit;
    }

    public function edit($data): void
    {

        $curso = (new \Source\Models\Curso())->findById($data['id']);
        $anexos = (new \Source\Models\Anexo())->find("id_curso = :id_curso", "id_curso={$data['id']}")->order('id ASC')->fetch(true) ?? [];

        echo $this->view->render("theme/admin/cursos-create", [
            "title" => "Cursos",
            "titleHeader" => "Edição",
            "curso" => $curso,
            "anexos" => $anexos,
        ]);
    }

    public function update($data): void
    {

        $curso = (new \Source\Models\Curso())->findById($data['id']);
        $uploadImg = new \CoffeeCode\Uploader\Image(STORAGE, $this->path);
        $slug = new \Ausi\SlugGenerator\SlugGenerator();
        $user = \Source\Session\Session::get('user');
        $uploadFile = new \CoffeeCode\Uploader\File('storage/attachments', $this->path);

        /** FILE */
        $file = $_FILES['file'] ?? NULL;
        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($curso->cover)) :
                unlink($curso->cover);
                unlink($curso->cover_thumb);
            endif;

            $data['cover'] = $uploadImg->upload($file, md5(uniqid(time())));
            $data['cover_thumb'] = $uploadImg->upload($file, "thumb_" . md5(uniqid(time())), 600);
        }

        /** LOGO */
        $file = $_FILES['logo'] ?? NULL;
        if (!$file['error'] && in_array($file["type"], $uploadImg::isAllowed())) {

            if (file_exists($curso->logo))
                unlink($curso->logo);

            $data['logo'] = $uploadImg->upload($file, md5(uniqid(time())));
        }

        $curso->id_user = $user['id'];
        $curso->slug = $slug->generate($data['nome']);

        $nomeAnexos = $data['nomeAnexos'] ?? NULL;

        unset($data['nomeAnexos']);
        unset($data['id']);

        foreach ($data as $key => $value) $curso->{$key} = $value;

        if (!$curso->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $curso->fail()->getMessage()
            ]);
            return;
        }

        $erro = [];
        /** Upload dos Anexos do Curso */
        if (isset($_FILES['anexos']) && current($_FILES['anexos']['error']) == 0) {

            $dataAnexos = normalizeFiles($_FILES['anexos']);

            for ($i = 0; $i < count($dataAnexos); $i++)
                $dataAnexos[$i]['nomeAnexo'] = $nomeAnexos[$i];

            foreach ($dataAnexos as $anexo) {
                $oAnexo = new \Source\Models\Anexo;
                $oAnexo->nome = $anexo['nomeAnexo'];
                $oAnexo->nome_arquivo = $anexo['name'];

                try {
                    $oAnexo->arquivo = $uploadFile->upload($anexo, md5(uniqid(time())));
                    $oAnexo->id_curso = $curso->id;
                    $oAnexo->save();
                } catch (\Exception $e) {
                    $erro[] = "'{$anexo['nomeAnexo']}': {$e->getMessage()}";
                }
            }
        }

        if (count($erro)) {
            flash("alert", "Alterado com sucesso! <br>Mas o arquivo " . implode(", ", $erro) . ". <br>Não é permitido arquivos de imagens em documentos.");
        } else {
            flash("success", "Alterado com sucesso!");
        }

        echo $this->ajaxResponse("redirect", [
            "url" => SITE['root'] . "/admin/cursos/edit/{$curso->id}"
        ]);

        return;
    }

    public function delete($data): void
    {
        $curso = (new \Source\Models\Curso())->findById($data['id']);
        $anexos = (new \Source\Models\Anexo())->find("id_curso = :id_curso", "id_curso={$data['id']}")->fetch(true) ?? [];

        foreach ($anexos as $a) :
            unlink($a->arquivo);
            (new \Source\Models\Anexo())->findById($a->id)->destroy();
        endforeach;

        if (file_exists($curso->cover)) :
            unlink($curso->cover);
            unlink($curso->cover_thumb);
        endif;

        if (file_exists($curso->logo)) :
            unlink($curso->logo);
        endif;

        if (!$curso->destroy()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $curso->fail()->getMessage()
            ]);
            return;
        }

        flash("success", "Registro excluído com sucesso!");

        $this->router->redirect("cursos.home");

        return;
    }
}
