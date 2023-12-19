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

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $name = $_POST["name"];

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = 'INSERT INTO users (username, password, name) VALUES (:username, :password, :name)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username, 'password' => $hashed_password, 'name' => $name]);
            header ("Location: users.php");
            die();

        }
        else{
            echo "Missing Username/Password/Name!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Add User System "?> </h1>
            </div>
            <div id="newsTitleDiv">
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="users.php">Users Management</a></h2>
</div>
<div id="loginFormBody">
        <div id="loginFormDiv">
            <div id="newsTitleDiv"> 
            <h1 id="loginTitle">Add User</h1>
</div>
            <form id="loginForm" action="users_add.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter new username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter new password" required>
                <label for="password">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter new full name" required>
                <input type="submit" value="Register">
            </form>
    </div>
    </div>

</body>

<?php 
    

?>

