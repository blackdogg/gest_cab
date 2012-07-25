<?php
include ('../../db.php');

$list = $db -> query("SELECT idpatient, nom, prenom, date_naissance, adresse FROM patient");
$patients = $list -> fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Selection du patient</title>
		<meta name="author" content="nvtech" />
		
		<link rel="stylesheet" type="text/css" href="../../css/jquery-ui-1.8.21.custom.css" />
		<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.css" />
		<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables_themeroller.css" />

		<script type="text/javascript" src="../../js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
		<!-- Date: 2012-07-16 -->
	</head>
	
	<body>
<table id="patient_lst">
	<thead>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Date de naissance</th>
		<th>Adress</th>
	</thead>
	
	<tbody>
		<?php foreach($patients as $key => $patient){ ?>
		<tr>
			<td><a href="#" onclick="setPatient('<?php echo $patients[$key]['nom'] . " " . $patients[$key]['prenom']; ?>',<?php echo $patients[$key]['idpatient']; ?>)"><?php echo $patients[$key]['nom']; ?></a></td>
			<td><a href="#" onclick="setPatient('<?php echo $patients[$key]['nom'] . " " . $patients[$key]['prenom']; ?>',<?php echo $patients[$key]['idpatient']; ?>)"><?php echo $patients[$key]['prenom']; ?></a></td>
			<td><a href="#" onclick="setPatient('<?php echo $patients[$key]['nom'] . " " . $patients[$key]['prenom']; ?>',<?php echo $patients[$key]['idpatient']; ?>)"><?php echo $patients[$key]['date_naissance']; ?></a></td>
			<td><a href="#" onclick="setPatient('<?php echo $patients[$key]['nom'] . " " . $patients[$key]['prenom']; ?>',<?php echo $patients[$key]['idpatient']; ?>)"><?php echo $patients[$key]['adresse']; ?></a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<script type="text/javascript">
	$("#patient_lst").dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",
		"oLanguage" : {
			"sUrl" : "../../js/lng/dataTables.french.json"
		}
	});

	function setPatient(name, id){
		$("#nompatient",window.opener.document).val(name);
		$("#patient",window.opener.document).val(id);
		window.close();
	}
</script>
</body>
</html>