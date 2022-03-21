<?php

namespace Source\Dash;

use Source\Mailer;
use CoffeeCode\DataLayer\Connect;
use Source\Security\PasswordHash;
use Source\Controllers\Controller;
use Source\Authenticator\Authenticator;
use Source\Models\UserPasswordRecovery;

class Auth extends Controller
{

    public function home(): void
    {
        echo $this->view->render("theme/admin/login", [
            "title" => SITE['name'],
            "titleHeader" => "Login",
        ]);
    }

    public function forgot(): void
    {
        echo $this->view->render("theme/admin/forgot", [
            "title" => SITE['name'],
            "titleHeader" => "Forgot Password",
        ]);
        exit;
    }

    public function getForgot($data)
    {
        $user = (new \Source\Models\User())->find("email = :email", "email={$data['email']}")->fetch();

        if (!$user) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => 'Usuário/e-mail inexistente!'
            ]);
            exit;
        } else {

            $recovery = new UserPasswordRecovery();
            $recovery->id_user = $user->id;
            $recovery->ip = $_SERVER["REMOTE_ADDR"];

            $recovery->save();

            $code = openssl_encrypt($recovery->data()->id, 'AES-128-CBC', pack("a16", SECRET), 0, pack("a16", SECRET_IV));
            $code = base64_encode($code);

            $link = SITE['root'] . "/admin/forgot/reset/$code";

            $message = $this->view->render("theme/admin/email-forgot", ["name" => $user->first_name, "link" => $link]);

            $mailer = new Mailer($user->email, $user->first_name, "Redefinir senha - " . MAIL['mail_from_name'], utf8_decode($message));

            if ($mailer->send()) {

                echo $this->ajaxResponse("message", [
                    "type" => "success",
                    "message" => 'E-mail enviado com sucesso! Verifique sua caixa de entrada.'
                ]);
                exit;
            } else {

                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => 'Não foi possível recuperar a senha.'
                ]);
                exit;
            }
        }
    }

    public function validForgotDecrypt($data)
    {
        extract($data);
        $code = base64_decode($code);
        $idRecovery = openssl_decrypt($code, 'AES-128-CBC', pack("a16", SECRET), 0, pack("a16", SECRET_IV));

        if (!$idRecovery) {
            flash("error", "Não foi possível recuperar a senha.");
            header("Location: " . $this->router->route("auth.forgot"));
            exit;
        }

        $connect = Connect::getInstance();

        $SQL = "SELECT * FROM pos_userspasswordsrecoveries pupr 
        INNER JOIN pos_users pu ON pu.id = pupr.id_user 
        WHERE pupr.id = {$idRecovery}
        AND pupr.dt_recovery IS NULL 
        AND DATE_ADD(pupr.dt_register, INTERVAL 30 MINUTE) >= NOW() ORDER BY pupr.id DESC LIMIT 1";

        $result = $connect->query($SQL)->fetch();

        if (!$result) {
            flash("error", "Não foi possível recuperar a senha. Tempo de recuperação expirou.");
            header("Location: " . $this->router->route("auth.forgot"));
            exit;
        } else {
            echo $this->view->render("theme/admin/forgot-reset", [
                "title" => SITE['name'],
                "titleHeader" => "Forgot Password Reset",
                "id_user" => $result->id_user,
                "id" => $idRecovery,

            ]);
            exit;
        }
    }

    public function forgotReset($data)
    {
        extract($data);

        if (strlen($password) < 6) {
            echo $this->ajaxResponse("message", [
                "type" => "alert",
                "message" => 'A senha não poderá ser menor 6 dígitos.'
            ]);
            return;
        }

        $user = (new \Source\Models\User())->findById($id_user);
        $user->password = PasswordHash::hash($password);

        if (!$user->save()) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => $user->fail()->getMessage()
            ]);
            return;
        } else {

            $recovery = (new UserPasswordRecovery())->findById($id);
            $recovery->dt_recovery = date('Y-m-d H:m:s');
            $recovery->save();

            echo $this->ajaxResponse("message", [
                "type" => "success",
                "message" => 'Senha alterada com sucesso!'
            ]);
            return;
        }
    }

    public function login($data)
    {
        $user = new \Source\Models\User();
        $authenticator = new Authenticator($user);

        if (!$authenticator->login($data)) {
            flash("error", "Usuário ou senha não conferem!");
            header("Location: " . $this->router->route("auth.login"));
            exit;
        }

        flash("success", "Logado com sucesso!");

        header("Location: " . $this->router->route("admin.home"));
        exit;
    }

    public function logout()
    {
        (new Authenticator())->logout();
        flash("success", "Deslogado com sucesso!");
        header("Location: " . $this->router->route("auth.login"));
        exit;
    }
}
