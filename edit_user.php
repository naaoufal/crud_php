<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <br />
            <?php
                $connect = mysqli_connect("localhost", "root", "", "system");
                $id = $_GET['id'];
                $sql = "SELECT * FROM users WHERE id_user LIKE '$id' ";
                $result = mysqli_query($connect, $sql);
            ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>Update Data</h3>
                    </div>
                    <?php while($row = mysqli_fetch_object($result)){ ?>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" type="text" value="<?php echo $row->email_user ?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="text" value="<?php echo $row->pass_user ?>">
                        </div>
                        <input type="submit" class="btn btn-success">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>