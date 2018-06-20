<?php
/* Smarty version 3.1.29, created on 2017-03-17 01:23:36
  from "C:\inetpub\wwwroot\templates\oncall.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58cb1068bfe538_06799753',
  'file_dependency' => 
  array (
    'f4536b98bf8c359efc48c318052a219c4aab5086' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\oncall.tpl',
      1 => 1489703003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cb1068bfe538_06799753 ($_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\inetpub\\wwwroot\\libs\\plugins\\function.html_options.php';
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "test.conf", "setup", 0);
?>


<!DOCTYPE html>
<html>
<title>Oncall - <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'school_name');?>
</title >
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../css/w3.css">

<link rel="stylesheet" type="text/css" href="../../css/easy-autocomplete.min.css">     
<body>

<div class="w3-container">
  <h2>Classroom assistant</h2>
<!-- <p>Tabs are perfect for single page web applications, or for web pages capable of displaying different subjects. Click on the links below.</p> -->
</div>

<ul class="w3-navbar w3-black">
  <li><a href="#" onclick="openCity('Infomaction')">Information</a></li>
  <li><a href="#" onclick="openCity('Assistance')">Assistance</a></li>
  <li><a href="#" onclick="openCity('About')">About</a></li>
</ul>

<div id="Infomaction" class="w3-container city">
  <h2>Information</h2>

			<?php if (($_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/infomaction/confirm/" || $_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/assistance/confirm/")) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['found']->value) == false || $_smarty_tpl->tpl_vars['found']->value == TRUE || count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
			 		<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/pending/" id="frm1" method="post">
				<?php }?>
			<?php } else { ?>
		 		<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/infomaction/confirm/"  method="post">
			<?php }?>
			

			<!-- Request Info start   -->
			<p>Complete the form below if you need to ask the office a question.<?php echo isset($_smarty_tpl->tpl_vars['data']->value['student_id']);?>
</p>
						<table style="width: 100%">
						<tr>
							<td style="width: 178px"><span lang="en-gb">Room</span></td>
							<td colspan="2"><span lang="en-gb">
								<select name="room" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['room'])) {?>disabled<?php }?>>
									<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ROOMS']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['room']),$_smarty_tpl);?>

								</select>
									<?php if (isset($_smarty_tpl->tpl_vars['data']->value['room'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
" name="room" ><?php }?>
						</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Year</span></td>
							<td colspan="2">
								 <select name="year" id="year_dropdown" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['year'])) {?>disabled<?php }?>>
				 					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['YEARS']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['year']),$_smarty_tpl);?>

								</select>
									<?php if (isset($_smarty_tpl->tpl_vars['data']->value['year'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['year'];?>
" name="year" ><?php }?>
						</div>
							</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Name</span></td>
							<td style="width: 362px"><span lang="en-gb"><?php if (!isset($_smarty_tpl->tpl_vars['result']->value)) {?><input type="text" name="name" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"  disabled<?php }?> id="example-ajax-post" /> <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['student_id'];?>
">
							
							<?php } elseif (count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
								<input type="text" name="name" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"  disabled<?php }?> id="example-ajax-post" /><input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['student_id'];?>
">
							<?php } else { ?>
		<h3>Choose student a from below.</h3>
		
		  <?php
$_from = $_smarty_tpl->tpl_vars['result']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_0_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
		  
				<form action="/new/infomaction/confirm/" method="post">
				  <input type="hidden" name="comments" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
">
				  <input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
">
				  <input type="hidden" name="room" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
">
				  <input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['year'];?>
">
				  <input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
">
  				  <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['student_id'];?>
">
 
				  
				  <input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
">
				</form> 
		  <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
if ($__foreach_item_0_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_0_saved_key;
}
?>
		</br>
		<?php }?> </span></td>
								<?php if (isset($_smarty_tpl->tpl_vars['data']->value['name'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" name="name" ><?php }?>
							<td><span lang="en-gb"></span></td>
						</tr>
		<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'assistance') {?>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Type of Behaviour</span></td>
							<td style="width: 362px">					
								<select class="form-control" id="reason" name="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['reason'])) {?> disabled<?php }?>>
									<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['BehaviourType']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['reason']),$_smarty_tpl);?>

								</select>
									<?php if (isset($_smarty_tpl->tpl_vars['data']->value['reason'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['reason'];?>
" name="reason" ><?php }?>
							</td>
						</tr>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'infomaction') {?>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Question</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1"  <?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?> disabled<?php }?> ><?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {
echo $_smarty_tpl->tpl_vars['data']->value['comments'];
}?></textarea></span></td>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
" name="comments" ><?php }?>
						</tr>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['mode']->value == 'assistance') {?>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Comments</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?>disabled <?php }?>><?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {
echo $_smarty_tpl->tpl_vars['data']->value['comments'];
}?></textarea></span></td>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
" name="comments" ><?php }?>
						</tr>
		<?php }?>
		
					</table>		
		
			<input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
">
			
			<?php if (($_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/infomaction/confirm/" || $_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/assistance/confirm/")) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['found']->value) == false || $_smarty_tpl->tpl_vars['found']->value == TRUE || count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
					<input type="submit" value="Confirm Question" >
				<?php }?>
			<?php } else { ?>
				<input type="submit" value="Submit Query" >
			<?php }?>
			
			
		</form> 
<!--  Request info end -->

</div>

<div id="Assistance" class="w3-container city">
  <h2>Assistance</h2>

			<?php if (($_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/infomaction/confirm/" || $_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/assistance/confirm/")) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['found']->value) == false || $_smarty_tpl->tpl_vars['found']->value == TRUE || count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
			 		<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/pending/"  method="post">
				<?php }?>
			<?php } else { ?>
		 		<form action="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/assistance/confirm/"  method="post">
			<?php }?>
		
			<!-- Request Info start   -->
			<p>Fill in the form below if you require <u>immediate</u> assistance.</p>
						<table style="width: 100%">
						<tr>
							<td style="width: 178px"><span lang="en-gb">Room</span></td>
							<td colspan="2"><span lang="en-gb">
						 
								<select name="room" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['room'])) {?>disabled<?php }?>>
									<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ROOMS']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['room']),$_smarty_tpl);?>

								</select>
									<?php if (isset($_smarty_tpl->tpl_vars['data']->value['room'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
" name="room" ><?php }?>
		
						</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Year</span></td>
							<td colspan="2">
		
						 <select name="year" id="year_dropdown2" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['year'])) {?>disabled<?php }?>>
		 					<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['YEARS']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['year']),$_smarty_tpl);?>

						</select>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['year'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['year'];?>
" name="year" ><?php }?>
		
		
						</div>
							
							</td>
						</tr>
						<tr>


							<td style="width: 178px"><span lang="en-gb">Name</span></td>

		
	<td style="width: 362px"><span lang="en-gb">
	
	<?php if (!isset($_smarty_tpl->tpl_vars['result']->value)) {?>
		<input type="text" name="name" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"  disabled<?php }?> id="example-ajax-post2" />  <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['student_id'];?>
">
	<?php } elseif (count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
		<input type="text" name="name" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['name'])) {?> value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
"  disabled<?php }?> id="example-ajax-post" /><input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value[0]['student_id'];?>
">
	<?php } else { ?>
				
		<h3>Choose student a from below.</h3>
		
			<?php
$_from = $_smarty_tpl->tpl_vars['result']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$__foreach_item_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
				<form action="/new/assistance/confirm/" method="post">
					<input type="hidden" name="comments" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
">
					<input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['mode'];?>
">
					<input type="hidden" name="room" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['room'];?>
">
					<input type="hidden" name="year" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['year'];?>
">
					<input type="hidden" name="name" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
">
					<input type="hidden" name="comments" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
">
					<input type="hidden" name="reason" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['reason'];?>
">
					<input type="submit" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['Name'];?>
">
					<input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['student_id'];?>
">
				</form> 
			<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
if ($__foreach_item_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_item_1_saved_key;
}
?>
		</br>
	<?php }?> </span></td>

			</tr>



				<tr>
					<td style="width: 178px"><span lang="en-gb">Type of Behaviour</span></td>
					<td style="width: 362px">					
						<select class="form-control" id="reason" name="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['reason'])) {?> disabled<?php }?>>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['BehaviourType']->value,'selected'=>$_smarty_tpl->tpl_vars['data']->value['reason']),$_smarty_tpl);?>

						</select>
							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['reason'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['reason'];?>
" name="reason" ><?php }?>
					</td>
				</tr>


						
						
						<tr>
							<td style="width: 178px"><span lang="en-gb">Notes</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?> disabled<?php }?>><?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
</textarea></span></td>
						  
  							<?php if (isset($_smarty_tpl->tpl_vars['data']->value['comments'])) {?> <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['comments'];?>
" name="comments" ><?php }?>
						  
						</tr>
					</table>		
		
			<input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
">
			
			
			<?php if (($_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/infomaction/confirm/" || $_smarty_tpl->tpl_vars['REQUEST_URI']->value == "/new/assistance/confirm/")) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['found']->value) == false || $_smarty_tpl->tpl_vars['found']->value == TRUE || count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>
					<input type="submit" value="Confirm Request" >
				<?php }?>
			<?php } else { ?>
				<input type="submit" value="Submit Query" >
			<?php }?>
			
			
			

		</form> 
		





</div>

<div id="About" class="w3-container city">
  <h2>About</h2>
  <p>This application was developed by Simon Everett for Link ICT Services Limited, St. Peter's House, Mansfield Road, Derby, DE1 3TP | Company Number: 08142733 and is licensed to <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'school_name');?>
.</p>
</div>

<?php echo '<script'; ?>
>

		<?php if ($_smarty_tpl->tpl_vars['REQUEST_URI']->value == '/new/infomaction/') {?>	
			openCity("Infomaction")
		<?php } elseif ($_smarty_tpl->tpl_vars['REQUEST_URI']->value == '/new/assistance/' || $_smarty_tpl->tpl_vars['REQUEST_URI']->value == '/new/assistance/confirm/') {?>
			openCity("Assistance")
		<?php } elseif ($_smarty_tpl->tpl_vars['REQUEST_URI']->value == '/new/about/') {?>
			openCity("About")
		<?php } else { ?>
			openCity("Infomaction")
		<?php }?>



function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/jquery.easy-autocomplete.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>

var Name = {

  url: function(phrase) {
          return "<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/json.php?year=" + document.getElementById("year_dropdown").value + "&Name=" + document.getElementById("example-ajax-post").value ;
  },


  
  getValue: function(element) {
    return element.name;
  },

  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#example-ajax-post").val();

    return data;
  },

  requestDelay: 400
};


var Name2 = {

  url: function(phrase2) {
          return "<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/json.php?year=" + document.getElementById("year_dropdown2").value + "&Name=" + document.getElementById("example-ajax-post2").value ;
  },


  
  getValue: function(element) {
    return element.name;
  },

  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#example-ajax-post2").val();

    return data;
  },

  requestDelay: 400
};



$("#example-ajax-post").easyAutocomplete(Name);
$("#example-ajax-post2").easyAutocomplete(Name2);


<?php if (count($_smarty_tpl->tpl_vars['result']->value) == 1) {?>

$(document).ready(function(){
     $("#frm1").submit();
});

<?php }?>

<?php echo '</script'; ?>
>



</body>
</html>

<?php }
}
