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
		<script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker-fr.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<!-- Date: 2012-07-16 -->
	</head>

	<body>
		<?php
		function safe_redirect($url, $method = 'PHP') {
			try {
				if (!headers_sent()) {
					//If headers are not sent yet... then do a php redirect
					@header('Location: ' . $url);
					exit ;
				} else
					throw new Exception();
			} catch( Exception $ex ) {
				//If headers are sent... do a JavaScript redirect...
				//if javascript disabled, do html redirect.
				echo '<script type="text/javascript">';
				echo 'window.location.href="' . $url . '";';
				echo '</script>';
				echo '<noscript>';
				echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
				echo '</noscript>';
				exit ;
			}
		}
		?>
		<div id="header">
			<h1 class="big_title">Cabinet Medical de Cardiologie</h1>
			<div class="line_separator">&nbsp;</div>
			<h2 class="med_title">Docteur H.ADGHAR</h2>
			<h3 class="small_title">Maladies du coeur et des vaisseaux</h3>
			<div class="line_separator">&nbsp;</div>
			<h2 class="med_title">Systeme de gestion</h2>
		</div>

		<div id="contentWrap">
			<div class="clear">&nbsp;</div>
			<div id="tmenu">
				<ul class="sf-menu">
					<li class="current">
						<a href="index.php?page=patients&action=list">Patients</a>
						<!--<ul>
							<li>
								<a href="index.php?page=patients&action=list">Lister</a>
							</li>
							<li>
								<a href="index.php?page=patients&action=add">Ajouter</a>
							</li>
						</ul>-->
					</li>

					<li>
						<a href="index.php?page=rdv&action=list">Rendez vous</a>
						<!--<ul>
							<li>
								<a href="index.php?page=rdv&action=list">Lister</a>
							</li>
							<li>
								<a href="index.php?page=rdv&action=add">Ajouter</a>
							</li>
						</ul>-->
					</li>
					
					<li>
						<a href="index.php?page=consult&action=list">Consultations</a>
						<!--<ul>
							<li>
								<a href="index.php?page=consult&action=list">Lister</a>
							</li>
							<li>
								<a href="index.php?page=consult&action=add">Ajouter</a>
							</li>
						</ul>-->
					</li>

					<li>
						<a href="index.php?page=exams&action=list">Examens</a>
						<!--<ul>
							<li>
								<a href="index.php?page=exams&action=list">Lister</a>
							</li>
							<li>
								<a href="index.php?page=exams&action=add">Ajouter</a>
							</li>
						</ul>-->
					</li>
					<li>
						<a href="index.php?page=stats">Statistiques</a>
					</li>
				</ul>
			</div>
			<?php
			include ('db.php');
			require_once 'controllers/main.php';
			$controller = new Main();
			$controller -> process();
			?>
			<div class="clear">&nbsp;</div>
		</div>

		<div id="footer">
			&nbsp;
			<div class="clear">&nbsp;</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$('ul.sf-menu').superfish();
			});
		</script>
	</body>
</html>

