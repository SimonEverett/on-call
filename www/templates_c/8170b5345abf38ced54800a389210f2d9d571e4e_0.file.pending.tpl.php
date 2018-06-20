<?php
/* Smarty version 3.1.29, created on 2016-11-02 13:58:18
  from "C:\inetpub\wwwroot\templates\pending.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5819c6ca5ffa82_47240798',
  'file_dependency' => 
  array (
    '8170b5345abf38ced54800a389210f2d9d571e4e' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\pending.tpl',
      1 => 1478084292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5819c6ca5ffa82_47240798 ($_smarty_tpl) {
?>
    <!DOCTYPE html>
    <html>
      <head>
        <title>On-call</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/bootstrap.min.css" rel="stylesheet" media="screen">	
        <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/tabs.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="http://easyautocomplete.com/dist/easy-autocomplete.min.css">   
	</head>

    <body>



<!--   alert_type_id => "1" == behaviour -->


<?php if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'] == 1) {?>
	<h1>Requesting assistance (<?php if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 2) {?>Acknowledge<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 1) {?>Closed<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 4 || $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 3) {?>Pending<?php }?>)</h1>
<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'] == 2) {?>
	<h1>Requesting Information (<?php if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 2) {?>Acknowledge<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 1) {?>Closed<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 4 || $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 3) {?>Pending<?php }?>)</h1>
<?php } else { ?>
    <h1>Loading  <?php echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'];?>
</h1>
<?php }?>

<!--

 	
Value
Array (1)
0 => Array (27)
  alert_id => "161"
  0 => "161"
  user_id => "9"
  1 => "9"
  student_id => "1"
  2 => "1"
  reason => "dsfsgfdg"
  3 => "dsfsgfdg"
  room => "Room 12"
  4 => "Room 12"
  alert_type_id => "1"
  5 => "1"
  behaviour_type_id => "3"
  6 => "3"
  alert_status => "1"
  7 => "1"
  timestamp => "2016-10-27 21:05:18"
  8 => "2016-10-27 21:05:18"
  alert_response => "dfdsf"
  9 => "dfdsf"
  10 => "1"
  Name => "Simon Everett10"
  11 => "Simon Everett10"
  username => "s.everett10"
  12 => "s.everett10"
  year => "10"
  13 => "10"

-->



<form name="myForm" id="myForm" action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/pending/" method="POST">
    <p>
			<input type="hidden" name="alert_id" value="<?php echo $_smarty_tpl->tpl_vars['alert_id']->value;?>
" />
			<input type="hidden" name="mode" value="refresh" />
    </p>
    
<!--	<h1>Responce <?php if (isset($_smarty_tpl->tpl_vars['alert_data']->value)) {
if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 2) {?> - Acknowledge<?php }
if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 1) {?> - Closed<?php }
if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 4) {?> - Pending.<?php }
if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 3) {?> - Pending<?php }
} else { ?> - Pending<?php }?></h1> -->
	<hr>

<?php if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'] == 1) {?>
<!-- assistance -->



 <table style="width:100%">
  <tr>
    <td><h3>Students name:</h3</td>
    <td><h3><?php echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['Name'];?>
</h3</td>
  </tr>
  <tr>
    <td><h3>Type of behaviour:</td>
    <td><h3><?php echo $_smarty_tpl->tpl_vars['BehaviourType']->value[$_smarty_tpl->tpl_vars['alert_data']->value[0]['behaviour_type_id']];?>
</h3</td>
  </tr>

  <tr>
    <td><h3>Your comment:</td>
    <td><h3><?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?> - <?php } else {
echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['reason'];
}?></h3</td>
  </tr>

    
  <tr>
    <td><h3>Closing comment:</h3></td>
    <td><h3><?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?> - <?php } else {
echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_response'];
}?></h3</td>
  </tr>
  
    <tr>
    <td><h3>Requested on:</h3></td>
    <td><h3><?php echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['timestamp'];?>
</h3</td>
  </tr>
  
  
</table>  
  



<?php } elseif ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'] == 2) {?>
<!-- REQUESTING INFOMACTION -->
    <h2>Question: <?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
 <?php } else {
echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['reason'];
}?></h2>
    <h2>Answer: <?php if (isset($_smarty_tpl->tpl_vars['data']->value)) {?>  <?php } else {
echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_response'];
}?></h2>
<?php } else { ?>
    <h1>Loading  <?php echo $_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_type_id'];?>
</h1>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['alert_data']->value[0]['alert_status'] == 1) {?>
</form>

<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/" method="POST" >
  <button type="submit">Start again</button>


<?php } else { ?>
	<input type="submit" value="Refresh">
<?php }?>

</form>







<?php echo '<script'; ?>
 type="text/javascript">


	window.onload=function()
	{
	    window.setTimeout(function() { document.myForm.submit(); }, 5000);
	};

<?php echo '</script'; ?>
>

<?php }
}
