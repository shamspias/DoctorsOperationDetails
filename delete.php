<?php
  include 'header.php';
  if (is_Loggedin() != true) {
    header("Location: login.php");
  }

$id = $_GET['me'];



$sql = "DELETE FROM operation WHERE reg_num = $id"; 

if (mysqli_query($db, $sql)) {
    mysqli_close($db);
    header('Location: result.php');
    exit;
} else {
    echo "Error deleting record";
}
?>

<?php
  include 'footer.php';
?>