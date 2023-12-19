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

    $sql = 'SELECT * FROM articles';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll();
    $num_rows = $stmt->rowCount();

    if ($num_rows>0){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article Management</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Article Management System "?> </h1>
            
            
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="users.php">User Management</a></h2>
</div>
    
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Description</th>
            <th>Score</th>
            <th>Source</th>
            <th>Edit | Delete</th>
        </tr>
        <?php  foreach($articles as $article) { ?>
        <tr>
            <td><?php echo $article->id; ?></td>
            <td><?php echo $article->title; ?></td>
            <td><?php echo $article->type; ?></td>
            <td><?php echo $article->description; ?></td>
            <td><?php echo $article->score; ?></td>
            <td><?php echo $article->source; ?></td>

            


            <td>
    <a href="articles_edit.php?id=<?php echo $article->id; ?>">Edit</a>
    <a href="articles_delete.php?id=<?php echo $article->id; ?>">Delete</a>
</td>
        </tr>

        <?php } ?>
    </table>
    <a href="articles_add.php">Add a New Article</a>
</div>
</body>

<?php 
    
}
    else{
        echo "No users found";
    }
?>

