<h2 class="page_title">Fiche du patient</h2>

<div id="patient_tool">
	<div onclick="dt_cons('<?php echo $patients[0]['idpatient']; ?>')">Details des consultations</div>
	<div onclick="dt_exams('<?php echo $patients[0]['idpatient']; ?>')">Details des examens</div>
	<!--<div onclick="dt_evo('<?php echo $patients[0]['idpatient']; ?>')">Evolutions</div>-->
</div>

<div class="fiche">
	<span class="label">Nom :</span><span class="info"><?php echo $patients[0]['nom']; ?></span>
	<span class="label">Prenom :</span><span class="info"><?php echo $patients[0]['prenom']; ?></span>
	<span class="label">Date de naissance :</span><span class="info"><?php echo $patients[0]['date_naissance']; ?></span>
	<span class="label">Adresse :</span><span class="info"><?php echo $patients[0]['adresse']; ?></span>
	<span class="label">Telephone :</span><span class="info"><?php echo $patients[0]['tel']; ?></span>
	<span class="label">Antecedents familiaux :</span><span class="info"><?php echo $patients[0]['aicdf']; ?></span>
	<span class="label">Antecedents personnels :</span><span class="info"><?php echo $patients[0]['aicdp']; ?></span>
</div>

<div id="detail_frm">
	
</div>

<script type="text/javascript">
function dt_cons(id){
	$.ajax({
		method: 'GET',
		url: 'ajax/cons_by_patient.php',
		data: {'id': id},
		success: function(data){
			$("#detail_frm").html(data);
		}
	})
}

function dt_exams(id){
	$.ajax({
		method: 'GET',
		url: 'ajax/exam_by_patient.php',
		data: {'id': id},
		success: function(data){
			$("#detail_frm").html(data);
		}
	})
}

function dt_evo(id){
	$.ajax({
		method: 'GET',
		url: 'ajax/evo_by_patient.php',
		data: {'id': id},
		success: function(data){
			$("#detail_frm").html(data);
		}
	})
}
</script>