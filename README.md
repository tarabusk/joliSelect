joliSelect
==========

NICE JQUERY SELECTBOX/DROP-DOWN PLUGINS
joliCombo
=========

This is a jQuery SelectBox/Drop Down Plugin

The jQuery joliCombo Plugin allows to skin in a cute way yout HTML Select element.

<form method="POST" action="">   
  <select id="combo_fruit" >
     <option value='1' >Apple</option>
     <option value='2' selected="selected">Banana</option>
     <option value='3' >Pear</option>    
   </select> 
</form>

<script type="text/javascript">
  $(document).ready( function () {
    $('#combo_fruit').joliSelect (
     {
       'width'          : '160',
       'bkdColor'       : '#caec7c',
       'bkdColorSelect' : '#b3e251',
       'fontColor'      : '#4e6d16',
       'maxHeight'      : '200',
       'defaultText'    : 'Choose a fruit'
     });   
  })
</script>

You get back datas after submit the form
Value of the selected data $_REQUEST['joli_val_combo_fruit']
Text of the selected data  $_REQUEST['joli_txt_combo_fruit']

Where the segment 'combo_fruit' has to be replaced by the id of yout HTML Select element

You need javascript and the autocomplete jQuery Plugin
