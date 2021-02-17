<html>
    <head>
        <title>aaaaaa</title>
    </head>
    <body>
        <?php require_once 'process.php'?>

        <?php
        $mysqli = new mysqli('localhost','root','','siswa') or die(mysqli_error($mysqli));

        $result = $mysqli->query("SELECT * FROM input_siswa") or die($mysqli->error);
        ?>
        <div>
            <table border="1">
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>major</th>
                    <th>gender</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['class'];?></td>
                    <td><?php echo $row['major'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']?>">edit</a>
                        <a href="process.php?delete=<?php echo $row['id']?>">delete</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </table>
        </div>

        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"><br>
            <input type="text" name="class" placeholder="class" value="<?php echo $class; ?>"><br>
            <input type="text" name="major" placeholder="major" value="<?php echo $major; ?>"><br>
            <input type="text" name="gender" placeholder="gender" value="<?php echo $gender; ?>"><br>
            <?php if($update == true):?>
                <button type="submit" name="update">update</button>
            <?php else:?>
                <button type="submit" name="save">submit</button>
            <?php endif;?>
        </form>

        <div>
            <h3>to do list</h3>
            <ul>
                <li>desgin (bootstrap)</li>
                <li>messages</li>
            </ul>
        </div>
    </body>
</html>