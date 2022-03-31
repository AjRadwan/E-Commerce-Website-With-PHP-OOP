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
            $message = "<span class='error'>Something went wrong</span>";
            return $message;   
         }
     }
    }


    public function getAllCategory(){
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }


    public function getCatById($catid){
       $query = "SELECT * FROM tbl_category WHERE catId = '$catid'";
       $result = $this->db->select($query);
       return $result;
    }


    public function UpdateCategory($catName, $catid){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $catid = mysqli_real_escape_string($this->db->link, $catid);

        if(empty($catName)){
             $message = "<span class='error'>Category filed must not be empty!</span>";
            return $message;
    } else{
     $query = "UPDATE tbl_category SET 
       catName = '$catName' WHERE
       catId = '$catid'";
       $updated_row = $this->db->update($query);
       if($updated_row ){
        $message = "<span class='success'>Category Updated Successfully!</span>";
        return $message;
       } else{
        $message = "<span class='error'>Something went wrong</span>";
        return $message;
       }
    }
}

    public function DeleteCategory($delCat){
        $delCat = mysqli_real_escape_string($this->db->link, $delCat);
       $query = "DELETE FROM tbl_category WHERE catId = $delCat";
        $delData = $this->db->delete($query);
        if($delData){
            $message = "<span class='success'>Category Delete Successfully!</span>";
        return $message;
       } else{
        $message = "<span class='error'>Something went wrong</span>";
        return $message;
       }
        }
 }
?>