<?php
function protect($string) {
	$protection = htmlspecialchars(trim($string), ENT_QUOTES);
	return $protection;
}
function success($text) {
	return '<div class="container valign">
		<div class="card green darken-1">
			<div class="col s12">
				<div class="card-content white-text">
	  			'.$text.'
				</div>
	    </div>
		</div>
	</div>';
}

function error($text) {
	return '<div class="container valign">
		<div class="card red darken-1">
			<div class="col s12">
				<div class="card-content white-text">
	  			'.$text.'
				</div>
	    </div>
		</div>
	</div>';
}

function info($text) {
	return '<div class="alert alert-info"><i class="fa fa-info-circle"></i> '.$text.'</div>';
}

function alert($text) {
	return;
}
function is_Loggedin(){
	if (isset($_SESSION['login_user'])) {
			return true;
	} else {
		return false;
	}
}
function get_info($form,$id,$value) {
	global $db;
	$query = $db->query("SELECT * FROM $form WHERE id='$id'");
	$row = $query->fetch_assoc();
	return $row[$value];
}

?>