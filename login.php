<?php
  include 'header.php';
  //include 'include/function.php';
  if (is_Loggedin() == true) {
    header("Location: index.php");
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
      
    $sql = "SELECT id FROM user WHERE ( name = '$username' or email = '$username' ) and pass = '$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //$active = $row['active'];
      
    $count = mysqli_num_rows($result);
    
    if(empty($username) or empty($password)) {
      echo error("Please input your username and Password!");
    } else if($count == 1) {
      // session_register("username");
      $_SESSION['login_user'] = $username;
        header("Location: entry.php");
      } else {
        echo error("Your Login Name or Password is invalid");
      }
  }
?>
<div style="min-height:370px">
<!-- main content -->
<div class="white lighten-5 valign-wrapper" style="margin-top: 50px;">
  <div class="container valign">
    <div class="row">
      <form action="" method="POST">
        <div class="input-field col s12">
          <input name="username" id="username" type="text" class="validate">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s12">
          <input name="password" id="password" type="text" class="validate">
          <label for="password">Password</label>
        </div>
        <div class="input-field col s12">
          <button type="submit" class="waves-effect waves-light btn" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<?php
  include 'footer.php';
?>