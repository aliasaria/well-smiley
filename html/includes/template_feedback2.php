<html>
<head>
<title>Feedback</title>
<link rel="stylesheet" href="css/screen.css" type="text/css"/>  
</head>

<body>
<div class="topbar">This is entirely optional but we're always looking to learn more...</div>
	
<div id="content">
        <div id="header">
			<h1>
				<?php
				switch ($mood)
				{
					case "happy":
						echo '<img src="images/smiley/happy.png" /><br />';
						echo 'We\'re glad to hear you had a great experience! Any comments?';
						break;
					
					case "neutral":
						echo '<img src="images/smiley/neutral.png" /><br />';
						echo 'Anything we could have done better for next time?';
						break;
						
					case "sad":
						echo '<img src="images/smiley/sad.png" /><br />';
						echo 'We\'re sorry we didn\'t do a great job. But we appreciate you telling us. How can we improve for next time?';
						break;
							
					default:
						//this shoudn't happen
						echo 'Thanks for your feedback!';
						break;
				}
				?>
			</h1>
		</div>

   		<div class="post">
			<div class="quote">
					<center>
					<form method="POST" action="feedback3.php">
					<textarea name="comments" cols=50 rows=8></textarea><br />
					<input type="submit" value="Submit" />
					
					<input type="hidden" name="tid" value="<?= intval($tid) ?>">
					</form>
					</center>
			</div><!-- quote -->   
		</div><!-- post -->
</div><!-- content -->
</body>
</html>
