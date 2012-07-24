<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Cabinet Medical</title>
		<meta name="author" content="nvtech" />

		<link rel="stylesheet" type="text/css" href="css/superfish.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/btns.css" />
		<link rel="stylesheet" type="text/css" href="css/forms.css" />
		<link rel="stylesheet" type="text/css" href="css/tabs.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.21.custom.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css" />

		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<!-- Date: 2012-07-16 -->
	</head>

	<body>
		<div id="header">
			&nbsp;
			<div class="clear"></div>
		</div>

		<div id="contentWrap">
			<div id="tmenu">
				<ul class="sf-menu">
					<li class="current">
						<a href="#">Patients</a>
						<ul>
							<li>
								<a href="#">Lister</a>
							</li>
							<li>
								<a href="#">Ajouter</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#">Rendez vous</a>
						<ul>
							<li>
								<a href="#">Lister</a>
							</li>
							<li>
								<a href="#">Ajouter</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="#">Examens</a>
						<ul>
							<li>
								<a href="#">Lister</a>
							</li>
							<li>
								<a href="#">Ajouter</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
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

		<script type="text/javascript">
			$(document).ready(function() {
				$('ul.sf-menu').superfish();
			});
		</script>
	</body>
</html>

