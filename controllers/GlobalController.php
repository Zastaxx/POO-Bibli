<?php

abstract class GlobalController {
    private  $globalManager; 
    
    public static function addImage($image,$titreL){
        $succes = true;
        if(!empty($image)){
            if ($image["image"]["size"] > 1000000) {
                throw new Exception("Votre fichier image est trop lourd");
                $succes=false;
            }
            $extension = pathinfo($image['image']['name'])['extension'];
            if ($extension !='jpeg' && $extension!='png' && $extension !='jpg'){
                throw new Exception("Erreur, le fichier n'est pas dans le bon format");
                
                $succes=false;
            }
        }
        if ($succes){
            $fileName = strtolower($titreL.'.'.$extension);
            $fileName = str_replace(' ','_',$fileName);
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/".$fileName);
            return $fileName;
        }
    }

    public static function throwMultipleErrors($error){
        if(!empty($error)){
            $error = json_encode($error);
            throw new Exception($error);
        }
    }

    public static function alert($type,$message){
        $_SESSION['alert'] = [
            "type" => $type,
            "msg" => $message
        ];
        return $_SESSION['alert'];
    }
    
}