<?php
    include '../Models/DBConfig.php';
    $name="";
    $err_name="";
	$did="";
    $err_did="";
    $dob="";
    $err_dob="";
	$credit="";
    $err_credit="";
    $cgpa="";
    $err_cgpa="";
	$err_db="";
	$hasError = false;

    if(isset($_POST["addStudent"])){
		if(empty($_POST["name"])){
		    $err_name = "Name Requird";
			$hasError = true;
	    }
		else{
		    $name = $_POST["name"];
	    }
		if(empty($_POST["dob"])){
		    $err_dob = "DOB Requird";
			$hasError = true;
	    }
		else{
		    $dob = $_POST["dob"];
	    }
		if(empty($_POST["credit"])){
		    $err_credit = "Credit Requird";
			$hasError = true;
	    }
		else{
		    $credit = $_POST["credit"];
	    }
		if(empty($_POST["cgpa"])){
		    $err_cgpa = "CGPA Requird";
			$hasError = true;
	    }
		else{
		    $cgpa = $_POST["cgpa"];
	    }
		if(empty($_POST["did"])){
		    $err_did = "Dept. Requird";
			$hasError = true;
	    }
		else{
		    $did = $_POST["did"];
	    }
		if(!$hasError){
			$rs = insertStudent($name,$dob,$credit,$cgpa,$did);
			if($rs === true){
				header("Location: AllStudents.php");
			}
			$err_db = $rs;
		}
	}
	
	else if(isset($_POST["updateStudent"])){
		if(empty($_POST["name"])){
		    $err_name = "Name Requird";
			$hasError = true;
	    }
		else{
		    $name = $_POST["name"];
	    }
		if(empty($_POST["dob"])){
		    $err_dob = "DOB Requird";
			$hasError = true;
	    }
		else{
		    $dob = $_POST["dob"];
	    }
		if(empty($_POST["credit"])){
		    $err_credit = "Credit Requird";
			$hasError = true;
	    }
		else{
		    $credit = $_POST["credit"];
	    }
		if(empty($_POST["cgpa"])){
		    $err_cgpa = "CGPA Requird";
			$hasError = true;
	    }
		else{
		    $cgpa = $_POST["cgpa"];
	    }
		if(!$hasError){
			$rs = updateStudent($name,$dob,$credit,$cgpa,$_POST["did"],$_POST["id"]);
			if($rs === true){
				header("Location: AllStudents.php");
			}
			$err_db = $rs;
		}
		
	}
	
	else if(isset($_POST["deleteStudent"])){
		if(empty($_POST["id"])){
		    $err_id = "Id needed";
			$hasError = true;
	    }
		else{
			$id= $_POST["id"];
		}
		if(!$hasError){
			$rs = deleteStudent($id);
			if($rs === true){
				header("Location: AllStudents.php");
			}
			$err_db = $rs;
		}
	}
	
	
	function insertStudent($name,$dob,$credit,$cgpa,$did){
		$query = "insert into students values (NULL,'$name','$dob','$credit','$cgpa', $did)";
		return execute($query);
	}
	
	function getStudents(){
		$query= "select s.*,d.name as 'd_name' from students s left join departments d on s.dept_id = d.id";
		//$query="select * from students";
		$rs = get($query);
		return $rs;
	}
	
	function getStudent($id){
		$query="select * from students where id=$id";
		$rs = get($query);
		return $rs[0];
	}
	
	function deleteStudent($id){
		$query="delete from students where id=$id";
		$rs = execute($query);
		return $rs;
	}
	
	function getDepts(){
		$query="select * from departments";
		$rs = get($query);
		return $rs;
	}
	
	function updateStudent($name,$dob,$credit,$cgpa,$did,$id){
		$query = "update students set name='$name', dob='$dob', credit=$credit, cgpa=$cgpa, dept_id=$did where id=$id";
		$rs = execute($query);
		return $rs;
	}
	
?>