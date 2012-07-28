<h2 class="page_title">Liste des patients</h2>

<div class="util_btn" onclick="addPatient()">Ajouter un patient</div>

<div class="tablist_container">
	<table id="list">
		<thead>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date de naissance</th>
			<th>Adresse</th>
			<th>Numero de telephone</th>
			<th style="width: 16px">&nbsp;</th>
			<th style="width: 16px">&nbsp;</th>
		</thead>
		
		<tbody>
			<?php
				foreach ($patients as $key => $patient) {
			?>
			<tr>
				<td><?php echo $patients[$key]['nom']; ?></td>
				<td><?php echo $patients[$key]['prenom']; ?></td>
				<td><?php echo $patients[$key]['date_naissance']; ?></td>
				<td><?php echo $patients[$key]['adresse']; ?></td>
				<td><?php echo $patients[$key]['tel']; ?></td>
				<td><img src="images/del_icon.jpg" width="16" height="16" onclick="delPatient('<?php echo $patients[$key]['idpatient']; ?>')" /></td>
				<td><img src="images/view_details.png" width="16" height="16" onclick="detailPatient('<?php echo $patients[$key]['idpatient']; ?>')" /></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$("#list").dataTable({
		"bJQueryUI":true,
		"sPaginationType":"full_numbers",
		"oLanguage":{
			"sUrl":"js/lng/dataTables.french.json"
		}
	});
	
	function delPatient(id){
		if(confirm("Etes vous sure de vouloire supprimer ce patient ?")){
			window.location.href='index.php?page=patients&action=del&id='+id;
		}
	}
	
	function addPatient(){
		if(confirm("Passez a la fenetre de creation de patient ?")){
			window.location.href='index.php?page=patients&action=add'
		}
	}
	
	function detailPatient(id){
		if(confirm("Afficher les details du patient ?")){
			window.location.href='index.php?page=patients&action=detail&id='+id;
		}
	}
</script>