<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login / Signup</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" type="image/png" href="images/logo.png"/>
  </head>
  <body>
    <div class="login-wrap">
    	<div class="login-html">
    		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
    		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    		<div class="login-form">
    			<div class="sign-in-htm">
            <form action="login_checker.php" method="post">
              <div class="group">
      					<label for="user" class="label">Username</label>
      					<input id="user" name="username" type="text" class="input">
      				</div>
      				<div class="group">
      					<label for="pass" class="label">Password</label>
      					<input id="pass" name="password" type="password" class="input" data-type="password">
      				</div>
      				<div class="group">
      					<input type="submit" class="button" value="Sign In">
      				</div>
      				<div class="hr"></div>
      				<div class="foot-lnk">
      					<a href="#forgot">Forgot Password?</a>
      				</div>
            </form>
    			</div>
    			<div class="sign-up-htm">
            <form action="signup.php" method="post">
              <div class="group">
      					<label for="user" class="label">Email</label>
      					<input id="user" name="email" type="text" class="input">
      				</div>
              <div class="group">
                <label for="pass" class="label">Name</label>
                <input id="pass" name="name" type="text" name="name" class="input" >
              </div>
              <div class="group">
      					<label for="pass" class="label"> City </label>
      					<input id="pass" name="city" type="text" class="input">
              </div>
              <div class="group">
                <label for="pass" class="label"> State </label>
                <input id="pass" name="state" type="text" class="input">
              </div>
              <div class="group">
                <label for="pass" class="label"> Address </label>
                <input id="pass" name="address" type="text" class="input">
              </div>
              <div class="group">
                <label for="pass" class="label"> Contact No </label>
                <input id="pass" name="contact" type="text" class="input">
              </div>
      				<div class="group">
      					<label for="pass" class="label">Password</label>
      					<input id="pass" name="password" type="password" class="input" data-type="password">
      				</div>


      				<div class="group">
      					<input type="submit" name = "register" value"1" class="button" value="Sign Up">
      				</div>
      				<div class="foot-lnk">
      					<label for="tab-1">Already Member?</a>
      				</div>
            </form>
    			</div>
    		</div>
    	</div>
    </div>
  </body>
</html>
