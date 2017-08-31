<?php
  include 'header.php';
  //include 'include/function.php';
  if (is_Loggedin() != true) {
    header("Location: login.php");
  }

	if($_SERVER["REQUEST_METHOD"] == "POST") {
    $operation_name = protect(mysqli_real_escape_string($db,$_POST['operation_name'])); 
    $reg_num        = protect(mysqli_real_escape_string($db,$_POST['reg_num']));
    $operation_date = protect(mysqli_real_escape_string($db,$_POST['operation_date']));
    $disease_name   = protect(mysqli_real_escape_string($db,$_POST['disease_name']));
    $patient_age    = protect(mysqli_real_escape_string($db,$_POST['patient_age']));
    $patient_sex    = protect(mysqli_real_escape_string($db,$_POST['patient_sex']));
    $remarks        = protect(mysqli_real_escape_string($db,$_POST['remarks']));
    $unit           = protect(mysqli_real_escape_string($db,$_POST['unit']));

		$newDate = date("Y-m-d", strtotime($operation_date));
 
    if(empty($operation_name) or empty($reg_num) or empty($operation_date) or empty($disease_name) or empty($patient_age) or empty($patient_sex)) {
      echo error("Please input all field!");
    } else {
    	$sql = $db->query("INSERT operation (operation_name, reg_num,  operation_date, disease_name, patient_sex, patient_age,remarks,unit) VALUES ('$operation_name', '$reg_num', '$newDate', '$disease_name', '$patient_sex', '$patient_age','$remarks','$unit')");
		  if($sql){
		    echo success("Operation  added Successfully!");
		  }
		}
	}



?>


<!-- main content -->
<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
    <div class="row">
      <form action="" method="post">
	      
	      <div class="input-field col s12 m6">
        	<input name="reg_num" id="reg_num" type="text">
	        <label for="reg_num">REGISTRATION NUMBER</label>
	      </div>

	      <div class="input-field col s12 m6">
	        <input name="operation_name" id="operation_name" type="text">
		    <label for="operation_name">OPERATION NAME</label>
	      </div>

	      <div class="input-field col s12 m6">
	        <input name="disease_name" id="disease_name" type="text" class="validate">
	        <label for="disease_name">DISEASE NAME</label>
	      </div>
          <div class="input-field col s12 m6">
	        <input name="operation_date" id="operation_date" type="DATE" class="validate">
	        <label for="operation_date"></label>
	      </div>

	      <div class="input-field col s12 m3">
	        <input name="patient_age" id="patient_age" type="text" class="validate">
	        <label for="patient_age">PATIENT AGE</label>
	      </div>

	      <div class="input-field col s12 m3">
	      	<select name="patient_sex" id="patient_sex" type="text">
			      <option value="" disabled>SEX</option>
			      <option value="male" selected>Male</option>
			      <option value="female">Female</option>
			      <option value="other">Other</option>
			    </select>
		  		<label>SEX</label>
	      </div>
				
         <div class="input-field col s12 m3">
	      	<input type="text" class="remarks" name="remarks" required>
		  		<label for="operation_date">REMARKS</label>
	      </div>
	       <div class="input-field col s12 m3">
	      	<input type="text" class="unit" name="unit" required>
		  		<label for="unit">UNIT</label>
	      </div>

	      <div style="" class="input-field col s12">
	      	<button  type="submit" class="waves-effect waves-light btn" name="add_operation">SUBMIT</button>
	    	</div>
    	</form>
    </div>
  </div>
</div>

<?php
  include 'footer.php';
?>