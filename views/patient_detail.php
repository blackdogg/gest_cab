<div>
	<table id="list">
		<thead>
			<th>Nom</th>
			<th>Prenom</th>
		</thead>
		
		<tbody>
			<?php
				foreach ($patients as $patient) {
			?>
			<tr>
				<td><?php echo $patient['nom']; ?></td>
				<td><?php echo $patient['prenom']; ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>