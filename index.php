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
    <title>Test</title>
</head>
<body>
    <div class="container">
        <h1>CRUD test page :</h1>
        <br />
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3>Insert Data</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" id="email" />
                            </div>
                            <br/>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" id="password" />
                            </div>
                            <br/>
                            <input class="btn btn-info" type="submit" name="submit" value="Submit" />
                        </form>
                    </div>
                    <?php 
                    $connect = mysqli_connect("localhost", "root", "", "system");
                    if(isset($_POST['submit'])){

                        $email = $_POST['email'];
                        $pass = $_POST['password'];


                        $sql1 = "INSERT INTO users (email_user, pass_user) VALUES ('$email', '$pass')";
                        $result = mysqli_query($connect, $sql1);
                        if($result){
                            header("Refresh:0");
                            // header("Location: ".$_SERVER['PHP_SELF']);
                            echo "<script type='text/javascript'> alert('Bien Ajouter')</script>";
                        }else{
                            echo "<script type='text/javascript'> alert('Erruer')</script>";
                        }

                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3>Show Data</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <?php
                                $connect = mysqli_connect("localhost", "root", "", "system");
                                $query = "SELECT * FROM users";
                                $result = mysqli_query($connect, $query);
                                while($row = mysqli_fetch_object($result)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><input type="hidden" id="idEdit" value="<?php echo $row->id_user ?>"> <?php echo $row->id_user ?></td>
                                    <td><?php echo $row->email_user ?></td>
                                    <td><?php echo $row->pass_user ?></td>
                                    <td><a href="edit_user.php?id=<?php echo $row->id_user ?>" class="btn btn-info">Edit</a> <a href="delete_user.php?id=<?php print $row->id_user?>" class="btn btn-warning">Delete</a></td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>