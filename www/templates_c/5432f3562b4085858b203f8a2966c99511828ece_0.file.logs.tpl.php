<?php
/* Smarty version 3.1.29, created on 2017-01-17 19:27:51
  from "C:\inetpub\wwwroot\templates\logs.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587e46076f7913_26217582',
  'file_dependency' => 
  array (
    '5432f3562b4085858b203f8a2966c99511828ece' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\logs.tpl',
      1 => 1484670407,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_587e46076f7913_26217582 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<p>

<h2>Import logs</h2>

<h3>Duplicate Student's</h3>


	<table class="table table-striped" >
              <thead>
				<tr>
                  <th >Name</th>
                  <th >Username</th>
                  <th >Year/Form</th>
                </tr>
		</thead>



<?php if (is_array($_smarty_tpl->tpl_vars['duplicates']->value)) {?>
		<?php
$_from = $_smarty_tpl->tpl_vars['duplicates']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_0_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['foo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
$__foreach_foo_0_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?>
   				<tr>
                  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value['Name'];?>
</th>
				  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value['username'];?>
</th>
                  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value['year'];?>
</th>
                </tr>
		<?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_local_item;
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_item;
}
?>
		</table>
<?php } else { ?>

   				<tr>
                  <th > - </th>
				  <th > None </th>
                  <th > - </th>
                </tr>
		</table>
<?php }?>





<h3>Staff import log</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['staff_log']->value;?>
</pre>

<h3>Year 7</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year7_log']->value;?>
</pre>

<h3>Year 8</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year8_log']->value;?>
</pre>

<h3>Year 9</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year9_log']->value;?>
</pre>

<h3>Year 10</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year10_log']->value;?>
</pre>

<h3>Year 11</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year11_log']->value;?>
</pre>

<h3>Year 12</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year12_log']->value;?>
</pre>

<h3>Year 13</h3>
<pre><?php echo $_smarty_tpl->tpl_vars['year13_log']->value;?>
</pre>

</p>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
