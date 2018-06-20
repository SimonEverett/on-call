<?php
/* Smarty version 3.1.29, created on 2016-11-02 13:11:25
  from "C:\inetpub\wwwroot\templates\footer.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5819bbcd3874f1_79603415',
  'file_dependency' => 
  array (
    'd7e737a6cb5af0a4dd38728ef64d0d5ee495a7a3' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\footer.tpl',
      1 => 1477655466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5819bbcd3874f1_79603415 ($_smarty_tpl) {
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
