<h2 class="page_title">Fixer un rendez vous</h2>

<form name="add_rdv" method="post" action="">
	<label for="patient">Patient :</label>
	<span>
		<input type="text" name="nompatient" id="nompatient" readonly="readonly" />
		<img class="pop_btn" src="images/patients-icon.gif" width="16" height="16" onclick="popSelectPatient()" /></span>
	<input type="hidden" name="patient" id="patient" />

	<label for="motif">Motif :</label>
	<input type="text" name="motif" id="motif" />

	<label for="date">Date :</label>
	<input type="text" name="dt_rdv" id="dt_rdv" />
	<div class="form_ctrl">
		<input type="submit" name="ok" id="ok" value="Valider" />
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("#dt_rdv").datetimepicker({
			yearRange : "-0:+5",
			changeMonth : true,
			changeYear : true
		});
		$("#dt_rdv").datetimepicker("option", "dateFormat", "yy-mm-dd");
	});

	function popSelectPatient() {
		popup = window.open('views/popups/patient_list.php', 'Selection du patient', 'width=720,height=480');
	}
</script>

<?php
if (isset($_POST['ok'])) {
	$rdv = new Rdv($_POST['patient'], $_POST['dt_rdv'], $_POST['motif']);
	$rdvDAO = new rdvDAO_Impl;
	$rdvDAO -> persistRDV($rdv);
	safe_redirect('index.php?page=rdv&action=list');
}
?>