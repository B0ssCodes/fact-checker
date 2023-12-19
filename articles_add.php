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

        if(!empty($_POST["title"]) && !empty($_POST["description"]) && !empty($_POST["paragraph1"]) && !empty($_POST["score"]) && !empty($_POST["type"])){
            
            $title = $_POST["title"];
            $description = $_POST["description"];
            $image = $_POST["image"];
            $paragraph1 = $_POST["paragraph1"];
            $paragraph2 = $_POST["paragraph2"];
            $paragraph3 = $_POST["paragraph3"];
            $score = $_POST["score"];
            $source = $_POST["source"];
            $type = $_POST["type"];

            $sql = 'INSERT INTO articles (title, description, image, paragraph1, paragraph2, paragraph3, score, source, type) VALUES (:title, :description, :image, :paragraph1, :paragraph2, :paragraph3, :score, :source, :type)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['title' => $title, 'description' => $description, 'image' => $image, 'paragraph1' => $paragraph1, 'paragraph2' => $paragraph2, 'paragraph3' => $paragraph3, 'score' => $score, 'source' => $source, 'type' => $type]);
            header ("Location: articles.php");
            die();

        }
        else{
            echo "Missing Fields!";
        }
         
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Articles</title>
    <link rel="stylesheet" href="adminstyles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>
<body>
<div id="newsTitleDiv"> 
            <h1 id="loginTitle"><?php echo "{$_SESSION["name"]}'s Add Article System "?> </h1>
            </div>
            <div id="newsTitleDiv">
                <h2><a href="dashboard.php">Dashboard</a></h2>
                <h2><a href="articles.php">Article Management</a></h2>
</div>
<div id="loginFormBody">
        <div id="loginFormDiv">
            <div id="newsTitleDiv"> 
            <h1 id="loginTitle">Add Article</h1>
</div>
            <form id="loginForm" action="articles_add.php" method="post" enctype="">
                <label for="username">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" required>
                
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="Enter the description" required>
                
                <label for="image">Image Link:</label>
                <input type="text" id="image" name="image" placeholder="Enter the image url" >
                
                <label for="paragraph1">Paragraph 1:</label>
                <textarea id="paragraph1" name="paragraph1" placeholder="Enter the first paragraph" required></textarea>
                
                <label for="paragraph2">Paragraph 2:</label>
                <textarea id="paragraph2" name="paragraph2" placeholder="Enter the second paragraph"></textarea>
                
                <label for="paragraph3">Paragraph 3:</label>
                <textarea id="paragraph3" name="paragraph3" placeholder="Enter the third paragraph" ></textarea>
                
                <label for="score">Truth Score:</label>
                <input type="number" id="score" name="score" placeholder="Enter the truth score" required>
                
                <label for="source">Source:</label>
                <input type="text" id="source" name="source" placeholder="Enter the source" >
                <div class="radio-group">
               
                <label for= "featured">Featured</label>
                <input type="radio" id="featured"name="type" value="featured" required>
                </div>

                <div class="radio-group">
                <label for= "live">Live</label>
                <input type="radio" id="live" name="type" value="live" required>
                </div>
                
                <div class="radio-group">
                <label for= "live">Standard</label>
                <input type="radio" id="standard" name="type" value="standard" required>
                </div>

                <input type="submit" value="Add Article">
            </form>
    </div>
    </div>

</body>

<?php 
    

?>

