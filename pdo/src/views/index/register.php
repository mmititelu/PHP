 <h1>Register</h1>  
      
        <p>Please enter your details below to register.</p>  
      
        <form method="post" action="User/register" name="registerform" id="registerform" class="form-horizontal">
            <div class="form-group">
                <label for="name"  class="col-lg-2 control-label" >Name:</label>
                <div class="col-lg-10"> 
                    <input type="text" name="name" id="name" class="form-control" /><br />  
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-lg-2 control-label" >Password:</label>
                 <div class="col-lg-10"> 
                    <input type="password" name="password" id="password" class="form-control" /><br />  
                 </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email Address:</label>
                <div class="col-lg-10">
                    <input type="email" name="email" id="email" class="form-control"/><br />  
                </div>
            </div>
            <div class="form-group">
                <label for="conf_email" class="col-lg-2 control-label" >Confirm Email Address:</label>
                <div class="col-lg-10">
                    <input type="email" name="conf_email" id="conf_email" class="form-control" /><br />  
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">  
                    <input type="submit" name="register" id="register" value="Register" class="btn btn-default"/>  
                </div>
            </div>
        </form> 
