<?php
include('../db.php');
$nConsQuery = $db->query("SELECT COUNT(idconsultation) FROM consultation WHERE patient_idpatient=".$db->quote($_GET['id'],PDO::PARAM_STR));
$consultationsQuery = $db->query("SELECT date, rapport FROM consultation WHERE patient_idpatient=".$db->quote($_GET['id'],PDO::PARAM_STR));
$consults = $consultationsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<table id="lstab">
	<thead>
		<th>Date consultation</th>
		<th>Rapport</th>
	</thead>
	
	<tbody>
		<?php
			foreach ($consults as $key => $cons) {
		?>
		<tr>
			<td><?php echo $consults[$key]['date']; ?></td>
			<td><?php echo $consults[$key]['rapport']; ?></td>
		</tr>
		<?php
			}
		?>
	</tbody>
</table>
<script type="text/javascript">
	$("#lstab").dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",
		"oLanguage" : {
			"sUrl" : "js/lng/dataTables.french.json"
		}
	});
</script>