<?php
session_start();
include_once 'controllers/BookController.controller.php';

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

$bookController = new BookController();


try {
    if (!isset($_GET['page'])) {
        require_once "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require_once "views/accueil.view.php";
                break;
            case "livre":
                if (empty($url[1])) {
                    $bookController->displayBooks();
                } elseif ($url[1] == "lire") {
                    $bookController->displayBook($url[2]);
                } elseif ($url[1] == "ajouter") {
                    $bookController->addBook();
                } elseif ($url[1] == "modifier") {
                    $bookController->updateBook($url[2]);
                } elseif ($url[1] == "supprimer") {
                    $bookController->deleteBook($url[2]);
                } elseif ($url[1] == "validate") {
                    $bookController->addBookValidate();
                    header('location:'.URL.'livre');
                } elseif ($url[1]=="modifierOK"){
                    $bookController->modifierValider();
                } else {
                    throw new Exception ("404 - page not found");
                }
                break;
                default: throw new Exception ("La page n'existe pas");
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
