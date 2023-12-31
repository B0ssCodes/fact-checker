<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    </head>
    <body>
    <?php include './templates/navbar.php'; // Include the Navbar
    
    ?>
        </nav>
        <div id="newsBody">
            <div id="newsTitleDiv"> 
        <h1>Welcome to The Fact Checker!</h1>
        </div>
        <div id="newsInternalBody">
            <img id ="newsImage"src="/images/logo.png"/>
            <div id="newsTextBlock">
                <h2>About The Fact Checker</h2>
            <p class="newsText">Welcome to "The Fact Checker" – Your Trusted Source for Verified News</p>
            <p class="newsText">At The Fact Checker, we are dedicated to bringing you the most reliable, fact-checked news from around the world. In today's information age, the flood of news can be overwhelming, and distinguishing fact from fiction can be a daunting task. That's where we come in.</p>
            <br/>
            <h2>Our Mission</h2>
            <p class="newsText"><b>Our mission is clear:</b> to provide you with a comprehensive and accurate view of the world's events. We believe that well-informed citizens are the cornerstone of a healthy democracy. With this in mind, we've developed a cutting-edge platform that combines the best journalism with advanced algorithms to assess the accuracy and credibility of news articles.</p>
            <h2>How it works</h2>
            <p class="newsText"><b>Curating from Trusted Sources:</b> We aggregate news articles from a wide array of established and reputable news outlets. Our team of experienced journalists handpick stories that matter most to you, ensuring a diverse range of perspectives and topics.</p>
            <p class="newsText"><b>Advanced Truth Scoring:</b> Our proprietary algorithm, the TruthScore™, takes center stage. This algorithm leverages artificial intelligence and machine learning to evaluate the content of each article. It assesses factors such as the source's track record, the verifiability of claims, and the presence of bias to provide an objective truth score for each story.</p>
            <p class="newsText"><b>Transparency:</b> We are committed to transparency in our fact-checking process. For each article, you can see the TruthScore™ and the criteria that influenced it. We're open about how we arrive at our assessments, empowering you to make informed judgments.</p>
            <h2>Our Team</h2> 
            <p class="newsText">Behind The Fact Checker is a dedicated team of journalists, fact-checkers, data scientists, and technologists. We are passionate about ensuring that you receive news you can trust. Our commitment to accuracy and integrity drives everything we do.</p>   
            <h2>Why Choose The Fact Checker?</h2>
            <p class="newsText"><b>Unbiased Reporting:</b> We're not beholden to any political or commercial interests. Our only allegiance is to the truth.</p>
            <p class="newsText"><b>Comprehensive Coverage:</b> You'll find a wide range of topics and perspectives, ensuring you get a balanced view of the world's events..</p>
            <p class="newsText"><b>Empowerment:</b> We empower you to be an informed and discerning news consumer. The TruthScore™ is a valuable tool for evaluating the credibility of information.</p>
            <p class="newsText">Join us in the quest for truth, transparency, and accountability. Explore the world of news with confidence at The Fact Checker. Your trust is our greatest asset, and we're honored to serve as your gateway to verified information.</p>
            <p class="newsText">Thank you for choosing The Fact Checker, where facts matter.</p> 
        </div>
        </div>
        </div>
        <?php include '/templates/footer.php'; ?> // Include the Footer
        
    </body>
</html>