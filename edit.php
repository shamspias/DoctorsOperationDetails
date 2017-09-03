<?php
  include 'header.php';
  //include 'include/function.php';
  if (is_Loggedin() != true) {
    header("Location: login.php");
  }

    $pp = protect(mysqli_real_escape_string($db,$_GET['me']));

    $id = substr($pp,0,-32);
    //$id = substr($id,6,6);




		if($_SERVER["REQUEST_METHOD"] == "POST") {
	    $operation_name = protect(mysqli_real_escape_string($db,$_POST['operation_name'])); 
	    $reg_num        = protect(mysqli_real_escape_string($db,$_POST['reg_num']));
	    $operation_date = protect(mysqli_real_escape_string($db,$_POST['operation_date']));
	    $disease_name   = protect(mysqli_real_escape_string($db,$_POST['disease_name']));
	    $patient_age    = protect(mysqli_real_escape_string($db,$_POST['patient_age']));
	    $patient_sex    = protect(mysqli_real_escape_string($db,$_POST['patient_sex']));
	    $remarks        = protect(mysqli_real_escape_string($db,$_POST['remarks']));
	    $unit           = protect(mysqli_real_escape_string($db,$_POST['unit']));
	    $follow         = protect(mysqli_real_escape_string($db,$_POST['follow']));

			$newDate = date("Y-m-d", strtotime($operation_date));
	 
	    if(empty($operation_name) or empty($reg_num) or empty($operation_date) or empty($disease_name) or empty($patient_age) or empty($patient_sex)) {
	      echo error("Please input all field!");
	    } else {
	  
	    	$sql = $db->query("UPDATE operation SET operation_name = '$operation_name', reg_num= '$reg_num',  operation_date = '$newDate', disease_name = '$disease_name', patient_sex = '$patient_sex', patient_age = '$patient_age',remarks = '$remarks',unit = '$unit',follow = '$follow' WHERE reg_num = $id");
	    	   

	    	   

			  if($sql){
			    echo success("Operation  update Successfully!");
			    header('Location: result.php');
			  }

			}
		}



?>


            <?php
            //-------------For showing update names------
			
			  		$q = "SELECT * FROM operation WHERE reg_num = '$id'";
					if ($result = $db->query($q)) {
					while ($row = $result->fetch_assoc()) {
						$on  = $row['operation_name']; 
						$da  = $row['operation_date'];
						$reg = $row['reg_num'];
						$ag  = $row['patient_age'];
						$ps  = $row['patient_sex'];
						$de  = $row['disease_name'];
						$re  = $row['remarks'];
						$un  = $row['unit'];
						$fo  = $row['follow'];

						
						}
					}
					 if(!$reg)
					  {
					 	header("Location: result.php");
					  }

			    ?>  

<!-- main content -->
<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
    <div class="row">
      <form action="" method="post">
	      
	      <div class="input-field col s12 m6">
	        <input name="operation_date" id="operation_date" type="DATE" class="validate" value="<?php echo $da ?>">
	        <label for="operation_date"></label>
	      </div>

	      <div class="input-field col s12 m6">
        	<input name="reg_num" id="reg_num" type="text" value="<?php echo $reg ?>">
	        <label for="reg_num">REGISTRATION NUMBER</label>
	      </div>

	      <div class="input-field col s12 m3">
	        <input name="patient_age" id="patient_age" type="text" class="validate" value="<?php echo $ag ?>">
	        <label for="patient_age">PATIENT AGE</label>
	      </div>

	      <div class="input-field col s12 m3">
	      	<select name="patient_sex" id="patient_sex" type="text" >
			      <option value="" disabled>SEX</option>
			      <option value="<?php echo $ps ?>"><?php echo $ps ?></option>
			      <option value="male" >Male</option>
			      <option value="female">Female</option>
			      <option value="other">Other</option>
			    </select>
		  		<label>SEX</label>
	      </div>

	      <div class="input-field col s12 m6">
	        <input name="disease_name" id="disease_name" type="text" class="validate" value="<?php echo $de ?>">
	        <label for="disease_name">DISEASE NAME</label>
	      </div>

	      <div class="input-field col s12 m6">
	        <input name="operation_name" id="operation_name" type="text" value="<?php echo $on ?>">
		    <label for="operation_name">OPERATION NAME</label>
	      </div>



	      <div class="input-field col s12 m3">
	      	<input type="text" class="unit" name="unit" value="<?php echo $un ?>" required>
		  		<label for="unit">UNIT</label>
	      </div>

				
         <div class="input-field col s12 m3">
	      	<input type="text" class="remarks" name="remarks" value="<?php echo $re ?>" >
		  		<label for="remarks">REMARKS</label>
	      </div>


	      <div class="input-field col s12 m12">
	      	<input type="text" class="follow" name="follow" value="<?php echo $fo ?>" >
		  		<label for="follow">FOLLOW UP</label>
	      </div>


	      <div style="" class="input-field col s12">
	      	<button type="submit" onclick="return confirm('Are you sure?')" class="waves-effect waves-light btn" name="add_operation">UPDATE</button>
	    	</div>
    	</form>
    </div>
  </div>
</div>

<?php
  include 'footer.php';
?>