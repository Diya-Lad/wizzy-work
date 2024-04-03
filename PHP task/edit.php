<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $id = $_REQUEST['id'];
            $sql = "UPDATE person SET firstname= '$name' , lastname = '$lastname', email = '$email' WHERE id='$id'";
            $conn = new mysqli("localhost", "root", "", "myDB");
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("Location: http://localhost/PHP/CRUD_practice.php");
            exit();
        }
    ?>
