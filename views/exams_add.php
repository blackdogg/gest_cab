<h2 class="page_title">Ajouter un examen</h2>

<form name="add_exam" method="post" action="">
	<label for="patient">Patient :</label>
	<span><input type="text" name="nompatient" id="nompatient" readonly="readonly" />
	<img class="pop_btn" src="images/patients-icon.gif" width="16" height="16" onclick="popSelectPatient()" /></span>
	<input type="hidden" name="patient" id="patient" />

	<label for="exam">Examen :</label>
	<select name="exam" id="exam">
		<?php
			include('db.php');
			$examsQuery = $db->query("SELECT idtype_exam, nom_exam FROM type_exam");
			$types = $examsQuery->fetchAll(PDO::FETCH_ASSOC);
			foreach ($types as $key => $t) {
		?>
		<option value="<?php echo $types[$key]['idtype_exam']; ?>"><?php echo $types[$key]['nom_exam']; ?></option>
		<?php
		} ?>
	</select>

	<label for="dt_exam">Date :</label>
	<input type="text" name="dt_exam" id="dt_exam" />

	<label for="rapport">Rapport :</label>
	<textarea id="rapport" name="rapport"></textarea>
	<div class="form_ctrl">
		<input type="submit" name="ok" id="ok" value="Valider"/>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function() {
		$("#dt_exam").datepicker({
			yearRange : "-0:+5",
			changeMonth : true,
			changeYear : true
		});
		$("#dt_exam").datepicker("option", "dateFormat", "yy-mm-dd");
	});

	function popSelectPatient() {
		popup = window.open('views/popups/patient_list.php', 'Selection du patient', 'width=720,height=480');
	}
</script>

<?php
if (isset($_POST['ok'])) {
	$exam = new Examen($_POST['exam'], $_POST['patient'], $_POST['dt_exam'], $_POST['rapport']);
	$examDAO = new examDAO_Impl;
	$examDAO -> persistExam($exam);
}
?>