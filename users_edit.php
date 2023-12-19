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

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["username"]) && !empty($_POST["name"])){
            $username = $_POST["username"];
            $name = $_POST["name"];

            $sql = 'UPDATE users SET username = :username, name = :name WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username, 'name' => $name, 'id' => $_POST['id']]);
            header ("Location: users.php");
            $stmt->closeCursor();
            die();

        }
        else{
            echo "Missing Username/Name!";
        }
    }

    if(isset($_POST['password'])){
        
    }

    if (isset($_GET['id'])) { // When clicking on edit, the anchor will also send the id via get
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_GET['id']]);
        $user = $stmt->fetch();
            
        $username = $user->username;
        $name = $user->name;


        if($user){
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Edit User System "?> </h1>
            </div>
            <div id="newsTitleDiv">
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="users.php">User Management</a></h2>
</div>
<div id="loginFormBody">
        <div id="loginFormDiv">
            <div id="newsTitleDiv"> 
            <h1 id="loginTitle">Edit User</h1>
</div>
            <form id="loginForm" action="users_edit.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter new username" value="<?php echo $username ?>" >
                <label for="username">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter new password" >
                <label for="password">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter new full name" value="<?php echo $name ?>">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <input type="submit" value="Edit">
            </form>
    </div>
    </div>

</body>

<?php 
     }

     else{
         echo "No ID set!";
     }
    }
?>

