

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
    Name: <input type="text" name="firstname"><br>
    lastName: <input type="text" name="lastname"><br>
    E-mail: <input type="email" name="email"><br>
    <input type="submit">
    </form>

    <?php
     $conn = new mysqli("localhost", "root", "", "myDB");
        $name = $lastname = $email = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $name = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            // echo $email;
            
            $conn = new mysqli("localhost", "root", "", "myDB");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "INSERT INTO person (firstname, lastname, email)
              VALUES ('$name', '$lastname', '$email')";
              
              if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }

        $selectQuery = "SELECT * FROM person";
        $result = mysqli_query($conn,$selectQuery);

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    

<table>
  <tr>
    <th>id</th>
    <th>firstname</th>
    <th>lastname</th>
    <th>email</th>
  
<?php
            while($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row['firstname'] ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><a href="update.php?id=<?php echo $row['id'] ?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
            <tr>
        <?php }?>
  
</table>

</body>
</html>