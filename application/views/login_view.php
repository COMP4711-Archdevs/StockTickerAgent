<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Login</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
<div class="container">
<div class="row">
        <div class="col-md-6 col-md-offset-3">
        </div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User Login</h4>
            </div>
            <div class="panel-body">
                <form action="/Login/login" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="player">Username</label>
                    <input class="form-control" name="username" placeholder="Your Username" type="text" />
                    <span class="text-danger"></span>
                </div>

                <div class="form-group">
                    <label for="subject">Password</label>
                    <input class="form-control" name="password" placeholder="Password" type="password" />
                    <span class="text-danger"></span>
                </div>

                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-default">Login</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
