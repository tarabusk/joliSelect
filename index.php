<!DOCTYPE html>
<html lang="fr">
  <head>
	<title>joliSelect</title>
	<meta charset="utf-8">
	
	
	<link href='http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here|Cousine|Open+Sans|Special+Elite' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet"  href="joliSelect.css"/>
	
	
	</head>
	<?php 
	  if (isset ($_REQUEST["joli_txt_combo_fruit"])){
	    echo  $_REQUEST["joli_txt_combo_font"].' (Value = '.$_REQUEST["combo_font"].')<br/>';
	    echo  $_REQUEST["joli_txt_combo_fruit"].' (Value = '.$_REQUEST["combo_fruit"].')<br/>';
		echo  $_REQUEST["joli_txt_combo_legume"].' (Value = '.$_REQUEST["combo_legume"].')<br/>';
		echo  $_REQUEST["joli_txt_combo_fleur"].' (Value = '.$_REQUEST["combo_fleur"].')<br/>';
	  }
	?>
	<body>   		
		  <form method="POST" action="">	
		
			 <select id="combo_font" >
			  <option style="font-family: 'Open Sans'" value="'Open Sans'" selected="selected">Open Sans</option>	
			  <option style="font-family: 'Special Elite'" value="'Special Elite'" selected="selected">Special Elite</option>	
			  <option style="font-family: 'Just Me Again Down Here'"value="'Just Me Again Down Here'" >Just Me Again Down Here</option>
			  <option style="font-family: 'Cousine'" value="'Cousine'" selected="selected">Cousine</option>			  
			</select>
			
			<select id="combo_fruit" >
			  <option value="1" >Orange**Orange means Orange</option>
			  <option value="2" selected="selected">Banane**Banane means Bananas</option>
			  <option value="3">Pomme**Pomme means Apple</option>
			  <option value="4">Poire**Poire means Pear</option>
			  <option value="5">Kiwi**Kiwi means Kiwi</option>
			  <option value="6">Fraise**Fraise means Strawberry </option>
			  <option value="7">Ananas**Ananas means Pineapple</option>
			  <option value="8">Mangue**Mangue means Mango</option>
			  <option value="9">Framboise** Framboise .. i don't know</option>
			  <option value="10">L'éléphant rose à pois verts ** pink Elephant</option>
			</select>
		
			<select id="combo_legume" >
			  <option value="1" >Poireaux</option>
			  <option value="2">Petits pois</option>
			  <option value="3">Asperges</option>
			  <option value="4">Concombre</option>
			  <option value="5">Tomate ?</option>
			  <option value="6">Oignon</option>
			  
			</select>
		
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
<style type="text/css" media="screen">
input{
margin:10px ;
}
</style>
</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>	
<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
<script  src="joliSelect.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    $('#combo_font').joliSelect(
   {
    'width': '200',
	'fontfamilyselect' : true,
	'bkdColor'       : '#d6d7ea',
	'bkdColorSelect' : '#c1c8dd',
	'arrowColor'     : '#c1c8dd',
	'fontColor'      : '#6b80a5',
	
   });
    $('#combo_fruit').joliSelect(
   {
    'width': '200'
   });
   
   $('#combo_legume').joliSelect(
   {
    'width'          : '160',
	'bkdColor'       : '#caec7c',
	'bkdColorSelect' : '#b3e251',
	'arrowColor'     : '#b3e251',
	'fontColor'      : '#4e6d16',
	'maxHeight'      : '200',
	'defaultText'    : 'Choisir un légume'
   });
   
   $('#combo_fleur').joliSelect(
   {
    'width'          : '200',
	'bkdColor'       : '#e0c1c1',
	'bkdColorSelect' : '#e09188',
	'arrowColor'     : '#e09188',
	'fontColor'      : '#d0404d',
	'maxHeight'      : '200'
   });
  })
</script>

