<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to the Gotham Times</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<body>
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="/">Gotham Times</a>
    <ul class="nav">
      <li><a href="/">Home</a></li>
    </ul>
  </div>
</div>

<div class="container">
	<?php
		$article = $_GET["article"];
		if (in_array("articlesforsite/$article.txt", glob("articlesforsite/*.txt")))
		{
			$file = file("articlesforsite/".$_GET["article"].".txt");
			echo "<h2>$file[0]</h2>";
			unset($file[0]);
		    if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "googlebot"))
		    {
		    	echo nl2br(implode("\n",$file) . "\n");
		    }
		    else
		    {
		    	echo $file[1]."<br /><br />";
		    	echo "<b>Sorry, you can't read any more unless you <a href='register.php'>register</a>.</b>";
		    }
		    echo "<br /><br />";
		}
		else
		{
			echo "Batman does not approve.";
		}
	?>
</div>
</body>
<html>