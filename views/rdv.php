<h2 class="page_title">Liste des rendez vous</h2>

<div style="margin-bottom: 25px">
	<form method="post" action="" id="filter_form_exam">
		<label for="nompatient">Nom :</label>
		<input type="text" name="nompatient" id="nompatient" readonly="readonly" />
		<img class="pop_btn" src="images/patients-icon.gif" width="24" height="24" onclick="popSelectPatient()" />
		<input type="hidden" name="patient" id="patient" />
		<label for="date">Date :</label>
		<input type="text" name="dt" id="dt" />
		<div class="form_ctrl">
			<input type="submit" name="ok" id="ok" value="Filtrer" />
		</div>		
	</form>
</div>
<div class="util_btn" onclick="addRDV()">Ajouter un rendez vous</div>
<div class="tablist_container">
	<table id="list">
		<thead>
			<th>Patient</th>
			<th>Date</th>
			<th>Motif</th>
			<th>&nbsp;</th>
		</thead>

		<tbody>
			<?php
			if($rdvs != NULL){
			foreach($rdvs as $key => $rdv){
			?>
			<tr>
				<td><?php echo $rdvs[$key]['nom'] . " " . $rdvs[$key]['prenom']; ?></td>
				<td><?php echo $rdvs[$key]['date']; ?></td>
				<td><?php echo $rdvs[$key]['motif']; ?></td>
				<td><img src="images/del_icon.jpg" width="16" height="16" onclick="delRDV('<?php $rdvs[$key]['idrdv']; ?>')" /></td>
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

	function addRDV(){
		if(confirm("Passer a la fenetre d'ajout de rendez vous ?")){
			window.location.href='index.php?page=rdv&action=add';
		}
	}
	
	function delRDV(id){
		if(confirm("Etes vous sure de vouloir annuler ce rendez vous ?")){
			window.location.href='index.php?page=rdv&action=del&id='+id;
		}
	}
</script>