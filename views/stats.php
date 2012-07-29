<h2 class="page_title">Statistiques</h2>

<div style="margin-bottom: 25px">
	<form method="post" action="" name="filter_form_stats" id="filter_form_exam" onsubmit="return check()">
		<label for="dt_from">Du :</label>
		<input type="text" name="dt_from" id="dt_from" class="dt_input"/>
		<label for="dt_to">Au :</label>
		<input type="text" name="dt_to" id="dt_to" class="dt_input"/>
		<div class="form_ctrl">
			<input type="submit" name="ok" id="ok" value="Filtrer" />
			<input type="reset" name="cancel" id="cancel" value="Effacer" />
		</div>		
	</form>
</div>

<div class="fiche">
	<?php
	if(!empty($stats)){
	?>
	<span class="label">Nombre de consultations :</span><span class="info"><?php echo $stats['ncons']; ?></span>
	<span class="label">Total examen :</span><span class="info"><?php echo $stats['total']; ?></span>
	<span class="label">Echo Doppler Cardiaque :</span><span class="info"><?php echo $stats['edc']; ?></span>
	<span class="label">Echo Doppler Vasculaire  :</span><span class="info"><?php echo $stats['edv']; ?></span>
	<span class="label">MAPA :</span><span class="info"><?php echo $stats['mapa']; ?></span>
	<span class="label">Holter ECG  :</span><span class="info"><?php echo $stats['ecg']; ?></span>
	<?php
	}
	?>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#dt_from").datepicker($.datepicker.regional['fr']);
		$("#dt_from").datepicker("option", "dateFormat", "yy-mm-dd");
		
		$("#dt_to").datepicker($.datepicker.regional['fr']);
		$("#dt_to").datepicker("option", "dateFormat", "yy-mm-dd");
	});

	$("#list").dataTable({
		"bJQueryUI" : true,
		"sPaginationType" : "full_numbers",
		"oLanguage" : {
			"sUrl" : "js/lng/dataTables.french.json"
		}
	});
	
	function check(){
		if((document.filter_form_stats.dt_from.value == "") || (document.filter_form_stats.dt_to.value == "")){
			alert("Veuillez entrez  deux dates.");
			return false;
		}
		if((document.filter_form_stats.dt_from.value != "") && (document.filter_form_stats.dt_to.value == "")){
			alert("Veuillez entrez  deux dates.");
			return false;
		}
		return true;
	}
</script>