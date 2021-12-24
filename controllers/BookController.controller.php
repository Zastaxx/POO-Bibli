<?php
include_once "models/BookManager.php";
include_once "controllers/GlobalController.php";

class BookController{
    private $bookManager;

    public function __construct(){
        $this->bookManager = new bookManager;
        $this->bookManager->loadingBooks();
    }

    public function displayBooks(){
        $livres = $this->bookManager->getBooks();
        require_once 'views/books.view.php';
        unset($_SESSION['alert']);
    }

    public function displayBook($id){
        $book = $this->bookManager->getBookById($id);
        require_once 'views/oneBook.php';
    }

    public function addBook(){
        require_once 'views/addBook.view.php';
    }

    public function addBookValidate(){
        try{
            if (empty($_POST['titre'])){
                throw new Exception("Il faut un nom de livre");
            } else {
                $titleBook = str_replace(['é','è','ê','à'],['e','e','e','a'],$_POST["titre"]);
            }
            if (isset($_POST['nbpages'])){
                if ($_POST['nbpages'] == 0){
                    throw new Exception("Le nombre de page doit être supérieur a 0");
                }
                $pages=$_POST['nbpages'];
            }
            if (isset($_FILES)){
                $fileName= GlobalController::addImage($_FILES,$titleBook);
            }
            
                $this->bookManager -> addBookDB($titleBook,$pages,$fileName);
                GlobalController::alert("success", "Livre ajouté avec success !");

        } catch (\Exception $e){
                GlobalController::alert("danger", $e->getMessage());
            }
            header("location:".URL."livre");
        
    }

    public function updateBook($id){
        $book = $this->bookManager->getBookById($id);
        require "views/modifier.view.php";
    }

    public function modifierValider(){
        try{
            if (empty($_POST['titre'])){
                throw new Exception("Il faut un nom de livre");
            } else {
                $title = str_replace(['é','è','ê','à'],['e','e','e','a'],$_POST["titre"]);
            }
            if (isset($_POST['nbpages'])){
                if ($_POST['nbpages'] == 0){
                    throw new Exception("Le nombre de page doit être supérieur a 0");
                }
                $nbPages=$_POST['nbpages'];
            }
    
            $currentImage = $_POST['image_name'];
        
            if ($_FILES["image"]['size'] <= 0){
                $fileName = $currentImage;
            } else {
                $fileName = GlobalController::addImage($_FILES,$title);
                unlink('public/images/'.$currentImage);
            }
            
                $this->bookManager -> updateBook($_POST['id'],$title,$nbPages,$fileName);
                GlobalController::alert("success", "Modification effectué");

        } catch (\Exception $e){
            GlobalController::alert("danger", $e->getMessage());
        }
        header("location:".URL."livre");
        
        
    }

    public function deleteBook ($id){
        $image = $this->bookManager->getBookById($id)->getImg_livre();
        $this->bookManager->deleteBook($id);
        unlink('public/images/'.$image);
        header("location:".URL."livre");
    }

    public function erreur(){
        require_once 'views/404.php';
    }

}