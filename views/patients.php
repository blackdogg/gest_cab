<h2>Liste des patients</h2>
<div class="tablist_container">
	<table id="list">
		<thead>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date de naissance</th>
			<th>Adresse</th>
			<th>Numero de telephone</th>
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
</script>