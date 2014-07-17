<!DOCTYPE html>
<html lang="fr">
  <head>
	<title>joliSelect</title>
	<meta charset="utf-8">
	
	
	<link href='http://fonts.googleapis.com/css?family=Just+Me+Again+Down+Here|Cousine|Open+Sans|Special+Elite' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet"  href="joliSelect.css"/>
	
	
	</head>
	
	<body>   
        <div id="txt_left">
		<h1>JoliSelect</h1>
		Transform you select HTML object. <br>
		<h2> Use </h2> 
		<div id="code">
		<?php
		echo htmlspecialchars('<select id="combo_fleur" >').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option>Gentiane</option>').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option>Pâquerette</option>').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option>Bleuet</option>').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option>Violette</option>').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option selected="selected">Muguet</option>').'<br/>'; 
		  echo '&nbsp;&nbsp;'.htmlspecialchars('   <option>Lys</option>').'<br/>'; 			  
		echo htmlspecialchars('</select>').'<br/><br/>'; 	

		echo htmlspecialchars(" $('#combo_fleur').joliSelect(){").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'width'          : '200',").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'bkdColor'       : '#e0c1c1',").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'bkdColorSelect' : '#e09188',").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'arrowColor'     : '#e09188',").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'fontColor'      : '#d0404d',").'<br/>'; 
		echo '&nbsp;&nbsp;'.htmlspecialchars("'maxHeight'      : '200'").'<br/>'; 
	    echo htmlspecialchars("});").'<br/>'; 
		?>
		</div>
		<h2> Options available </h2>
		<span class="opt">'bkdColor'</span>      :'#e7e9ba',  <span class="opt_comment"> BackgroundColor of the joliSelect	</span><br>	
		<span class="opt">'bkdColorSelect'</span>:'#e7d2a0',  <span class="opt_comment"> BackgroundColor of the selected item </span><br>
        <span class="opt">'arrowColor'</span>    : '#e7d2a0', <span class="opt_comment"> Color of the arrow		</span><br>
		<span class="opt">'fontColor'</span>     : '#555555', <span class="opt_comment"></span><br>
		<span class="opt">'width'</span>         : '0',       <span class="opt_comment">width of the element if not determined, we take the width of the SELECT element</span><br>
		<span class="opt">'defaultWidth'</span>  : '200',     <span class="opt_comment"> If no width found </span><br>
		<span class="opt">'defaultHeight'</span> : '',        <span class="opt_comment"></span><br>
		<span class="opt">'maxHeight'</span>     : '300',     <span class="opt_comment"> Max height of the list</span><br>
		<span class="opt">'tailleFleche'</span>  : '6',       <span class="opt_comment"></span> <br>
		<span class="opt">'defaultText'</span>   : 'Choose',  <span class="opt_comment"> Text if no selected item</span><br>
		<span class="opt">'separateur'</span>    : '**',      <span class="opt_comment"> Separateur between the text displayed for an item into the list and the text displayed when it is actually selected</span><br>
		<span class="opt">'autocomplete'</span>  : true,      <span class="opt_comment"> </span><br>
		<span class="opt">'fontfamilyselect'</span>:false,    <span class="opt_comment"> Add a customized font-family to any of each item</span><br>
	
        <h2> Dependencies </h2> 
		<ul>
			<li>jQuery</li>
			<li> jQuery UI if autocomplete feature is used</li>
		</ul>
        </div>	
       
		  <form method="POST" action="">
		<div id="resultat">
        <?php 
		  if (isset ($_REQUEST["joli_txt_combo_fruit"])){
			echo  "Exemple 1 : ".$_REQUEST["joli_txt_combo_font"].' (Value = '.$_REQUEST["combo_font"].')<br/>';
			echo  "Exemple 2 : ".$_REQUEST["joli_txt_combo_fruit"].' (Value = '.$_REQUEST["combo_fruit"].')<br/>';
			echo  "Exemple 3 : ".$_REQUEST["joli_txt_combo_legume"].' (Value = '.$_REQUEST["combo_legume"].')<br/>';
			echo  "Exemple 4 : ".$_REQUEST["joli_txt_combo_fleur"].' (Value = '.$_REQUEST["combo_fleur"].')<br/>';
			?>
			<div class="resultat_txt">Upper values are intentionnaly no pre-selected below </div>
			<?php
		  }
	   ?>
        </div>				  
		    <fieldset>
			<legend>  Exemple 1 : Select and show a font family </legend>
				 <select id="combo_font" >
				  <option style="font-family: 'Open Sans'" value="'Open Sans'">Open Sans</option>	
				  <option style="font-family: 'Special Elite'" value="'Special Elite'" selected="selected">Special Elite</option>	
				  <option style="font-family: 'Just Me Again Down Here'"value="'Just Me Again Down Here'" >Just Me Again Down Here</option>
				  <option style="font-family: 'Cousine'" value="'Cousine'" >Cousine</option>			  
				</select>
				
			</fieldset>
			
			<fieldset>
			<legend>  Exemple 2 : Add a different when the item is in the list and when it is selected </legend>
				<select id="combo_fruit" >				 
				  <option value="2" selected="selected">Banane**Banane (Banana)</option>
				  <option value="3">Pomme**Pomme (Apple)</option>
				  <option value="4">Poire**Poire (Pear)</option>
				  <option value="5">Kiwi**Kiwi (Kiwi)</option>
				  <option value="6">Fraise**Fraise (Strawberry) </option>
				  <option value="7">Ananas**Ananas (Pineapple)</option>
				  <option value="8">Mangue**Mangue (Mango)</option>
				  <option value="9">Framboise** Framboise(Raspberry)</option>
				  <option value="10">L'éléphant rose  ** (pink Elephant)</option>
				</select>
		    </fieldset>
			
			<fieldset>
			<legend>  Exemple 3 : No pre-selection </legend>
				<select id="combo_legume" >
				  <option value="1" >Poireaux</option>
				  <option value="2">Petits pois</option>
				  <option value="3">Asperges</option>
				  <option value="4">Concombre</option>
				  <option value="5">Tomate </option>
				  <option value="6">Oignon</option>			  
				</select>
		    </fieldset>
			
			<fieldset>
			<legend> Exemple 4 : Pre- selection </legend>
				<select id="combo_fleur" >
				  <option>Gentiane</option>
				  <option>Pâquerette</option>
				  <option>Bleuet</option>
				  <option>Violette</option>
				  <option selected="selected">Muguet</option>
				  <option>Lys</option>			  
				</select>
			</fieldset>
			<br/>
			<input type="submit" value="Valider">
		  </form>
		
	</body>
<style type="text/css" media="screen">
body{
color:#565656;
}
input{
margin: 10px ;
}
#txt_left{
width:500px;float:left;margin-right:10px;
}
form{
width:500px;float:left;
}
#resultat{
height:80px;
}
fieldset{
margin-top:20px;
}
.opt_comment{
font-size:12px;color:#c6c6c6;
}
.opt{
color:#e38d4c;
}
legend{
font-size:18px;color:#919191;
}
#code{
font-family:monospace;color:#7e81d4;
}
h2{
margin:5px;
}
.resultat_txt{
float:right;font-size:12px;color:#c6c6c6;
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
	'defaultText'    : 'Choose a  vegetable'
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

