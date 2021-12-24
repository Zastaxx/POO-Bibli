<?php
require_once "Book.class.php";
require_once "Model.php";

class BookManager extends Model
{
    private $books;

    public function addBook($livre)
    {
        $this->books[] = $livre;
    }

    /**
     * Get the value of books
     */
    public function getBooks()
    {
        return $this->books;
    }

    public function loadingBooks()
    {
        $sql = "SELECT * FROM livres";
        $req = $this->getDB()->prepare($sql);
        $req->execute();
        $livres = $req->fetchALL(PDO::FETCH_OBJ);
        foreach ($livres as $livre) {
            $myLivre = new Livre($livre->idLivre, $livre->nom, $livre->nbPages, $livre->image,);
            $this->addBook($myLivre);
        }
    }

    public function getBookById($id)
    {
        foreach ($this->books as $book) {
            if ($book->getId_livre() == $id) {
                return $book;
            }
        }
    }

    public function addBookDB($titleBook, $pages, $fileName)
    {
        $sql = "INSERT INTO livres(nom,nbpages,image) VALUES(:name,:pages,:filename)";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":name" => $titleBook,
            ":pages" => $pages,
            ":filename" => $fileName,
        ]);
    }

    public function updateBook($id,$title,$nbPages,$image){
        $sql = "UPDATE livres set nom = :title, nbPages=:nbPages, image=:image WHERE idLivre=:id";
        $req = $this->getDB()->prepare($sql);
        $result = $req->execute([
            ":title"=>$title,
            ":nbPages"=>$nbPages,
            ":image"=>$image,
            ":id"=>$id
        ]);
    }

    public function deleteBook($id){
        $sql = "DELETE FROM livres WHERE livres.idLivre = :livre";
        $req = $this->getDB()->prepare($sql);
            $result = $req->execute([
                ":livre"=>$id,
            ]);

    }
}
