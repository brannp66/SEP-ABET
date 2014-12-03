<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ABET Accreddidation</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src='js/IndexJS.js'></script>
  </head>

  <body>
    <div class = "pageTitle">
      <h1>ABET Tallys</h1>
    </div>
    <div id="loginContainer">
      <form id="login" action = "validateUserLogin.py" method = "post">
        <div class="logEmail">
            <label>Username:</label>
            <input type="username" name = "username" id="username"/>
        </div>
        <div class="logPass"> 
            <label>Password:</label>
            <input type="password" id="logPass" name = "password"/> 
        </div>
        <div class = "loginButton">
          <input type="submit" value="Login" name="signIn" id="signIn" />
        </div>
      </form>
    </div> 
  </body>
</html>
