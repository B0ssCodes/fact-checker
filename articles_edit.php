<?php
  
    session_start(); // Start the session
   if(!isset($_SESSION["username"])) 
    { 
        include './templates/navbar.php' ;//Include the normal navbar to log in.
        echo "Please login first to use this page!";
        die(); //exit the process
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


            $sql = 'UPDATE articles SET title = :title, description = :description, image = :image, paragraph1 = :paragraph1, paragraph2 = :paragraph2, paragraph3 = :paragraph3, score = :score, source = :source, type = :type WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['title' => $title, 'description' => $description, 'image' => $image, 'paragraph1' => $paragraph1, 'paragraph2' => $paragraph2, 'paragraph3' => $paragraph3, 'score' => $score, 'source' => $source, 'type' => $type, 'id' => $_POST['id']]);
            header ("Location: articles.php");
            $stmt->closeCursor();
            die(); //exit the process

        }
        else{
            echo "Missing Fields!";
        }
    }

   

    if (isset($_GET['id'])) { // When clicking on edit, the anchor will also send the id via get
        $sql = 'SELECT * FROM articles WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $_GET['id']]);
        $article = $stmt->fetch();
            
        $title = $article->title;
        $description = $article->description;
        $image = $article->image;
        $paragraph1 = $article->paragraph1;
        $paragraph2 = $article->paragraph2;
        $paragraph3 = $article->paragraph3;
        $score = $article->score;
        $source = $article->source;
        $type = $article->type;
        

        if($user){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Article</title>
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
            <h1 id="loginTitle">Edit Article</h1>
</div>
            <form id="loginForm" action="articles_edit.php" method="post">
                <input hidden type="text" id="id" name="id" value="<?php echo $_GET['id'] ?>">
                <label for="username">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter the title" value="<?php echo $title ?>" >
                
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" placeholder="Enter the description" value="<?php echo $description ?>" >
                
                <label for="image">Image Link:</label>
                <input type="text" id="image" name="image" placeholder="Enter the image url" value="<?php echo $image ?>">
                
                <label for="paragraph1">Paragraph 1:</label>
                <textarea id="paragraph1" name="paragraph1" placeholder="Enter the first paragraph" ><?php echo $paragraph1 ?></textarea>
                
                <label for="paragraph2">Paragraph 2:</label>
                <textarea id="paragraph2" name="paragraph2" placeholder="Enter the second paragraph" ><?php echo $paragraph2 ?></textarea>
                
                <label for="paragraph3">Paragraph 3:</label>
                <textarea id="paragraph3" name="paragraph3" placeholder="Enter the third paragraph" ><?php echo $paragraph3 ?></textarea>
                
                <label for="score">Truth Score:</label>
                <input type="number" id="score" name="score" placeholder="Enter the truth score" value="<?php echo $score ?>">
                
                <label for="source">Source:</label>
                <input type="text" id="source" name="source" placeholder="Enter the source" value="<?php echo $source ?>">
                
                <div class="radio-group">
                <label for= "featured">Featured</label>
                <input type="radio" id="featured"name="type" <?php echo ($type=='featured')?'checked':'' ?> value="featured" >
                </div>

                <div class="radio-group">
                <label for= "live">Live</label>
                <input type="radio" id="live" name="type" <?php echo ($type=='live')?'checked':'' ?> value="live" >
                </div>
                
                <div class="radio-group">
                <label for= "live">Standard</label>
                <input type="radio" id="standard" name="type" <?php echo ($type=='standard')?'checked':'' ?> value="standard" >
                </div>

                <input type="submit" value="Confirm Edit">
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

