<?php 
    require 'connect.php';
    include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Table population</title>
</head>
<body>
    <h1>Table population</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>LastName</th>
            <th>Age</th>
            <th>Edit</th>
        </tr>
        
        <tr>
            <?php echo  popuplate(); ?>
        </tr>
    </table>
    <form action="index.php" method="post" id="form1">
        <h3>Add a user</h3>
        <label for="Firstname">FirstName</label>
        <input type="text" name="fname" placeholder="Firstname" required>

        <label for="Lastname">LastName</label>
        <input type="text" name="lname" placeholder="Lastname" required>

        <label for="age">Age</label>
        <input type="number" name="age" placeholder="Age" required>

        <input type="submit" value="Add" name="add">
    </form>

    <!-- To delete a user -->
    <form action="index.php" method="post" id="form2">
        <h3>Delete user</h3>
        <label for="ID">ID:</label>
        <input type="number" name="id">

        <input type="submit" value="Delete" name="delete">
    </form>

    <!-- Bring back the deleted user from the dead... -->
    <form action="index.php" id="form3" method="POST">
        <h3>Bring back the deleted user from the dead...</h3>
        <select name="bring" id="">
                <option>Select ID</option>
                <?php echo check_deleted_user(); ?>
        </select>
        <input type="submit" name="bringback" value="Add">

    </form>
    <input type="color" name="color" value="pick a color">

</body>
</html>