<h2>List des examens</h2>
<div>
	<form method="post" action="">
		<label for="nompatient">Nom :</label>
		<input type="text" name="nompatient" id="nompatient" /><img src="images/patients-icon.gif" width="16" height="16" onclick="popSelectPatient()" />
		<input type="hidden" name="patient" id="patient" />
		<label for="date">Date :</label>
		<input type="text" name="dt" id="dt" />
		<input type="submit" name="ok" id="ok" value="Filtrer" />
	</form>
</div>

<div>
	<table id="list">
		<thead>
			<th>Patient</th>
			<th>Examen</th>
			<th>Date</th>
		</thead>

		<tbody>
			<?php
			foreach($examens as $key => $exam){
			?>
			<tr>
				<td><?php echo $examens[$key]['nom'] . " " . $examens[$key]['prenom']; ?></td>
				<td><?php echo $examens[$key]['nom_exam']; ?></td>
				<td><?php echo $examens[$key]['date_exam']; ?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	function popSelectPatient() {
		popup = window.open('views/popups/patient_list.php', 'Selection du patient', 'width=720,height=480');
	}
</script>