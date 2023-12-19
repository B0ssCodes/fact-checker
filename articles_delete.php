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

    $sql = 'SELECT title from articles WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    $article = $stmt->fetch();

    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $sql = 'DELETE FROM articles WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $_POST['id']]);
            header ("Location: articles.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Article</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Delete Article System "?> </h1>
            </div>
            <div id="newsTitleDiv">
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="articles.php">Article Management</a></h2>
</div>
<div id="loginFormBody">
        <div id="loginFormDiv">
            <div id="newsTitleDiv"> 
            <h1 id="loginTitle">Delete Article</h1>
</div>
            <form id="loginForm" action="articles_delete.php" method="post">
                <input hidden type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>">
              <h1>Are you sure you want to delete the article with title: <?php echo $article->title ?> ?</h1>
               <a href="articles.php" class="button">No</a>       
              <input type="submit" value="Yes">
            </form>
    </div>
    </div>

</body>

<?php 
    

?>

