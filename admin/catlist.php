<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php include '../classes/Category.php';
//create a  category object from category classes
$cat = new Category();

?>

<div class="grid_10">
<div class="box round first grid">
<h2>Category List</h2>
<div class="block">        
	<table class="data display datatable" id="example">
	<thead>
		<tr>
			<th>Serial No.</th>
			<th>Category Name</th>
			<th>Action</th>
		</tr>
	</thead>
<tbody>
<?php
  $getCategory = $cat->getAllCategory();
  if($getCategory){
	  $i = 0;
	  while($result = $getCategory->fetch_assoc()){
	  $i++;
?>
 	<tr class="even gradeC">
			<td><?php echo $i;?></td>
			<td><?php echo $result['catName'];?></td> </td>
			<td><a href="catEdit.php?catid=<?php echo $result['catId'];?>">Edit</a> ||
			 <a onclick="return confirm('Do you want to delete this?')" href="">Delete</a></td>
		</tr>
		<?php } }?>
	</tbody>
</table>
</div>
</div>
</div>

<script type="text/javascript">

$(document).ready(function () {
setupLeftMenu();
$('.datatable').dataTable();
setSidebarHeight();
});
</script>
<?php include 'inc/footer.php'?>
