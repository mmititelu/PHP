<div class = "hero-unit">
<hr/>
This is the main page welcome!
</div>
<?php if(isset($_SESSION['email'])) { 
      echo "Hello, ". $_SESSION['name'];
    }
?>
