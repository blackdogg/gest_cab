<h2 class="page_title">Ajout d'un patient</h2>

<form name="add_patient" method="post" action="">
	<fieldset>
		<legend>
			Informations personnelles
		</legend>
		<label for="nom">Nom :</label>
		<input type="text" name="nom" id="nom" />

		<label for="pren">Prenom :</label>
		<input type="text" name="pren" id="pren" />

		<label for="dt_naiss">Date de naissance :</label>
		<input type="text" name="dt_naiss" id="dt_naiss" />

		<label for="addr">Adresse :</label>
		<input type="text" name="addr" id="addr" />

		<label for="tel">Telephone :</label>
		<input type="text" name="tel" id="tel" />
	</fieldset>

	<fieldset>
		<legend>
			Informations medicales
		</legend>
		<label for="aicdf">Antecedents familiaux :</label>
		<input type="text" name="aicdf" id="aicdf" />

		<label for="aicdp">Antecedents personnels :</label>
		<input type="text" name="aicdp" id="aicdp" />

		<label for="sf">Symptomes :</label>
		<input type="text" name="sf" id="sf" />

		<label for="sp">Symptomes physiques :</label>
		<input type="text" name="sp" id="sp" />
	</fieldset>

	<div class="form_ctrl">
		<input type="submit" name="valider" id="valider" value="Valider" />
		<input type="reset" name="effacer" id="effacer" value="Efacer" />
	</div>
</form>

<script type="text/javascript">	
	$(document).ready(function() {
		$("#dt_naiss").datepicker({
			yearRange : "-120:-5",
			changeMonth : true,
			changeYear : true
		});
		$("#dt_naiss").datepicker("option", "dateFormat", "yy-mm-dd");
	});
</script>

<?php
if (isset($_POST['valider'])) {
	$patient = new Patient($_POST['nom'], $_POST['pren'], $_POST['dt_naiss'], $_POST['addr'], $_POST['sf'], $_POST['sp'], $_POST['aicdf'], $_POST['aicdp'], $_POST['tel']);
	$patientDAO = new PatientDAO_Impl();
	$patientDAO -> persistPatient($patient);
}
?>