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
      <li class="active"><a href="/">Home</a></li>
    </ul>
  </div>
</div>

<div class="container">
	<?php
	foreach (glob("articlesforsite/*.txt") as $filename) {
		$file = file($filename);
		echo "<h2>$file[0]</h2>";
		array_pop($file);
		unset($file[0]);
	    echo $file[1]."<br /><br />";

	    echo "Read more of the article <a href='article.php?article=".parse_filename($filename)."'> here</a>.<br /><br />";
	}

	echo "<br /><br />";

	function parse_filename($filename) {
		$start = strrpos($filename, "/");
		$ending = strrpos($filename, ".");
		return substr($filename, $start+1, $ending-$start-1);
	}
	?>
</div>
</body>
<html>