<?php
/* Smarty version 3.1.29, created on 2018-06-27 23:02:32
  from "C:\Users\784659\Documents\github\on-call\www\templates\dashboard.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5b33fb6875b933_08104802',
  'file_dependency' => 
  array (
    'a4ec1525f35f2ca97fd3636b097aee7a7c3ae7f1' => 
    array (
      0 => 'C:\\Users\\784659\\Documents\\github\\on-call\\www\\templates\\dashboard.tpl',
      1 => 1487711938,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5b33fb6875b933_08104802 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<!-- INFO -->
<?php if (isset($_smarty_tpl->tpl_vars['acknowladged']->value) && $_smarty_tpl->tpl_vars['acknowladged']->value[0]['alert_type_id'] == '2' && isset($_smarty_tpl->tpl_vars['fully_acknowladged']->value) == false) {?>
	<div id="boxes">
		<div id="dialog" class="window">
			<div class="well well-lg"  >
	
			<H1>Response <a href="../../"class="close"/>X</a> </h1>
	
			<p>Student Name: <?php echo $_smarty_tpl->tpl_vars['acknowladged']->value[0]['Name'];?>
<br>Reason: <?php echo $_smarty_tpl->tpl_vars['acknowladged']->value[0]['reason'];?>
<br>Room: <?php echo $_smarty_tpl->tpl_vars['acknowladged']->value[0]['room'];?>
<br>Type of behaviour: <?php echo $_smarty_tpl->tpl_vars['acknowladged']->value[0]['behaviour_type_descriptions'];?>
 </p>
			<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/acknowladge/<?php echo $_smarty_tpl->tpl_vars['acknowladged']->value[0]['alert_id'];?>
/">
				<p>Response: <br><textarea rows="4" cols="50" name="responce"></textarea> </p>
				<input type="submit"  value="Send Response">
			</form>
		</div>
	</div>
<?php }?>


<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>



<!-- Behaviour -->

<?php if (isset($_smarty_tpl->tpl_vars['closed']->value) && $_smarty_tpl->tpl_vars['close']->value[0]['alert_type_id'] == '1' && isset($_smarty_tpl->tpl_vars['fully_closed']->value) == false) {?>
	<div id="boxes">
		<div id="dialog" class="window">
			<div class="well well-lg"  >
	
			<H1>Resulting actions <a href="../../"class="close"/>X</a> </h1>
	
			<p>Student Name: <?php echo $_smarty_tpl->tpl_vars['close']->value[0]['Name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['close']->value[0]['year'];?>
)<br>Reason: <?php echo $_smarty_tpl->tpl_vars['close']->value[0]['reason'];?>
<br>Room: <?php echo $_smarty_tpl->tpl_vars['close']->value[0]['room'];?>
<br>Type of behaviour: <?php echo $_smarty_tpl->tpl_vars['BehaviourType']->value[$_smarty_tpl->tpl_vars['close']->value[0][6]];?>
 </p>
			<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/close/<?php echo $_smarty_tpl->tpl_vars['close']->value[0]['alert_id'];?>
/">
				<p>Response: <br><textarea rows="4" cols="50" name="responce"></textarea> </p>
				<input type="submit"  value="Send Response">
			</form>
		</div>
	</div>
<?php }?>


<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>





<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<?php if (isset($_smarty_tpl->tpl_vars['fully_acknowladged']->value)) {?>
	<div class="alert alert-info">
	  <strong>Info</strong> Alert acknowledged
	</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['closed']->value)) {?>
	<div class="alert alert-info">
	  <strong>Info</strong> Alert closed
	</div>
<?php }?>





        <h2 class="sub-header"><span lang="en-gb">New alerts</span></h2>
		
          <div class="table-responsive">
            <table class="table table-striped"id="Unacknowledge">
              <thead>
				<tr>
                  <th style="width: 100px">Room</th>
                  <th style="width: 215px">Student</th>
                  <th style="width: 100px">Year/Form</th>
                  <th style="width: 959px">Reason</th>
                  <th style="width: 150px">Created</th>
                  <th style="width: 350px">Staff</th>
                  <th style="width: 100px">Type</th>
                  <th style="width: 112px">Action</th>
                </tr>
				<tr>
                  <th colspan="8" style="text-align: center;" >Loading... </th>
                </tr>              
              </thead>

            </table>
          </div>
          
          
          

        <h2 class="sub-header"><span lang="en-gb">In-progress alerts</span></h2>
		
        <div class="table-responsive">
           <table class="table table-striped" id="Inprogress">
              <thead>
				<tr>
                  <th style="width: 100px">Room</th>
                  <th style="width: 215px">Student</th>
                  <th style="width: 100px">Year/Form</th>
                  <th style="width: 959px">Reason</th>
                  <th style="width: 150px">Created</th>
                  <th style="width: 350px">Staff</th>
                  <th style="width: 100px">Type</th>
                  <th style="width: 100px">Action</th>
                </tr>

   				<tr>
                  <th colspan="8" style="text-align: center;" >Loading... </th>
                </tr>
              
              </thead>

            </table>
        </div>
        




</div>



	<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
