<?php
/* Smarty version 3.1.29, created on 2017-03-20 01:13:31
  from "C:\inetpub\wwwroot\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58cf028b82d6a3_00344797',
  'file_dependency' => 
  array (
    '163768e1bcb0348c5b86e77196261e906cd6b3d0' => 
    array (
      0 => 'C:\\inetpub\\wwwroot\\templates\\header.tpl',
      1 => 1489961607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58cf028b82d6a3_00344797 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
	<!-- Current username: <?php echo $_smarty_tpl->tpl_vars['current_user']->value[0]['user_name'];?>
 -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'App_tital');?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/jquery-ui.css">

<style>

/* Z-index of #mask must lower than #boxes .window */
#mask {
  position:absolute;
  z-index:9000;
  background-color:#000;
/*   display:none; */
}

#boxes .window {
  width:540px;
  height:200px;
  z-index:9999;

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;

}


/* Customize your modal window here, you can add background image too */
#boxes #dialog {
  width:575px;
  height:303px;
}
</style>





    <!-- Datepicker  CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/bootstrap-datepicker3.min.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/ie-emulation-modes-warning.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/js/popup.js"><?php echo '</script'; ?>
>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>


<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'App_tital');?>
 - <?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'school_name');?>
</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
">Dashboard</a></li>
<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?>            <li><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/alerts/">Closed</a></li>	<?php }?>
            <li><a href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'HELPDESK_URL');?>
">Helpdesk</a></li>
<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?>            <li><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/logs/">Logs</a></li>		<?php }?>
          </ul>
<!--
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
-->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">

		    <li <?php if ($_smarty_tpl->tpl_vars['title']->value == "Dashboard" || $_smarty_tpl->tpl_vars['title']->value == "Settings") {?> class="active" 	<?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
">Dashboard</a></li>
<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?>            <li <?php if ($_smarty_tpl->tpl_vars['title']->value == "Alerts" || $_smarty_tpl->tpl_vars['title']->value == "Single Alert") {?> class="active" 								<?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['REQUEST_URI']->value;?>
alerts/">Closed</a></li>		<?php }
if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?> 			<li <?php if ($_smarty_tpl->tpl_vars['title']->value == "Reports") {?> class="active" 							<?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/reports/">Reports</a></li> 			<?php }
if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?>			<li <?php if ($_smarty_tpl->tpl_vars['title']->value == "Admin") {?> class="active" 								<?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/admin/">Admin</a></li>				<?php }?>
			<li ><a href="<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/new/">Raise</a></li>



	  </div>

	  <!--
	  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

-->

<?php echo '<script'; ?>
>
// Has the sound played this json load??
var played = false;
var loop_count = 0;

setInterval(function() {
    // do stuff

// ignore this first line (its fidle mock) and it will return what ever you pass as json:... parameter... consider to change it to your ajax call
$.ajax({
    url: '<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/JSON/',
    type: "post",
    dataType: "json",
    data: {
        json: JSON.stringify([
            { },

        ]),
        delay: 3
    },
    success: function(data, textStatus, jqXHR) {
        // since we are using jQuery, you don't need to parse response
		
		if ( data.length > 0 )
		{
			console.log( "Found " + data.length );
			drawTable(data);
		}
		else
		{
//			console.log( "none Found " + data.length );
		}

    }
});

// Google crome seems to crash around 2k7> json calls @ once every 2000ms, 
// So i've adjusted the refresh time to 3 seconds and set a relaode of the page after 2000 calls.
if ( loop_count > 2000)
{
	console.log( "Reload " + loop_count );
	window.location.reload(true); 
}
console.log( "Loop number  " + loop_count );
loop_count=loop_count+1;

},3000);


  
function drawTable(data)
{

	var count = 0;
	var return_state = false;
	var audio = new Audio('<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'mp3');?>
');
	
	$("#Unacknowledge tr:gt(0)").remove();
	$("#Inprogress tr:gt(0)").remove();

    for (var i = 0; i < data.length; i++) 
    {
    
	return_state = drawRow(data[i]);
		if ( return_state == true)
		{
			count = count + 1;
			console.log("Adding 1 ");
		}
    }

	console.log("Found new alerts " + count);

	if ( count > 0)
	{
		console.log("PLAYING....<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'mp3');?>
");
  		audio.play();
	}

}

function drawRow(rowData)
{
	if ( rowData.alert_status == '3' || rowData.alert_status == '4' )
	{
	    var row = $("<tr />")
	    $("#Unacknowledge").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it

	    row.append($("<th>" + rowData.room + "</th>"));
  	  	row.append($('<th><?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?><a href="../../alerts/s/'+ rowData.username +'/"><?php }?>' + rowData.Name +  "<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?></a><?php }?></hd>"));
    	row.append($("<th>" + rowData.year + "</th>"));
		row.append($("<th>" + rowData.reason + "</th>"));
		row.append($("<th>" + rowData.formatted_timestamp + "</th>"));
		row.append($('<th><?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?><a href="../../alerts/u/'+ rowData.user_name +'/"><?php }?>' + rowData.user_name + "<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?></a><?php }?></hd>"));

		if (rowData.alert_type_id == 2)
		{
			row.append($("<th>Information</th>"));
		}
		else if (rowData.alert_type_id == 1) {
			row.append($("<th>Behaviour</th>"));
		}
		else
		{
			row.append($("<th>Error " + rowData.alert_type_id + "</th>"));
		}

			if ( rowData.alert_type_id == 2)
			{
				row.append($('<th style="width: 112px">	<button type="button" class="btn btn-primary btn-md" onclick="window.location=\'<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/acknowladge/' + rowData.alert_id + '/\';" >Respond</button></th>'));
			}
			else
			{
				row.append($('<th style="width: 112px">	<button type="button" class="btn btn-primary btn-md" onclick="window.location=\'<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/acknowladge/' + rowData.alert_id + '/\';" >Acknowledge</button></th>'));

			}


		if (rowData.time == null)
		{
		console.log("Reason.. [" + rowData.time + "] .." );
//			console.log("Returning True ");
			return true;
			
		}
	}


		if ( rowData.alert_status == '2'  )
		{
		    var row = $("<tr />")
		    $("#Inprogress").append(row); //this will append tr element to table... keep its reference for a while since we will add cels into it

		    row.append($("<th>" + rowData.room + "</th>"));
	  	  	row.append($('<th><?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?><a href="../../alerts/s/'+ rowData.username +'/"><?php }?>' + rowData.Name +  "<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?></a><?php }?></hd>"));
		    row.append($("<th>" + rowData.year + "</th>"));
			row.append($("<th>" + rowData.reason + "</th>"));
			row.append($("<th>" + rowData.formatted_timestamp + "</th>"));
			
			row.append($('<th><?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?><a href="../../alerts/u/'+ rowData.user_name +'/"><?php }?>' + rowData.user_name + "<?php if ($_smarty_tpl->tpl_vars['current_user']->value[0]['slt'] == true) {?></a><?php }?></hd>"));

			if (rowData.alert_type_id == 2)
			{
				row.append($("<th>Information</th>"));
			}
			else if (rowData.alert_type_id == 1) {
				row.append($("<th>Behaviour</th>"));
			}
			else
			{
				row.append($("<th>Error " + rowData.alert_type_id + "</th>"));
			}
		row.append($('<th style="width: 112px"><button type="button" class="btn btn-primary btn-md" onclick="window.location=\'<?php echo $_smarty_tpl->tpl_vars['userhost']->value;?>
/close/' + rowData.alert_id + '/\';" >Close</button></th>'));
	}
	

return false;
}

<?php echo '</script'; ?>
>

<?php }
}
