<?php
include_once 'dbcon.php'; // On this line, we are including the database connection file to connect to the database
session_start(); // Start the session

$sql = 'SELECT * FROM articles WHERE type = :type';
$stmt = $pdo->prepare($sql);
$stmt->execute(['type' => 'featured']);
$featured_news = $stmt->fetch();

$sql = 'SELECT * FROM articles WHERE type = :type';
$stmt = $pdo->prepare($sql);
$stmt->execute(['type' => 'live']);
$live_news = $stmt->fetchAll();

$sql = 'SELECT * FROM articles WHERE type = :type';
$stmt = $pdo->prepare($sql);
$stmt->execute(['type' => 'standard']);
$standard_news = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet"> 
</head>

<body >

    <?php include './templates/navbar.php'; // Include the Navbar
    ?>

    <div id="featuredAndLiveNewsDiv">
         
         <div id="featuredNewsSection">
         <a href="articles_details.php?id=<?php echo $featured_news->id; ?>">
                <div id="featuredNewsEntry">
                <h1 id="featuredNewsSectionTilte">Featured</h1>
        <h2 id="featuredNewsTitle"><?php echo $featured_news->title ?></h2>
        <img id ="featuredNewsImage" src="<?php echo $featured_news->image ?>" alt="Mysterious Crop Circles"/> 
        
        <p><?php echo $featured_news->description ?></p>
        
        <h2 class="<?php 
    if($featured_news->score >= 80){
        echo 'greenScoreBar';
    }
    else if($featured_news->score >= 50){
        echo 'grayScoreBar';
    }
    else{
        echo 'redScoreBar';
    }    
?>">Score: <?php echo $featured_news->score?>%  </h2> 
        <h2><?php echo $featured_news->source?></h2>
        </div>
    </a>
        </div>
        
        
    
    <div id="liveNews">
        <div id="liveNewsTitle">
         <h1>Live News</h1>
         <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="5em" viewBox="0 0 24 24"><circle cx="18" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin=".67" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin=".33" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="6" cy="12" r="0" fill="currentColor"><animate attributeName="r" begin="0" calcMode="spline" dur="1.5s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
         </div>
         <?php $i=1; foreach($live_news as $live_new) { ; 
             ?>
             <div class="liveNewsEntries">
            <a href="articles_details.php?id=<?php echo $live_new->id; ?>"><p><?php echo "{$i}. {$live_new->description}    "?><b><?php echo $live_new->score ?>%</b></p></a>
         </div>
    <?php $i++;} ?>
    </div>
         </div>
   

    <h1 id="standardNewsSectionTitle">News</h1>
    <div id="standardNewsSection">
    <?php foreach($standard_news as $standard_new){?>
        <div class="<?php 
            if($standard_new->score >= 80){
                echo 'standardNewsEntryGreen';
            }
            else if($standard_new->score >= 50){
                echo 'standardNewsEntryGrey';
            }
            else{
                echo 'standardNewsEntryRed';
            }    
        ?>">
            <a href="articles_details.php?id=<?php echo $standard_new->id; ?>">
                <h1 class="standardNewsTitle"><?php echo $standard_new->description ?></h1>
                <img class ="standardNewsImage"  alt="Standard News Image" src="<?php echo $standard_new->image?>"/> 
                <h2>Score: <?php echo $standard_new->score?>% </h2>
                <h3><?php echo $standard_new->source?></h3>
            </a>
        </div>
    <?php }?>
</div>

    </div>
   <?php include './templates/footer.php'; // Include the Footer
    ?>
</body>
</html>