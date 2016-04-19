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
                <h4>User Avatar Upload</h4>
            </div>
            <div class="panel-body">
                <?php echo form_open_multipart('register/do_upload');?>
                <label for="userfile">.gif only</label>
                <div class="form-group">
                    <input type="file" name="userfile" size="20" />
                </div>
                <div class="form-group">
                    <input type="submit" value="upload" />
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>