<h2 class="page_title">List des examens</h2>
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
			<th>Examen</th>
			<th>Date</th>
		</thead>

		<tbody>
			<?php
			if($examens != NULL){
			foreach($examens as $key => $exam){
			?>
			<tr>
				<td><?php echo $examens[$key]['nom'] . " " . $examens[$key]['prenom']; ?></td>
				<td><?php echo $examens[$key]['nom_exam']; ?></td>
				<td><?php echo $examens[$key]['date_exam']; ?></td>
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