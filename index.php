<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cabinet Medical</title>
		<meta name="author" content="nvtech" />

		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/btns.css" />
		<link rel="stylesheet" type="text/css" href="css/forms.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.21.custom.css" />

		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
		<!-- Date: 2012-07-16 -->
	</head>

	<body>
		<div id="header">
			&nbsp;
			<div class="clear"></div>
		</div>

		<div id="contentWrap">
			<?php
			include ('db.php');
			require_once 'controllers/main.php';
			$controller = new Main();
			$controller -> process();
			?>
			<div class="clear"></div>
		</div>

		<div id="footer">
			&nbsp;
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</body>
</html>

