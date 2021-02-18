<html>
    <head>
        <title>SimpleStudentForm</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="bg.css">
    </head>
    <body>
        <a class="fa fa-github gits" href="https://github.com/andreasyny"></a>
    <div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
            </ul>
    </div >
        <style>
            .logo1{
                font-size:30px;
                color:green;
            }
            .logo2{
                font-size:30px;
                color:red;
            }
            .logo1:hover{
                font-size:30px;
                color:green;
                text-decoration:none;
            }
            .logo2:hover{
                font-size:30px;
                color:red;
                text-decoration:none;
            }
            .inputs{
                width:24.5%;
            }
            .aaaa{
                padding-left:50%;
            }
        </style>
        <?php require_once 'process.php'?>

        <?php if(isset($_SESSION['msg'])):?>
        <div class="alert alert-<?=$_SESSION['type']?> alert-dismissible fade show alrtt align-middle">

            <?php 
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
                header("Refresh:1");
            ?>
        </div>
            <?php endif;?>

        <?php
        $mysqli = new mysqli('localhost','root','','siswa') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM input_siswa") or die($mysqli->error);
        ?>
        <table class="pl-5 pt-5" align="center">
        <th class="pl-5">
        <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-dark">
                <tr>
                    <thead class="thead-dark">
                        <th>Name</th>
                        <th>Class</th>
                        <th>major</th>
                        <th>gender</th>
                        <th colspan="2">Action</th>
                    </thead>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['class'];?></td>
                    <td><?php echo $row['major'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']?>" class="fa fa-edit logo1"></a>
                        <a href="process.php?delete=<?php echo $row['id']?>" class="fa fa-trash logo2" name="delete"></a>
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </div>
        </th>
        <th class="pl-5">
        <div class="row justify-content-center">
            <form action="process.php" method="POST" class="pt-5">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input maxlength="20" type="text" name="name" placeholder="Name" value="<?php echo $name;?>"><br>
                &nbsp <br>
                <input maxlength="20" type="text" name="gender" placeholder="gender" value="<?php echo $gender; ?>"><br>
                &nbsp <br>
                <input maxlength="20" type="text" name="class" placeholder="class" value="<?php echo $class; ?>" class="inputs">
                <input maxlength="20" type="text" name="major" placeholder="major" value="<?php echo $major; ?>" class="inputs"><br>
                &nbsp <br>
                <?php if($update == true):?>
                    <button type="submit" class="btn btn-info" name="update">update</button>
                <?php else:?>
                    <button type="submit" class="btn btn-primary" name="save">Submit</button>
                <?php endif;?>
            </form>
        </div>
        </th>
        </div>
    </body>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>