
<?php
  
    session_start(); // Start the session
 
    include './templates/navbar.php'; // Include the Navbar')
    
    include_once 'dbcon.php'; // On this line, we are including the database connection file to connect to the database

    if (isset($_GET['id'])) { // When clicking on the news, the anchor will also send the id via get
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
        

        if($article){
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="newsBody">
            <div id="newsTitleDiv"> 
        <h1><?php echo $description?></h1>
        </div>
        <div id="newsInternalBody">
            <img id ="newsImage"src="<?php echo $image?>"/>
            <div id="newsTextBlock">
            <p class="newsText"><?php echo $paragraph1?></p>
            <p class="newsText"><?php echo $paragraph2?></p>
            <p class="newsText"><?php echo $paragraph3?></p>
        </div>
        </div>
        <div id="<?php 
    if($score >= 80){
        echo 'newsBarBodyGreen';
    }
    else if($score >= 50){
        echo 'newsBarBodyGrey';
    }
    else{
        echo 'newsBarBodyRed';
    }    
?>">
            <h1 id="newsBarTitle">THE FACT CHECKER</h1>
            <h1 id="newsBarScore"><?php echo $score ?>%</h1>
            <h3>Source: <?php echo $source ?></h3>
           </div>
        </div>
        <?php include './templates/footer.php'; // Include the Footer?>
    </body>
</html>

<?php 
    }
}
?>
