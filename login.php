<?php
  session_start(); // Start the session
  include_once 'dbcon.php'; // Include the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); //Use echo time() to remove CSS cache and force changes?>"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>

<body>
    <?php include './templates/navbar.php';// Include the Navbar 
    ?>
    <div id="loginFormBody">
        <div id="loginFormDiv">
            <div id="newsTitleDiv"> 
            <h1 id="loginTitle">Admin Login</h1>
</div>
            <form id="loginForm" action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                <input type="submit" value="Login">
            </form>
    </div>
    </div>
</body>


<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = 'SELECT * FROM users WHERE username = :username';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user->password)){
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["name"] = $user->name;
                header ("Location: admin.php");
            }
            else{
                echo "Incorrect Username/Password";
            }
        }
        else{
            echo "Missing Username/Password";
        }
    }
?>


