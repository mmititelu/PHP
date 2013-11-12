<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Test</title>
        <link rel ="stylesheet" href ="<?php echo URL; ?>public/css/dist/css/bootstrap.min.css" />
    </head>
    <body>
        <div id="header">
            
            <br/><br/>
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">  
                  <ul class="nav navbar-nav">  
                       <li><a href="<?php echo URL; ?>index" class="navbar-brand">Index</a></li>
                     <!--  <li><a href="<?php echo URL; ?>help">Help</a></li> -->
                       <li><a href="<?php echo URL; ?>login">Login</a></li>
                       <li><a href="<?php echo URL; ?>register">Register</a></li>
                       <li><a href="<?php echo URL; ?>forgot">Forgot</a></li>
                       <?php if(isset($_SESSION['email'])) { 
                            print_r($_SESSION['email']);
                            //echo $_SESSION['email']; 
                            ?>
                       <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                       <li><a href="<?php echo URL; ?>modify">Update</a></li>
                            <?php } ?>
                  </ul>
            </nav>
            
            
        </div>
        
        <div class="container">
            
