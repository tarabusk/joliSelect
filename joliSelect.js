/* 	jquery joliSelect - jQuery plugin
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
	     if ($.browser.msie && (parseInt($.browser.version) < 7))  exit;
            //On définit nos paramètres par défaut
            var defauts=
            {      
		'bkdColor'      :'#e7e9ba',  // BackgroundColor of the joliSelect		
		'bkdColorSelect':'#e7d2a0',  // BackgroundColor of the selected item 
        'arrowColor'    : '#e7d2a0', // Color of the arrow		
		'fontColor'     : '#555555', //
		'width'         : '0',       //width of the element if not determined, we take the width of the SELECT element
		'defaultWidth'  : '200',     // If no width found 
		'maxHeight'     : '260',     // Max height of the list
		'tailleFleche'  : '6',
		'defaultText'   : 'Choose',   // Text if no selected item
		'separateur'    : '**'
            };  
            
            var parametres    = $.extend(defauts, options);			
            
            return this.each(function()
        {     
            var element         = $(this);
			var nom_base        ='_'+element.attr('id');			
            var totalItems      = element.find('option').length;
            var availableTags   = '[';           
			var joli_val        = new Array ();
			var joli_txt        = new Array ();			
			var largeur_element = element.css('width');
			
			/*var labelAss=element.prev("label");
			if (labelAss.attr('for')==element.attr('id')){
			  labelAss.attr('for', 'joliSelect'+nom_base);
			}*/
			
			var objet_conteneur = $('<div class="joliSelect" id="joliSelect'+nom_base+'"></div>');
			objet_conteneur.insertAfter (element);
			objet_conteneur.css("margin", element.css("margin") );
			
			var objet_joli_txt=$( "<input type='text' autocomplete='off' class='joli_txt' name='joli_txt"+nom_base+"' id='joli_txt"+nom_base+"' />" );
			objet_conteneur.append (objet_joli_txt);
			
			
			var obj_combo_fleche = $( "<b id='combo_fleche"+nom_base+"' class='combo_fleche'> </b>" );
            obj_combo_fleche.insertAfter (objet_joli_txt);
			
			
			var objet_joli_val=$( "<input type='hidden' name='joli_val"+nom_base+"' id='joli_val"+nom_base+"'  />" );
			objet_joli_val.insertAfter (obj_combo_fleche);
			
			var html = '';  				
			html += '<ul id="combo'+nom_base+'">';			
           
		    joli_txt[nom_base] = parametres.defaultText;
			joli_val[nom_base] = -1;
					
            element.find('option').each(function(i) //Puis on parcourt chaque item !
            {	
			  var tabTxt = $(this).html().split(parametres.separateur);		            		  
			  var txtItem = tabTxt[0];
			  if (tabTxt.length > 1)
			    var txtShow = tabTxt[1];
			  else
			    var txtShow = tabTxt[0];
			 
              var classe_selected='';  			
			  if ($(this).attr('selected')){			     
			    joli_txt[nom_base]  = txtShow;				
				if ($(this).val()!='')
			      joli_val[nom_base]    = $(this).val();
				else
				  joli_val[nom_base]    = txtShow;
				classe_selected  = 'item_sel';
			  }
			  html += '<li class="'+classe_selected+'">'+txtItem;
			  html += '<input type="hidden" class="hidden'+nom_base+'" value="'+$(this).val()+'" />';
			  html += '<input type="hidden" class="txtS'+nom_base+'" value="'+txtShow+'" />';
			  html += ' </li>';	
			  
			  availableTags +='{id : "'+$(this).val()+'", label :"'+txtItem+'", labelS :"'+txtShow+'"}';	
			  if (i+1<totalItems) availableTags+=',';
            });		
			html += '</ul>';
			element.remove();
			var objet_combo=$( html );
			objet_combo.insertAfter (objet_joli_val);
				
			
			availableTags+=']';
			availableTags=eval(availableTags);					
          		
			objet_joli_txt.val(joli_txt[nom_base]);
			objet_joli_txt.attr('title',joli_txt[nom_base]);
			objet_joli_val.val(joli_val[nom_base]);       
			
			if (parametres.width > 0){			 
			  var largeur_combo = parametres.width;
			}else if (largeur_element > 0){
			  var largeur_combo = Math.max (10,parseInt(largeur_element));
			}else{
              var largeur_combo = parametres.defaultWidth;
            }			
			
			largeur_combo = parseInt(largeur_combo)-parseInt(2*parametres.tailleFleche);
			//Affectation des styles 
			objet_joli_txt.css(
                    {
                        'width': largeur_combo+'px',	                      		
						'background': parametres.bkdColor,
                        'border': '1px solid '+parametres.bkdColorSelect,
                        'color':parametres.fontColor 						
                    });
					
			objet_combo.css({                   
					    'width': parseInt(objet_joli_txt.css('width')) + + parseInt(objet_joli_txt.css('paddingRight'))+'px',
					/*	'left':objet_joli_txt.position().left,*/
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
			
			var fleche_left=-2*parseInt(parametres.tailleFleche)-parseInt(2);		
			obj_combo_fleche.css(
                    {					    
						'borderRight': parametres.tailleFleche+'px solid transparent',
						'borderTop': parseInt(parametres.tailleFleche)+parseInt(2) +'px solid '+parametres.arrowColor,
						'borderLeft': parametres.tailleFleche+'px solid transparent',                       
						'margin': parseInt(objet_joli_txt.css('height')) - parametres.tailleFleche-parseInt(2)+'px 0px 0px '+ fleche_left+'px'
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
                         joli_txt[nom_base] = ui.item.labelS;	
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
			    joli_txt[nom_base] = $(this).children('input[type=hidden][class=txtS'+nom_base+']').val();			 
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
