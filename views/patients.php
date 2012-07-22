<div>
	<table id="list">
		<thead>
			<th>Nom</th>
			<th>Prenom</th>
		</thead>
		
		<tbody>
			<?php
				foreach ($patients as $key => $patient) {
			?>
			<tr>
				<td><?php echo $patients[$key]['nom']; ?></td>
				<td><?php echo $patients[$key]['prenom']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$("#list").dataTable({
		"bJQueryUI":true
	});
</script>