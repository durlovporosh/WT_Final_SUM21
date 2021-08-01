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
		    <h3>Edit Student</h3>
			<h5><?php echo $err_db; ?></h5>
			<form action="" method="post">
			    <div>
				    <h4>Student Name</h4>
					<input type = "text" name = "name" value="<?php echo $s["name"];?>"/>
					<input type = "hidden" name = "id" value="<?php echo $id;?>"/>
					<span> <?php echo $err_name; ?> </span>
				</div>
				<div>
				    <h4>DOB</h4>
					<input type = "text" name = "dob" value="<?php echo $s["dob"];?>"/>
					<span> <?php echo $err_dob; ?> </span>
				</div>
				<div>
				    <h4>Credit</h4>
					<input type = "text" name = "credit" value="<?php echo $s["credit"];?>"/>
					<span> <?php echo $err_credit; ?> </span>
				</div>
				<div>
				    <h4>CGPA</h4>
					<input type = "text" name = "cgpa" value="<?php echo $s["cgpa"];?>"/>
					<span> <?php echo $err_cgpa; ?> </span>
				</div>
				<div>
				    <h4>Dept.</h4>
					<select name="did">
				            <option selected><?php echo $s["dept_id"];?></option>
				                <?php
					                foreach($depts as $d){
						                echo "<option value='".$d["id"]."'>".$d["name"]."</option>";
					                }
				                ?>
			            </select>
						<span> <?php echo $err_did; ?> </span>
					<span> <?php echo $err_did; ?> </span>
				</div>
				<div>
					<input type = "submit" name = "updateStudent" value = "Update"/>
				</div>
			</form>
		</div>
	</boady>
    <?php include 'Footer.php'; ?>
</html>