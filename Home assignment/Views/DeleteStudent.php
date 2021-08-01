<?php include 'MainHeader.php'; ?>
<?php include 'AdminHeader.php'; ?>
<?php include '../Controllers/StudentControll.php'; ?>
<?php
    $id = $_GET["id"]; 
    $s = getStudent($id); 
	$depts = getDepts();
?>
<html>
    <head></head>
	<boady>
	    <div align="center">
		    <h3>Delete Student</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <div>
				    <h4>Student Name</h4>
					<input type = "text" name = "name" value="<?php echo $s["name"];?>"/>
					<input type = "hidden" name = "id" value="<?php echo $id;?>"/>
					<span> <?php echo $err_name; ?> </span>
				</div>
				<div>
					<input type = "submit" name = "deleteStudent" value = "Delete"/>
				</div>
			</form>
		</div>
	</boady>
    <?php include 'Footer.php'; ?>
</html>