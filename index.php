<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cabinet Medical</title>
		<meta name="author" content="nvtech" />
		<!-- Date: 2012-07-16 -->
	</head>

	<body>
		<?php
			include('db.php');
			require_once 'controllers/main.php';
			$controller = new Main($db);
			$controller->process();
		?>
	</body>
</html>

