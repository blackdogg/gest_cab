<h2>Ajout d'un patient</h2>

<form name="add_patient" method="post" >
	<label for="nom">Nom :</label>
	<input type="text" name="nom" id="nom" />
	
	<label for="pren">Prenom :</label>
	<input type="text" name="pren" id="pren" />
	
	<label for="dt_naiss">Date de naissance :</label>
	<input type="date" name="dt_naiss" id="dt_naiss" />
	
	<label for="addr">Adresse :</label>
	<input type="text" name="addr" id="addr" />
	
	<label for="aicdf">Antecedents familiaux :</label>
	<input type="text" name="aicdf" id="aicdf" />
	
	<label for="aicdp">Antecedents personnels :</label>
	<input type="text" name="aicdp" id="aicdp" />
	
	<label for="sf">Symptomes :</label>
	<input type="text" name="sf" id="sf" />
	
	<label for="sp">Symptomes physiques :</label>
	<input type="text" name="sp" id="sp" />
	
	<input type="submit" name="valider" id="valider" value="Valider" />
	<input type="reset" name="effacer" id="effacer" value="Efacer" />
</form>