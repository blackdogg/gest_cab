<h2 class="page_title">Liste des consultations</h2>

<div style="margin-bottom: 25px">
	<form method="post" action="" id="filter_form_exam">
		<label for="nompatient">Nom :</label>
		<input type="text" name="nompatient" id="nompatient" readonly="readonly"/>
		<img class="pop_btn" src="images/patients-icon.gif" width="24" height="24" onclick="popSelectPatient()" />
		<input type="hidden" name="patient" id="patient" />
		<label for="date">Date :</label>
		<input type="text" name="dt" id="dt" />
		<div class="form_ctrl">
			<input type="submit" name="ok" id="ok" value="Filtrer" />
		</div>		
	</form>
</div>
<div class="util_btn" onclick="addCON()">Ajouter une consultation</div>
<div class="tablist_container">
	<table id="list">
		<thead>
			<th>Patient</th>
			<th>Date</th>
			<th>Rapport</th>
			<th>&nbsp;</th>
		</thead>

		<tbody>
			<?php
			if($consults != NULL){
			foreach($consults as $key => $consult){
			?>
			<tr>
				<td><?php echo $consults[$key]['nom'] . " " . $consults[$key]['prenom']; ?></td>
				<td><?php echo $consults[$key]['date']; ?></td>
				<td><?php echo $consults[$key]['rapport']; ?></td>
				<td style="width: 16px"><img src="images/del_icon.jpg" width="16" height="16" onclick="delCON('<?php $consults[$key]['idconsultation']; ?>')" /></td>
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
		$("#dt").datepicker("option", "dateFormat", "yy-mm-dd");
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
	
	function addCON(){
		if(confirm("Passer a la fenetre d'ajout de consultation ?")){
			window.location.href='index.php?page=consult&action=add';
		}
	}
	
	function delCON(id){
		if(confirm("Ete vous sure de vouloir supprimer cette consultation ?")){
			window.location.href='index.php?page=exams&action=del&id'+id;
		}
	}
</script>