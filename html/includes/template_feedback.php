<html>
<head>
<title>Feedback</title>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>  
</head>

<body>
<div class="topbar">We have just one question about Well.ca's customer service...</div>
	
<div id="content">
        <div id="header">
			<h1>How would you rate the customer experience you just had?</h1>
		</div>

   		<div class="post">
			<div class="quote">
					<div class="option clearfix">
					<a href="feedback2.php?mood=happy&tid=<?= $tid ?>&csid=<?= $csid ?>&hash=<?= $hash ?>">
					<img src="images/smiley/happy.png" />
					<span class="option_text">
						<strong>It was a great experience</strong><br/>
						Fast, friendly, helpful, pleasant. Great Job!
					</span>
					</a>
					</div>
					<div class="option clearfix">
					<a href="feedback2.php?mood=neutral&tid=<?= $tid ?>&csid=<?= $csid ?>&hash=<?= $hash ?>">
						<img src="images/smiley/neutral.png" />
						<span class="option_text">
						<strong>It was an OK experience</strong><br/>
						Fine, but definitely could have been better!
						</span>
					</a>
					</div>
					<div class="option clearfix">
					<a href="feedback2.php?mood=sad&tid=<?= $tid ?>&csid=<?= $csid ?>&hash=<?= $hash ?>">
					<d>
						<img src="images/smiley/sad.png" />
						<span class="option_text">
						<strong>Not good, unfortunately</strong><br/>
						I wasn't happy with it at all.
						</span>
					</a>
					</div>
			</div><!-- quote -->   
		</div><!-- post -->
</div><!-- content -->
</body>
</html>
