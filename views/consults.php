<h2 class="page_title">Liste des consultations</h2>

<div style="margin-bottom: 25px">
	<form method="post" action="" id="filter_form_exam">
		<label for="nompatient">Nom :</label>
		<input type="text" name="nompatient" id="nompatient" />
		<img class="pop_btn" src="images/patients-icon.gif" width="24" height="24" onclick="popSelectPatient()" />
		<input type="hidden" name="patient" id="patient" />
		<label for="date">Date :</label>
		<input type="text" name="dt" id="dt" />
		<div class="form_ctrl">
			<input type="submit" name="ok" id="ok" value="Filtrer" />
		</div>		
	</form>
</div>

<div class="tablist_container">
	<table id="list">
		<thead>
			<th>Patient</th>
			<th>Date</th>
			<th>Rapport</th>
		</thead>

		<tbody>
			<?php
			if($consults != NULL){
			foreach($consults as $key => $consult){
			?>
			<tr>
				<td><?php echo $consults[$key]['nom'] . " " . $consults[$key]['prenom']; ?></td>
				<td><?php echo $consults[$key]['nom_exam']; ?></td>
				<td><?php echo $consults[$key]['date_exam']; ?></td>
			</tr>
			<?php
			}
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#dt").datepicker($.datepicker.regional['fr']);
		$("#dt").datepicker({
			dateFormat : 'yy-mm-dd'
		});
	});

	$("#list").dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",
		"oLanguage" : {
			"sUrl" : "js/lng/dataTables.french.json"
		}
	});

	function popSelectPatient() {
		popup = window.open('views/popups/patient_list.php', 'Selection du patient', 'width=720,height=480');
	}

</script>