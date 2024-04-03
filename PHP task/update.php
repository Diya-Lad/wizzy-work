<?php
    
    $name1=$lastname=$email="";
    $conn = new mysqli("localhost", "root", "", "myDB");

    $sql = "Select * from person where id = {$_REQUEST['id']}";
    
    $result = mysqli_query($conn,$sql);
    $result = mysqli_fetch_row($result);
    $name1 = $result[1];
    $lastname = $result[2];
    $email = $result[3];
    $id = $result[0];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
    Name: <input type="text" name="firstname" value="<?php echo $name1;?>"><br>
    lastName: <input type="text" name="lastname" value="<?php echo $lastname;?>"><br>
    E-mail: <input type="email" name="email" value="<?php echo $email;?>"><br>
    <input type="submit">
    </form>

</body>
</html>