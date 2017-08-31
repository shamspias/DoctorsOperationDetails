<?php
	ob_start();
	session_start();
	//error_reporting(0);
  include 'include/connect.php';
  include 'include/function.php';
  ?>
<!DOCTYPE html>
<html>
  <head>
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="">
    <meta name="author" content="DeVerse">
    <meta name="author_uri" content="http://alamin.me">
    <link rel="icon" href="https://material.io/icons/static/images/icons-192x192.png">
  </head>
  <body>

    <div id="nav">
      <div class="navbar-fixed">
        <nav class="blue-grey darken-4">
          <div class="nav-wrapper container">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
            <a href="index.php" class="brand-logo">National Institute Of ENT</a>
            <ul class="right hide-on-med-and-down">
            <?php if(is_Loggedin()): ?>
              <li><a href="entry.php" class="tooltipped" data-position="button" data-delay="25" data-tooltip="ADD"><i class="material-icons">note_add</i></a></li>
              <li><a href="result.php" class="tooltipped" data-position="button" data-delay="25" data-tooltip="SEARCH OPERATION DETAILS"><i class="material-icons">search</i></a></li>
              <li><a href="logout.php" class="tooltipped" data-position="button" data-delay="25" data-tooltip="LOGOUT"><i class="material-icons">power_settings_new</i></a></li>
            <?php else: ?>
              <li><a href="login.php" class="tooltipped" data-position="button" data-delay="25" data-tooltip="LOGIN"><i class="material-icons">input</i></a></li>
            <?php endif; ?>
            </ul>
          </div>
        </nav>
      </div>
    </div>

    <ul id="slide-out" class="side-nav">
      <div class="nav">
        <nav class="blue-grey darken-4">
          <div class="nav-wrapper container">
            <a href="" class="side-logo" style="color: white; position: absolute; color: #fff; display: inline-block; font-size: 2.1rem; padding: 0; white-space: nowrap;">ENT</a>
          </div>
        </nav>
      </div>

      <div class="user-view">
        <li>
        <?php if(is_Loggedin()): ?>
          <a href="logout.php" class=""><i class="material-icons">note_add</i>ADD</a>
          <a href="result.php" class=""><i class="material-icons">search</i>SEARCH</a>
          <a href="logout.php" class=""><i class="material-icons">power_settings_new</i>LOGOUT</a>
        <?php else: ?>
          <a href="login.php" class=""><i class="material-icons">input</i>LOGIN</a>
        <?php endif; ?>
        </li>
      </div>
    </ul>