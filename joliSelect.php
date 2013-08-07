<!DOCTYPE html>
<html lang="fr">
  <head>
	<title>joliCssombo</title>
	<meta charset="utf-8">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
	<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
	<script  src="joliSelect.js"></script>
	<link rel="stylesheet"  href="joliSelect.css"/>
	
	
	</head>
	<?php 
	  if (isset ($_REQUEST["texte"])){
	    echo $_REQUEST["texte"].'<br/>' . $_REQUEST["joli_txt_combo_fruit"].' (Value = '.$_REQUEST["joli_val_combo_fruit"].')<br/>';
		echo  $_REQUEST["joli_txt_combo_legume"].' (Value = '.$_REQUEST["joli_val_combo_legume"].')<br/>';
		echo  $_REQUEST["joli_txt_combo_fleur"].' (Value = '.$_REQUEST["joli_val_combo_fleur"].')<br/>';
	  }
	?>
	<body>   		
		  <form method="POST" action="">
		    <input type="text" name="texte" value="Au jardin" />
			<br/>
			<select id="combo_fruit" >
			  <option value="1" >Orange</option>
			  <option value="2" selected="selected">Banane</option>
			  <option value="3">Pomme</option>
			  <option value="4">Poire</option>
			  <option value="5">Kiwi</option>
			  <option value="6">Fraise</option>
			  <option value="7">Ananas</option>
			  <option value="8">Mangue</option>
			  <option value="9">Framboise</option>
			  <option value="10">L'éléphant rose à pois verts se lance dans l'étang gris</option>
			</select>
			<br/>
			<select id="combo_legume" >
			  <option value="1" >Poireaux</option>
			  <option value="2">Petits pois</option>
			  <option value="3">Asperges</option>
			  <option value="4">Concombre</option>
			  <option value="5">Tomate ?</option>
			  <option value="6">Oignon</option>
			  
			</select>
			<br/>
			<select id="combo_fleur" >
			  <option>Gentiane</option>
			  <option>Pâquerette</option>
			  <option>Bleuet</option>
			  <option>Violette</option>
			  <option selected="selected">Muguet</option>
			  <option>Lys</option>			  
			</select>
			<br/>
			<input type="submit" value="Valider">
		  </form>

		
	</body>
</html>
<script type="text/javascript">
  $(document).ready( function () {
    $('#combo_fruit').joliSelect(
   {
    'width': '120'
   });
   
   $('#combo_legume').joliSelect(
   {
    'width'          : '160',
	'bkdColor'       : '#caec7c',
	'bkdColorSelect' : '#b3e251',
	'fontColor'      : '#4e6d16',
	'maxHeight'      : '200',
	'defaultText'    : 'Choisir un légume'
   });
   
   $('#combo_fleur').joliSelect(
   {
    'width'          : '200',
	'bkdColor'       : '#e0c1c1',
	'bkdColorSelect' : '#e09188',
	'fontColor'      : '#914f53',
	'maxHeight'      : '200'
   });
  })
</script>
  
