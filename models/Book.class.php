<?php

class Livre
{
    private $id_livre;
    private $titre_livre;
    private $nbr_livre;
    private $img_livre;

    public function __construct($id_livre, $titre_livre, $nbr_livre, $img_livre)
    {
        $this->id_livre = $id_livre;
        $this->titre_livre = $titre_livre;
        $this->nbr_livre = $nbr_livre;
        $this->img_livre = $img_livre;

    }

    /**
     * Get the value of id_livre
     */
    public function getId_livre()
    {
        return $this->id_livre;
    }

    /**
     * Set the value of id_livre
     *
     * @return  self
     */
    public function setId_livre($id_livre)
    {
        $this->id_livre = $id_livre;

        return $this;
    }

    /**
     * Get the value of titre_livre
     */
    public function getTitre_livre()
    {
        return $this->titre_livre;
    }

    /**
     * Set the value of titre_livre
     *
     * @return  self
     */
    public function setTitre_livre($titre_livre)
    {
        $this->titre_livre = $titre_livre;

        return $this;
    }

    /**
     * Get the value of nbr_livre
     */
    public function getNbr_livre()
    {
        return $this->nbr_livre;
    }

    /**
     * Set the value of nbr_livre
     *
     * @return  self
     */
    public function setNbr_livre($nbr_livre)
    {
        $this->nbr_livre = $nbr_livre;

        return $this;
    }

    /**
     * Get the value of img_livre
     */
    public function getImg_livre()
    {
        return $this->img_livre;
    }

    /**
     * Set the value of img_livre
     *
     * @return  self
     */
    public function setImg_livre($img_livre)
    {
        $this->img_livre = $img_livre;

        return $this;
    }

    
}
