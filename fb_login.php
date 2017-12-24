<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <script src="jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
        
        <meta name="google-signin-client_id" content="575336555180-34h4kasbv5o5v07qk8ecj41v83s6codu.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>

        <script src="fb_loginapi.js"></script>
        <script src="gg_lg.js"></script>
        
    </head>
    <body>
        
        <div>
            <div id="form_login">
                <form action="login.php" method="POST">
                    <fieldset>
                        <legend>Login:</legend>
                        <div class="form-group">
                            <label for="username">Email address</label>
                            <input type="text" class="form-control" name="username" require autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" require placeholder="Password">
                        </div>
                        <p><input type="submit" class="btn btn-primary" value="Login">
                        <input type="submit" class="btn btn-primary" value="register" href="register.php"></p>
                        <center>
                        <div>
                        <p><fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button></p>
                        <p><div class="g-signin2" data-onsuccess="onSignIn"></div></p>
                        </div>
                        </center>
                    </fieldset>
                    
                </form>
            </div>
        </div>
    </body>
</html>