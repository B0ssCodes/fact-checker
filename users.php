<?php
  
    session_start(); // Start the session
   if(!isset($_SESSION["username"])) 
    { 
        include './templates/navbar.php' ;//Include the normal navbar to log in.
        echo "Please login first to use this page!";
        die();
    }
    include './templates/admin_navbar.php'; // Include the Navbar')
    include_once 'dbcon.php'; // On this line, we are including the database connection file to connect to the database

    $sql = 'SELECT * FROM users';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll();
    $num_rows = $stmt->rowCount();

    if ($num_rows>0){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s User Management System "?> </h1>
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="articles.php">Article Management</a></h2>
</div>
    
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Edit | Delete</th>
        </tr>
        <?php  foreach($users as $user) { ?>
        <tr>
            <td><?php echo $user->id; ?></td>
            <td><?php echo $user->username; ?></td>
            <td><?php echo $user->name; ?></td>
            <td>
    <a href="users_edit.php?id=<?php echo $user->id; ?>">Edit</a>
    <a href="users_delete.php?id=<?php echo $user->id; ?>">Delete</a>
</td>
        </tr>

        <?php } ?>
    </table>
    <a href="users_add.php">Add New User</a>
</div>
</body>

<?php 
    
}
    else{
        echo "No users found";
    }
?>

