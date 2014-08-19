<?php 
/* ----------------------------------------------------------
YouTubeEmbed Script
Source: https://github.com/nmcwilli/YouTubeEmbed
License: MIT
Share, modify & use this code as needed. Credit is appreciated :)
-------------------------------------------------------------

-------------------------------------------------------------
Created by Neil McWilliam
Email: mcwilliam@gmail.com
GitHub: https://github.com/nmcwilli/
Twitter: https://twitter.com/nmcwilli/
-------------------------------------------------------------

Variables
============================================================= */
if (isset($noDisplay)){ unset($noDisplay); } /* Ensure $noDisplay is unset */
$youtubeUrl = $row['SOURCEURL']; /* Replace with YOUR source youtube url */
$vidHeight = '315'; /* Default 315 - Sets the height of your video */
$vidWidth = '100%'; /* Default 100% - Will span full width of containing div */
$vidFrameBorder = '0'; /* Default 0 - You can set a border around the video iFrame */
/* ========================================================== */

/* IF isset $youtubeUrl */
if (isset($youtubeUrl)){
	
	/* FYI Long url format: https://www.youtube.com/watch?v=VIDEOID&feature=c4-overview&list=LISTID */
	
	// If http://www.youtube.com/embed/
	if (substr($youtubeUrl, 0, 29) == "http://www.youtube.com/embed/")
	{
		$youtubeUrl = str_replace("http://www.youtube.com/", "//www.youtube.com/embed/", $youtubeUrl);
	} 
	// If https://www.youtube.com/embed/
	else if (substr($youtubeUrl, 0, 30) == "https://www.youtube.com/embed/")
	{
		$youtubeUrl = str_replace("https://www.youtube.com/embed/", "//www.youtube.com/embed/", $youtubeUrl);
	}
	// If http://youtube.com/embed/
	else if (substr($youtubeUrl, 0, 25) == "http://youtube.com/embed/")
	{
		$youtubeUrl = str_replace("http://youtube.com/embed/", "//youtube.com/embed/", $youtubeUrl);
	} 
	// If https://youtube.com/embed/
	else if (substr($youtubeUrl, 0, 26) == "https://youtube.com/embed/")
	{
		$youtubeUrl = str_replace("https://youtube.com/embed/", "//youtube.com/embed/", $youtubeUrl);
	}
	// If http://www.youtube.com/watch?v=
	else if (substr($youtubeUrl, 0, 31) == "http://www.youtube.com/watch?v=")
	{
		$parts = parse_url($youtubeUrl);
		parse_str($parts['query'], $query);
		$youtubeUrl = "//www.youtube.com/embed/".$query['v'];
	} 
	// If https://www.youtube.com/watch?v=
	else if (substr($youtubeUrl, 0, 32) == "https://www.youtube.com/watch?v=")
	{
		$parts = parse_url($youtubeUrl);
		parse_str($parts['query'], $query);
		$youtubeUrl = "//www.youtube.com/embed/".$query['v'];
	}
	// If http://m.youtube.com/watch?v=
	else if (substr($youtubeUrl, 0, 29) == "http://m.youtube.com/watch?v=")
	{
		$parts = parse_url($youtubeUrl);
		parse_str($parts['query'], $query);
		$youtubeUrl = "//www.youtube.com/embed/".$query['v'];
	} 
	// If https://m.youtube.com/watch?v=
	else if (substr($youtubeUrl, 0, 30) == "https://m.youtube.com/watch?v=")
	{
		$parts = parse_url($youtubeUrl);
		parse_str($parts['query'], $query);
		$youtubeUrl = "//www.youtube.com/embed/".$query['v'];
	}
	// If http://youtu.be/
	else if (substr($youtubeUrl, 0, 16) == "http://youtu.be/")
	{
		$youtubeUrl = str_replace("http://youtu.be/", "//www.youtube.com/embed/", $youtubeUrl);
	} 
	// If https://youtu.be/
	else if (substr($youtubeUrl, 0, 17) == "https://youtu.be/")
	{
		$youtubeUrl = str_replace("https://youtu.be/", "//www.youtube.com/embed/", $youtubeUrl);
	}
	// If first two chars //
	else if (substr($youtubeUrl, 0, 2) == "//")
	{
		// Do nothing. We can handle this.
	}
	// Set $noDisplay to 1
	else 
	{
		$noDisplay = 1;
	}
	
	// If $noDisplay is set and equals 1, then fail
	if (isset($noDisplay) AND $noDisplay==1)
	{
		// DO NOTHING
	}	
	// Otherwise, display the video
	else 
	{
	?>
		
		<!-- YouTube Video iFrame -->
		<iframe width="<?php echo $vidWidth; ?>" height="<?php echo $vidHeight; ?>" src="<?php echo $youtubeUrl; ?>" frameborder="<?php echo $vidFrameBorder; ?>" allowfullscreen></iframe>
		
		<br><br><!-- I like to add some extra spacing after the video, but this can be removed or padding can be added with CSS -->
		
	<?php
	} /* End if statement */
	
} /* End isset $youtubeUrl */

/* Unset variables */
if (isset($noDisplay)){ unset($noDisplay); }
if (isset($youtubeUrl)){ unset($youtubeUrl); }
?>