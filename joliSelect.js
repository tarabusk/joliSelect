/*   jquery joliSelect - jQuery plugin
 *	written by Gaëlle Vaudaine	
 *
 *	Copyright (c) 2013 Gaëlle Vaudaine (http://tarabusk.net)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */
 /*
 *	markup example for $("#combo").joliSelect();
 *	
 * 	<div id="combo">
       <form method="GET" action="page.html">
         <select id="combo">
          <option value="" selected></option>
          <option value=""></option>
          <option value=""></option>
          ....
         </select>
       </form>
	</div>
 */

(function($)
{ 
    $.fn.joliSelect=function(options)
    {     
            //On définit nos paramètres par défaut
            var defauts=
            {      
		'bkdColor'      :'#e7e9ba', // Couleur de fond de l'élément tara.combo		
		'bkdColorSelect':'#e7d2a0', // Couleur de fond de l'élément sélectionné tara.combo
		'fontColor'     : '#555555',
		'width'         : '150',       //Largeur de l'élément
		'maxHeight'     : '260',
		'tailleFleche'  : '6',
		'defaultText'   : 'Choose'
            };  
            
            var parametres    = $.extend(defauts, options);			
            
            return this.each(function()
        {     
            var element        = $(this);
			var nom_base='_'+element.attr('id');
			
            var totalItems     = element.find('option').length;
            var availableTags  = '[';           
			var joli_val   = new Array ();
			var joli_txt = new Array ();
			
			var obj_combo_fleche = $( "<b id='combo_fleche"+nom_base+"' class='combo_fleche'> </b>" );
            obj_combo_fleche.insertAfter (element);
			
			var objet_joli_txt=$( "<input type='text' autocomplete='off' class='joli_txt' name='joli_txt"+nom_base+"' id='joli_txt"+nom_base+"' />" );
			objet_joli_txt.insertAfter (obj_combo_fleche);
			
			var objet_joli_val=$( "<input type='hidden' name='joli_val"+nom_base+"' id='joli_val"+nom_base+"'  />" );
			objet_joli_val.insertAfter (objet_joli_txt);
			
			var html = '';  				
			html += '<ul id="combo'+nom_base+'">';			
           
		    joli_txt[nom_base] = parametres.defaultText;
			joli_val[nom_base]   = 0;
            element.find('option').each(function(i) //Puis on parcourt chaque item !
            {	
              var classe_selected='';  			
			  if ($(this).attr('selected')){
			    joli_txt[nom_base]  = $(this).html();
				if ($(this).val()!='')
			      joli_val[nom_base]    = $(this).val();
				else
				  joli_val[nom_base]    = $(this).html();
				classe_selected  = 'item_sel';
			  }
			  html += '<li class="'+classe_selected+'">'+$(this).html();
			  html += '<input type="hidden" class="hidden'+nom_base+'" value="'+$(this).val()+'" />';//name="option_value"  
			  html += ' </li>';		
			  availableTags +='{id : "'+$(this).val()+'", label :"'+$(this).html()+'"}';	
			  if (i+1<totalItems) availableTags+=',';
            });
			html += '</ul>';
			
			var objet_combo=$( html );
			objet_combo.insertAfter (objet_joli_val);
			
			availableTags+=']';
			availableTags=eval(availableTags);					
            element.css("display", "none"); 
			objet_joli_txt.val(joli_txt[nom_base]);
			objet_joli_txt.attr('title',joli_txt[nom_base]);
			objet_joli_val.val(joli_val[nom_base]);       
			
			//Affectation des styles 
			objet_joli_txt.css(
                    {
                        'width': parseInt(parametres.width)-parseInt(2*parametres.tailleFleche)+'px',	
                        'paddingRight': 2*parametres.tailleFleche+'px', 						
						'background': parametres.bkdColor,
                        'border': '1px solid '+parametres.bkdColorSelect,
                        'color':parametres.fontColor 						
                    });
			objet_combo.css(
                    {
					    'width': parametres.width+'px',
						'padding':'2px',
                        'background': parametres.bkdColor,
                        'border': '1px solid '+parametres.bkdColorSelect,
						'maxHeight': parametres.maxHeight+'px',
						'display':'none',
						'color': parametres.fontColor,
						'overflowY':'scroll',				  
				        'position':'absolute',
						'listStyle':'none',
				        'zIndex':'2', 
						'marginTop':'2px'
                    });
			
			$("#combo"+nom_base+" li").css(
                    {					    
						'padding':'2px',
                        'display': 'block',
                        'cursor': 'pointer',						
						'color':parametres.fontColor
                    });		
				
			var fleche_left=parseInt(parametres.width)-parseInt(parametres.tailleFleche)-parseInt(3);		
			obj_combo_fleche.css(
                    {
					    
						'borderRight': parametres.tailleFleche+'px solid transparent',
						'borderTop': parseInt(parametres.tailleFleche)+parseInt(2) +'px solid '+parametres.bkdColorSelect,
						'borderLeft': parametres.tailleFleche+'px solid transparent',                       
						'margin': '12px 0px 0px '+ fleche_left+'px'
                    });
			
				
			function closeCombo(e){		 		  					
			  objet_joli_txt.val(joli_txt[nom_base]);
              objet_joli_txt.attr('title',joli_txt[nom_base]);			  
			  objet_joli_val.val(joli_val[nom_base]);
			  objet_combo.hide('fast');
			  $("#combo"+nom_base+" li").removeClass("item_sel");          		  
			  $('input[type=hidden][class=hidden'+nom_base+'][value='+joli_val[nom_base]+']').parent('li').addClass("item_sel");	
              //e.stopPropagation(); 	//Viré car pose problème avec l'autocomplétion, ne valide pas le choix. Pb à résoudre !		  
			}
			
			// Affectation des événements sur les objets 		
			$('html').click(function(e){          		
			  if(e.target.id == objet_joli_txt.attr('id') || e.target.id == objet_combo.attr('id') ||e.target.id == obj_combo_fleche.attr('id')) {
			  } else {
			    closeCombo(e);		
			  }
			});
			
			objet_joli_txt.autocomplete({ 
			  source: availableTags,
			  minLength: 1,
			  select: function(event, ui)
						{		
                         					
                         joli_txt[nom_base] = ui.item.label;	
                         joli_val[nom_base]   = ui.item.id;	
						 return false;                        						 
						},
			  close: function(event, ui)
						{							 					 
						} 				   
		    });
			
			$("#combo"+nom_base+" li").hover(
			  function () {
				$(this).css({'background':parametres.bkdColorSelect});
			  },
			  function () {
				$(this).css({'background':parametres.bkdColor});
			  }
			);

			
			$("#combo"+nom_base+" li").click(function() {	    
				joli_txt[nom_base] = $(this).text();
				joli_val[nom_base]   = $(this).children('input').val();               				
                $("#select_combo").toggle('fast');   							
            });
			
			objet_joli_txt.click(function() {	
                objet_combo.show('fast');
				objet_joli_txt.val('');
            });
			
			objet_combo.click(function(e) {		
                closeCombo(e);
            });
			
            objet_joli_txt.keyup(function(e) { 
			  var letter = String.fromCharCode(e.keyCode);			                
            });			

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });
        });                        
    };
})(jQuery);
