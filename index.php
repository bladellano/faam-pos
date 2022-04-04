<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

ob_start();

session_start();

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$app = new Router(site());
$app->namespace("Source\Controllers");

/**
 * WEB
 */

$app->group(null);
$app->get("/", "Web:home", "web.home");
$app->get("/{slug}", "Web:page", "web.page");

/** Busca */
$app->get("/busca", "Web:search", "web.search");

/** Páginas da Web */
$app->get("/cursos-de-extensao", "Web:cursos", "web.cursos");

$app->get("/cursos", "Web:cursos", "web.cursos");
$app->get("/cursos/{slug}", "Web:getCurso", "web.getcurso");
$app->get("/banner/{slug}", "Web:showBanner", "web.showbanner");
$app->get("/parceiros/{slug}", "Web:showParceiros", "web.showparceiros");

$app->get("/noticias", "Web:posts", "web.posts");
$app->get("/agendas", "Web:posts", "web.posts");

$app->get("/noticias/{slug}", "Web:showPosts", "web.showposts");
$app->get("/agendas/{slug}", "Web:showPosts", "web.showposts");

/** Forms */
$app->post("/form-submission", "Web:sendFormContact", "web.sendformcontact");

/**
 * ADMIN
 */

$app->group('admin')->namespace('Source\Dash');

$app->get("/", "Admin:home", "admin.home");

$app->get("/{errcode}", "Admin:error", "admin.error");

/** Anexos */
$app->post("/attachments", "Admin:attachments", "admin.attachments");
$app->get("/attachments", "Admin:getAttachments", "admin.getattachments");
$app->get("/attachments/{id}", "Admin:deleteAttachments", "admin.deleteattachments");



/** Login */
$app->get("/login", "Auth:home", "auth.home");
$app->post("/login", "Auth:login", "auth.login");
$app->get("/logout", "Auth:logout", "auth.logout");

/** Forgot */
$app->get("/forgot", "Auth:forgot", "auth.forgot");
$app->post("/forgot", "Auth:getForgot", "auth.getforgot");
$app->get("/forgot/reset/{code}", "Auth:validForgotDecrypt", "auth.validforgotdecrypt");
$app->post("/forgot/reset", "Auth:forgotReset", "auth.forgotreset");

/** Posts */
$app->get("/posts", "Posts:home", "posts.home");
$app->get("/posts/create", "Posts:create", "posts.create");
$app->post("/posts/register", "Posts:register", "posts.register");
$app->post("/posts/update/{id}", "Posts:update", "posts.update");
$app->get("/posts/delete/{id}", "Posts:delete", "posts.delete");
$app->get("/posts/edit/{id}", "Posts:edit", "posts.edit");
$app->get("/posts/remove-cover/{id}", "Posts:removeCover", "posts.removecover");

/** Parceiros */
$app->get("/parceiros", "Parceiros:home", "parceiros.home");
$app->get("/parceiros/create", "Parceiros:create", "parceiros.create");
$app->post("/parceiros/register", "Parceiros:register", "parceiros.register");
$app->post("/parceiros/update/{id}", "Parceiros:update", "parceiros.update");
$app->get("/parceiros/delete/{id}", "Parceiros:delete", "parceiros.delete");
$app->get("/parceiros/edit/{id}", "Parceiros:edit", "parceiros.edit");

/** Áreas */
$app->get("/areas", "Areas:home", "areas.home");
$app->get("/areas/create", "Areas:create", "areas.create");
$app->post("/areas/register", "Areas:register", "areas.register");
$app->post("/areas/update/{id}", "Areas:update", "areas.update");
$app->get("/areas/delete/{id}", "Areas:delete", "areas.delete");
$app->get("/areas/edit/{id}", "Areas:edit", "areas.edit");

/** Cursos */
$app->get("/cursos", "Cursos:home", "cursos.home");
$app->get("/cursos/create", "Cursos:create", "cursos.create");
$app->post("/cursos/register", "Cursos:register", "cursos.register");
$app->post("/cursos/update/{id}", "Cursos:update", "cursos.update");
$app->get("/cursos/delete/{id}", "Cursos:delete", "cursos.delete");
$app->get("/cursos/edit/{id}", "Cursos:edit", "cursos.edit");
$app->get("/cursos/remover-anexo/{id}/{curso}", "Cursos:removerAnexo", "cursos.removeranexo");
$app->get("/cursos/remover-logo/{curso}", "Cursos:removerLogo", "cursos.removerlogo");
$app->get("/cursos/remover-cover/{curso}", "Cursos:removerCover", "cursos.removercover");

/** Banners */
$app->get("/banners", "Banners:home", "banners.home");
$app->get("/banners/create", "Banners:create", "banners.create");
$app->post("/banners/register", "Banners:register", "banners.register");
$app->post("/banners/update/{id}", "Banners:update", "banners.update");
$app->get("/banners/delete/{id}", "Banners:delete", "banners.delete");
$app->get("/banners/edit/{id}", "Banners:edit", "banners.edit");
/** Banners - Métodos internos */
$app->get("/banners/change-order-banner/{id}", "Banners:changeOrderBanner", "banners.changeorderbanner");

/** Users */
$app->get("/users", "Users:home", "users.home");
$app->get("/users/create", "Users:create", "users.create");
$app->post("/users/store", "Users:register", "users.register");
$app->post("/users/update/{id}", "Users:update", "users.update");
$app->get("/users/delete/{id}", "Users:delete", "users.delete");
$app->get("/users/edit/{id}", "Users:edit", "users.edit");
$app->post("/users/replacement-password", "Users:replacementPassword", "users.replacementpassword");

/** Leads */
$app->get("/leads", "Leads:home", "leads.home");
/**
 * ERRORS
 */
$app->group("ops");
$app->get("/{errcode}", "Web:error", "web.error");

/**
 * ROUTE PROCESS
 */

$app->dispatch();
/**
 * ERRORS PROCESS
 */

if ($app->error()) {
    $app->redirect("web.error", ['errcode' => $app->error()]);
}

ob_end_flush();
