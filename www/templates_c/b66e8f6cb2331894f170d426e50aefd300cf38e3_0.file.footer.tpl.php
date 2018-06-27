<?php
/* Smarty version 3.1.29, created on 2018-06-27 23:07:46
  from "C:\Users\784659\Documents\github\on-call\www\templates\footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b33fca294ac72_12642116',
  'file_dependency' => 
  array (
    'b66e8f6cb2331894f170d426e50aefd300cf38e3' => 
    array (
      0 => 'C:\\Users\\784659\\Documents\\github\\on-call\\www\\templates\\footer.tpl',
      1 => 1477655466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b33fca294ac72_12642116 ($_smarty_tpl) {
?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
     <?php echo '<script'; ?>
 src="../../../js/jquery-2.2.3.js"><?php echo '</script'; ?>
>
     <?php echo '<script'; ?>
 src="../../js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- DatePicker -->
	<?php echo '<script'; ?>
 src="../../js/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="../../js/locales/bootstrap-datepicker.en-GB.min.js" charset="UTF-8"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
>
	

    $('.form-control').datepicker({
        todayBtn: "linked",
        daysOfWeekDisabled: "5,6"
    });
	
	
	<?php echo '</script'; ?>
>
	
  </body>
</html>
<?php }
}
