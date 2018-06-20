<?php
/* Smarty version 3.1.29, created on 2017-01-17 19:35:53
  from "C:\inetpub\wwwroot\templates\reports.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587e47e9371506_18452956',
  'file_dependency' => 
  array (
    'a6dd78c8af3204cf03124874bdda9720df106646' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\reports.tpl',
      1 => 1484670946,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_587e47e9371506_18452956 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <h1 class="sub-header">Report</h1>
		
		
	A full report can be download using the download link below;<br><br> 


	
	<button type="button" class="btn btn-primary btn-md" onclick="window.location='<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/download_report/';" >Download</button>
	
    </div>
        
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
