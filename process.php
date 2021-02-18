<?php
$mysqli = new mysqli('localhost','root','','siswa') or die(mysqli_error($mysqli));


$name = "";
$class = "";
$major = "";
$gender = "";
$update = false;
$id = 0;
session_start();;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $major = $_POST['major'];
    $gender = $_POST['gender'];

    $mysqli->query("INSERT INTO input_siswa (name,class,major,gender) VALUES('$name','$class','$major','$gender')") or die ($mysqli->error);
    $_SESSION['msg']="Success!";
    $_SESSION['type']="success";
    header("location: index.php");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM input_siswa WHERE id=$id") or die($mysqli->error);
    $_SESSION['msg']="Deleted!";
    $_SESSION['type']="danger";
    header("location: index.php");

}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM input_siswa WHERE id=$id") or die ($mysqli->error);
    $update = true;
    if ($result->num_rows) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $class = $row['class'];
        $major = $row['major'];
        $gender = $row['gender'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $major = $_POST['major'];
    $gender = $_POST['gender'];

    $mysqli->query("UPDATE input_siswa SET name='$name', class='$class', major='$major', gender='$gender' WHERE id=$id") or die ($mysqli->error);
    $_SESSION['msg']="Updated!";
    $_SESSION['type']="info";
    header("location: index.php");
}
?>