<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>EP Text | Rich Text Box</title>

	<link type = "text/css" rel="stylesheet" href="style.css">
	<link type = "text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body>
	
	<?php
		require_once 'markup.php';
		MarkUp::richText([ 'name' => 'post_text_box', 'cls' => 'rich_text_box' ]);
	?>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="script.js"></script>
</body>
</html>


