<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
<div class="row">
    <div class="col-md-6 col-md-offset-3"></div>
</div>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>User Registration</h4>
            </div>
            <div class="panel-body">
                <form action="/Register/register" name="registrationform" method="post" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input class="form-control" name="fname" placeholder="Your First Name" type="text" />
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject">Password</label>
                        <input class="form-control" name="password" placeholder="Password" type="password" />
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label for="subject">Confirm Password</label>
                        <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-default">Signup</button>
                        <button name="cancel" type="reset" class="btn btn-default">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>

