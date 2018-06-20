<?php
/* Smarty version 3.1.29, created on 2016-11-02 14:03:58
  from "C:\inetpub\wwwroot\templates\admin.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5819c81ee6c866_41248888',
  'file_dependency' => 
  array (
    '39f15f995402c30c7a67b58f8636d7e17bf5ef3c' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\admin.tpl',
      1 => 1477655466,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5819c81ee6c866_41248888 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<br>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<?php if (isset($_smarty_tpl->tpl_vars['add']->value)) {?>
	<div class="alert alert-info">
	  <strong><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</strong> Item added
	</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['remove']->value)) {?>
	<div class="alert alert-info">
	  <strong><?php echo $_smarty_tpl->tpl_vars['type']->value;?>
</strong> Item removed
	</div>
<?php }?>


        <h1 class="sub-header">Managed Settings</h1>
		
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th style="width: 600px">Room</th>
<!--                  <th style="width: 100px">Actions</th> -->
                </tr>
              
              </thead>
              <tbody>
<!--
                <tr>
                  <th >EM 1</th>
                  <th >-</th>
                </tr>
-->
              <?php
$_from = $_smarty_tpl->tpl_vars['ROOMS']->value;
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
                  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</th>
<!--                  <th ><button type="button" class="btn btn-primary btn-md" onclick="window.location='../../../room/remove/ID/';" >-</button></th> -->
                </tr>
                <?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_local_item;
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_item;
}
?>

              </tbody>
            </table>
          </div>
        </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<!--        <h1 class="sub-header"><span lang="en-gb">Years</span></h1> -->
		
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th>Year</th>
                  <th>Ou</th>
                </tr>
              
              </thead>
              <tbody>

			  <?php
$_from = $_smarty_tpl->tpl_vars['YEARS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_foo_1_saved_item = isset($_smarty_tpl->tpl_vars['foo']) ? $_smarty_tpl->tpl_vars['foo'] : false;
$_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['foo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->_loop = true;
$__foreach_foo_1_saved_local_item = $_smarty_tpl->tpl_vars['foo'];
?>
                <tr>
                  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value[0];?>
</th>
                  <th ><?php echo $_smarty_tpl->tpl_vars['foo']->value[1];?>
</th>
				</tr>
            <?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_1_saved_local_item;
}
if ($__foreach_foo_1_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_1_saved_item;
}
?>

              </tbody>
            </table>
          </div>
        </div>




          </div>
        </div>



<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
