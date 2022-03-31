<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/Category.php';
//geting catid from ctlist Edit link"
if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
    echo "<script>window.loaction = 'catlist.php' </script>";
}else{
 $catid = $_GET['catid'];
}


//create a  category object from category classes
$cat = new Category();

// if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
//     $catName = ($_POST['catName']);

//     $insertCategory = $cat->catInsert($catName);
//  }
?>

<div class="grid_10">
<div class="box round first grid">
    <h2>Add New Category</h2>
    <div class="block copyblock"> 
      <?php
        if(isset($insertCategory)){
            echo $insertCategory;
        }

        //creating  a new method for getting catID
     $getCat = $cat->getCatById($catid);
     if($getCat){
         while($result = $getCat->fetch_assoc()){
      ?>  
        <form method="post" action="">
        <table class="form">					
            <tr>
                <td>
                    <input type="text" name="catName" placeholder="Enter Category Name..." class="medium" value="<?php echo $result['catName']?>"/>
                </td>
            </tr>
            <tr> 
                <td>
                    <input type="submit" name="submit" Value="Save" />
                </td>
            </tr>
        </table>
        </form>
        <?php } }?>
    </div>
</div>
</div>
<?php include 'inc/header.php';?>

