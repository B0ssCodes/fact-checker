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

    $sql = 'SELECT * FROM form_data';
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $form_data = $stmt->fetchAll();
    $num_rows = $stmt->rowCount();

    if ($num_rows>0){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Home "?> </h1>
            
            
                <h2><a href="users.php">User Management</a></h2>
                <h2><a href="articles.php">Article Management</a></h2>
                <h2>Pending Forms</h2> 
</div>
    
<div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Gender</th>
            <th>Country</th>
            <th>Purpose</th>
            <th>Subject</th>
            <th>Comments</th>
            <th>Delete</th>
        </tr>
        <?php  foreach($form_data as $form_dat1) { ?>
        <tr>
            <td><?php echo $form_dat1->id; ?></td>
            <td><?php echo $form_dat1->fullname; ?></td>
            <td><?php echo $form_dat1->email; ?></td>
            <td><?php echo $form_dat1->telephone; ?></td>
            <td><?php echo $form_dat1->gender; ?></td>
            <td><?php echo $form_dat1->country; ?></td>
            <td><?php echo $form_dat1->purpose; ?></td>
            <td><?php echo $form_dat1->subject; ?></td>
            <td><?php echo $form_dat1->comments; ?></td>
            <td>
    <a href="form_delete.php?id=<?php echo $form_dat1->id; ?>">Delete</a>
</td>
        </tr>

        <?php } ?>
    </table>
</div>
</body>

<?php 
    
}
    else{
        echo "No forms were submitted";
    }

?>

