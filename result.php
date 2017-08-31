<?php
  include 'header.php';
  //include 'include/function.php';
  if (is_Loggedin() != true) {
    header("Location: login.php");
  }


	if(isset($_POST['date_from'])) {
		$date_from = "'".protect(mysqli_real_escape_string($db,$_POST['date_from']))."'";
	}
	if(isset($_POST['date_to'])) {
		$date_to = "'".protect(mysqli_real_escape_string($db,$_POST['date_to']))."'";
	}
	/*
	if(isset($_POST['operation_name'])) {
		$operation_name = "'".protect(mysqli_real_escape_string($db,$_POST['operation_name']))."'";
	}

	if(isset($_POST['disease_name'])) {
		$disease_name = "'".protect(mysqli_real_escape_string($db,$_POST['disease_name']))."'";
	}


	if(isset($_POST['reg_num'])) {
		$reg_num = "'".protect(mysqli_real_escape_string($db,$_POST['reg_num']))."'";
	}

	*/
	if(isset($_POST['age_from'])) {
		$age_from = "'".protect(mysqli_real_escape_string($db,$_POST['age_from']))."'";
	}
	if(isset($_POST['age_to'])) {
		$age_to = "'".protect(mysqli_real_escape_string($db,$_POST['age_to']))."'";
	}
	if(isset($_POST['search_box'])) {
		$search_box = "'".protect(mysqli_real_escape_string($db,$_POST['search_box']))."'";
	}


	if(isset($_POST['search'])){


		 if($date_from!="''" && $date_to!="''" && $search_box!="''") {
		  $sql="SELECT * FROM operation WHERE  (reg_num LIKE $search_box OR operation_name LIKE $search_box OR disease_name LIKE $search_box OR patient_sex LIKE $search_box OR remarks LIKE $search_box OR unit LIKE $search_box ) AND operation_date BETWEEN $date_from AND $date_to ORDER BY reg_num";

		  }

		 else if ($date_from!="''" && $date_to!="''" || $search_box!="''") {
		  $sql="SELECT * FROM operation WHERE  reg_num LIKE $search_box OR operation_name LIKE $search_box OR disease_name LIKE $search_box OR patient_sex LIKE $search_box OR remarks LIKE $search_box OR unit LIKE $search_box  OR operation_date BETWEEN $date_from AND $date_to ORDER BY reg_num";

		}
		else if ($age_from!="''" && $age_to!="''" || $search_box!="''") {
		  $sql="SELECT * FROM operation WHERE  reg_num LIKE $search_box OR operation_name LIKE $search_box OR disease_name LIKE $search_box OR patient_sex LIKE $search_box OR remarks LIKE $search_box OR unit LIKE $search_box OR patient_age BETWEEN $age_from AND $age_to ORDER BY reg_num";
		} else {
			$sql = 'SELECT * FROM operation ORDER BY reg_num';



		}
	} else {
	  $sql = 'SELECT * FROM operation ORDER BY reg_num';
		//$result = mysqli_query($db,$sql);
	}
	$query = mysqli_query($db, $sql);
  if (!$query) {
		die ('SQL Error: ' . mysqli_error($db));
	}
	$result = mysqli_query($db,$sql);
?>


<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
    <div class="row">
			<form action="" method="post">
				<div class="row">
			    <div class="col s12">
			    <!--
			     <div class="input-field col s12 m3">
			        <input name="reg_num" id="reg_num" type="text">
			        <label for="reg_num">REGISTRATION NUMBER</label>
					 </div>
			     -->
			      <div class="input-field col s12 m3">
				      <input name="date_from" id="date_from" type="Date" class="validate">
				      <label for="date_from"></label>
				    </div>

			      <div class="input-field col s12 m3">
			        <input name="date_to" id="date_to" type="Date" class="validate">
			        <label for="date_to"></label>
			      </div>
			      <!--
			      <div class="input-field col s12 m3">
			        <input name="operation_name" id="operation_name" type="text">
			        <label for="operation_name">OPERATION NAME</label>
				-->    
					<div class="input-field col s12 m3">
			        <input name="search_box" id="search_box" type="text">
			        <label for="search_box">SEARCH BOX</label>
					      
			      </div>
			      </div>

				    <div class="input-field col s12 m3">
				      <input name="age_from" id="age_from" type="text" class="validate">
				      <label for="age_from">AGE FROM</label>
				    </div>

			      <div class="input-field col s12 m3">
			        <input name="age_to" id="date_to" type="text" class="validate">
			        <label for="age_to">AGE TO</label>
			      </div>
			      <!--
			      <div class="input-field col s12 m3">
			        <input name="disease_name" id="disease_name" type="text">
			        <label for="disease_name">DISEASE</label>
					      
			      </div>
			      -->

			      <div class="input-field col s12 m3">
			        <button type="submit" class="waves-effect waves-light btn" name="search">Search</button>
			      </div>
			    </div>
			  </div>
		  </form>

			<h5>LIST OF OPERATION DETELS</h5>
		  <table class="bordered striped">
		    <thead>
		      <tr>
		      
		        <th>Date</th>
		        <th>REG NUM</th>
		        <th>Age</th>
		        <th>Sex</th>
		        <th>Disease</th>
		        <th>Operation Name</th>
		        <th>Remarks</th>
		        <th>Unit</th>

		        <th>Action</th>
		       </tr>
		    </thead>

		    <tbody>
			    <?php
				  	if(mysqli_num_rows($result) <= 0) {
				    	echo '<tr>  <td>No result to display!</td> </tr>';
				    }
				    $count=0;
			  		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			  		
			        echo '<tr>  <td>'.$row['operation_date'].'</td>';
			        echo '<td>'.$row['reg_num'].'</td>';
			        echo '<td>'.$row['patient_age'].'</td>';
			        echo '<td>'.$row['patient_sex'].'</td>';
			        echo '<td>'.$row['disease_name'].'</td>';
				    echo '<td>'.$row['operation_name'].'</td>';
				    echo '<td>'.$row['remarks'].'</td>';
				    echo '<td>'.$row['unit'].'</td>';
				    
				    	echo '<td><a href="edit.php?me='.$row['reg_num'].'" class="button"><i class="material-icons">mode_edit</i></a>
				    	<a onClick=\'javascript: return confirm("Please confirm deletion");\' href="delete.php?me='.$row['reg_num'].'" class="button">
				    	<i class="material-icons">delete</i></a></td> </tr>';
				    	$count++;
				    }
				    echo "Total Operation = ".$count;
			    ?>  
		    </tbody>
	  	</table>
		</div>
	</div>
</div>

<?php
  include 'footer.php';
?>