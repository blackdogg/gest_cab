<?php
include('../db.php');
//$nConsQuery = $db->query("SELECT COUNT(idconsultation) FROM consultation WHERE patient_idpatient=".$db->quote($_GET['id'],PDO::PARAM_STR));
$examsQuery = $db->query("SELECT nom_exam, date_exam, rapport
						FROM patient_exam
						INNER JOIN type_exam ON type_exam.idtype_exam = patient_exam.type_exam_id
						WHERE patient_idpatient=".$db->quote($_GET['id'],PDO::PARAM_STR));
$exams = $examsQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<table id="lstab">
	<thead>
		<th>Examen</th>
		<th>Date de l'examen</th>
		<th>Rapport</th>
	</thead>
	
	<tbody>
		<?php
			foreach ($exams as $key => $exam) {
		?>
		<tr>
			<td><?php echo $exams[$key]['nom_exam']; ?></td>
			<td><?php echo $exams[$key]['date_exam']; ?></td>
			<td><?php echo $exams[$key]['rapport']; ?></td>
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