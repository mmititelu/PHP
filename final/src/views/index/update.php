<h1>Member Account</h1>  

<form method="post" action="update/run" name="loginform" id="loginform" class="form-horizontal">   
<div class="form-group"> 
    <label for="name" class="col-lg-2 control-label">Name:</label>
    <div class="col-lg-10">  
        <input type="text" name="name" class="form-control" id="name" value ="<?= isset($_SESSION['name']) ? $_SESSION['name']: "" ?>" /><br />
    </div>
</div>
<div class="form-group">    
    <label for="email" class="col-lg-2 control-label">Email:</label>
    <div class="col-lg-10"> 
        <input type="email" class="form-control" name="email" id="email" value ="<?= isset($_SESSION['email']) ? $_SESSION['email']:"" ?>"/><br />  
    </div>
</div>
<div class="form-group">     
    <label for="password" class="col-lg-2 control-label">Old Password:</label>
    <div class="col-lg-10"> 
        <input type="password" class="form-control" name="password" id="password"/><br />  
    </div>
</div>
<div class="form-group"> 
    <label for="new_pass" class="col-lg-2 control-label">New Password:</label>
    <div class="col-lg-10"> 
        <input type="password" name="new_pass" id="new_pass" class="form-control"/><br />  
    </div>
</div>
  <!--  <input type="hidden" name="token" id="token" value ="<?= isset($_SESSION['token']) ? $_SESSION['token']:"" ?>" /><br />  
    <input type="hidden" name="tokene" id="tokene" value ="<?= isset($_SESSION['token-expires']) ? $_SESSION['token-expires']:"" ?>" /><br />  
  -->
<div class="form-group">  
    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" name="login" id="login" value="Update" class="btn btn-default" />  
    </div>
</div>

</form>  