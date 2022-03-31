<?php
 include_once '../lib/Database.php';
 include_once '../helpers/Format.php';
 
 class Category{
     private $db;
     private $fm;
 
     public function __construct(){
       $this->db = new Database();
       $this->fm = new Format();
     }

     public function catInsert($catName){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if(empty($catName)){
             $message = "<span class='error'>Category filed must not be empty!</span>";
            return $message;
     }else{
         $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
         $catinsert = $this->db->insert($query);
         if($catinsert){
             $message = "<span class='success'>Category Inserted Successfully!</span>";
             return $message;
         }else{
            $message = "<span class='success'>Something went wrong</span>";
            return $message;
           
         }
     }
    }
 }
?>