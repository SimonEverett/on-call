<?php
/* Smarty version 3.1.29, created on 2017-03-21 14:29:34
  from "C:\inetpub\wwwroot\templates\alert.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58d10e9e842493_22533762',
  'file_dependency' => 
  array (
    '87312cff33ab2d1987f0ff6f3beaa6b735d67e68' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\alert.tpl',
      1 => 1490095773,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58d10e9e842493_22533762 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>

<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/alerts/t/" method="post">

        <h1 class="sub-header">Closed</h1>
<?php if (isset($_smarty_tpl->tpl_vars['student_results']->value) != TRUE) {?>        
	    <p>Search by date range</p>
	    
	<div class="form-group">
	    <label >From</label>
	    <input type="text" name="from" class="form-control" placeholder="From Date">	    
	</div>
	    
	<div class="form-group">
	    <label >Until</label>
	    <input type="text" name="untill" class="form-control" placeholder="Untill Date">	    
	</div>
	    
	    <input type="hidden" name="mode" value="t">

	    
	<button type="submit" class="btn btn-default">Search</button>
	</form>




	    
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['alert_id']->value)) {?>
		<h2>Mark Berridge</h2>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th style="width: 292px">Room</th>
                  <th style="width: 292px">Reason</th>
                  <th style="width: 257px">Teacher</th>
                  <th style="width: 100px">Type</th>
                  <th style="width: 138px">Action</th>
                </tr>
                
                                <tr>
                  <th style="width: 292px" >B101</th>
                  <th style="width: 292px" >Example</th>
                  <th style="width: 257px" >Dr Cox</th>
                  <th ><span data-dobid="hdw">Assistance</span></th>
                  <th style="width: 138px" ><button type="button" class="btn btn-primary btn-md" onclick="window.location='../../../acknowladge/12/';" >Acknowledge</button></th>
                </tr>

              
		      <tr>
                  <th style="width: 292px" >B101</th>
                  <th style="width: 292px" >Close Example</th>
                  <th style="width: 257px" >Dr Cox</th>
                  <th >Info</th>
                  <th style="width: 138px" ><button type="button" class="btn btn-primary btn-md" onclick="window.location='../../../close/12/';" >Close</button></th>
                </tr>

              
              
              </thead>
              <tbody>
<?php }?>
        

        
		



                </tbody>
            </table>
          </div>
        </div>

<?php if (isset($_smarty_tpl->tpl_vars['student_results']->value)) {?>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    
<?php if ($_smarty_tpl->tpl_vars['student']->value == 's') {?>         <h2>Records <?php echo $_smarty_tpl->tpl_vars['student_results']->value[0]['name'];?>
</h2><?php }
if ($_smarty_tpl->tpl_vars['student']->value == 'u') {?>         <h2>Records Teacher <?php echo $_smarty_tpl->tpl_vars['student_results']->value[0]['fullname'];?>
 </h2><?php }?>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th style="width: 128px">Date</th>
<?php if (isset($_smarty_tpl->tpl_vars['alert_id']->value) != true) {?>                  
                  <th style="width: 128px">Room</th>
					<th style="width: 170px">Student name</th>                  
					<th style="width: 623px">Reason / Response</th> <?php }?>
<!--                  <th style="width: 100px">Responce</th> -->
                  <th style="width: 100px">Type</th>
                  <th style="width: 111px">Teacher</th>
                </tr>
              
              </thead>
              <tbody>

			  <?php
$_from = $_smarty_tpl->tpl_vars['student_results']->value;
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
                  <th style="width: 128px" ><?php echo $_smarty_tpl->tpl_vars['foo']->value['timestamp'];?>
</th>
                  <th style="width: 128px" ><?php echo $_smarty_tpl->tpl_vars['foo']->value['room'];?>
</th>
					<th style="width: 170px" ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/alerts/s/<?php echo $_smarty_tpl->tpl_vars['foo']->value['username'];?>
/"><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</a></th>                  
					<th style="width: 723px" ><?php echo $_smarty_tpl->tpl_vars['foo']->value['reason'];?>
 <?php if ($_smarty_tpl->tpl_vars['foo']->value['alert_response'] != '') {?> (Response:<?php echo $_smarty_tpl->tpl_vars['foo']->value['alert_response'];?>
) <?php }?></th>

                  <th ><?php if ($_smarty_tpl->tpl_vars['foo']->value['alert_type_id'] == '1') {?>Assistance<?php }
if ($_smarty_tpl->tpl_vars['foo']->value['alert_type_id'] == '2') {?>Information<?php }?></th>
                  <th style="width: 111px" ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/alerts/u/<?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
/"><?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
</a></th>
                </tr>
            <?php
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_local_item;
}
if ($__foreach_foo_0_saved_item) {
$_smarty_tpl->tpl_vars['foo'] = $__foreach_foo_0_saved_item;
}
?>
            
<!--            
                  <tr>
                  <th style="width: 128px" >1/1/1990</th>
<?php if (isset($_smarty_tpl->tpl_vars['alert_id']->value) != true) {?>                  
                  <th style="width: 128px" >K409</th>
					  <th style="width: 170px" >Chris Wheeler</th>                  
					  <th style="width: 623px" >Students has remove them selfs 
					  from the class</th> <?php }?>
                  <th >Understood</th>
                  <th ><span data-dobid="hdw">Assistance</span></th>
                  <th style="width: 111px" >B User</th>
                  </tr>
-->
              </tbody>
            </table>
          </div>
        </div>
<?php }?>


<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
