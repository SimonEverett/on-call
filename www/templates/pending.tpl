    <!DOCTYPE html>
    <html>
      <head>
        <title>On-call</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="{$userhost}/css/bootstrap.min.css" rel="stylesheet" media="screen">	
        <link href="{$userhost}/css/tabs.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="http://easyautocomplete.com/dist/easy-autocomplete.min.css">   
	</head>

    <body>



<!--   alert_type_id => "1" == behaviour -->


{if $alert_data.0.alert_type_id eq 1}
	<h1>Requesting assistance ({if $alert_data.0.alert_status == 2 }Acknowledge{elseif $alert_data.0.alert_status == 1 }Closed{elseif $alert_data.0.alert_status == 4 || $alert_data.0.alert_status == 3 }Pending{/if})</h1>
{elseif $alert_data.0.alert_type_id eq 2}
	<h1>Requesting Information ({if $alert_data.0.alert_status == 2 }Acknowledge{elseif $alert_data.0.alert_status == 1 }Closed{elseif $alert_data.0.alert_status == 4 || $alert_data.0.alert_status == 3 }Pending{/if})</h1>
{else}
    <h1>Loading  {$alert_data.0.alert_type_id}</h1>
{/if}

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



<form name="myForm" id="myForm" action="{$userhost}/new/pending/" method="POST">
    <p>
			<input type="hidden" name="alert_id" value="{$alert_id}" />
			<input type="hidden" name="mode" value="refresh" />
    </p>
    
<!--	<h1>Responce {if isset($alert_data) }{if $alert_data.0.alert_status == 2 } - Acknowledge{/if}{if $alert_data.0.alert_status == 1 } - Closed{/if}{if $alert_data.0.alert_status == 4 } - Pending.{/if}{if $alert_data.0.alert_status == 3 } - Pending{/if}{else} - Pending{/if}</h1> -->
	<hr>

{if $alert_data.0.alert_type_id eq 1}
<!-- assistance -->



 <table style="width:100%">
  <tr>
    <td><h3>Students name:</h3</td>
    <td><h3>{$alert_data.0.Name }</h3</td>
  </tr>
  <tr>
    <td><h3>Type of behaviour:</td>
    <td><h3>{$BehaviourType.{$alert_data.0.behaviour_type_id}}</h3</td>
  </tr>

  <tr>
    <td><h3>Your comment:</td>
    <td><h3>{if isset($data)} - {else}{$alert_data.0.reason }{/if}</h3</td>
  </tr>

    
  <tr>
    <td><h3>Closing comment:</h3></td>
    <td><h3>{if isset($data)} - {else}{$alert_data.0.alert_response }{/if}</h3</td>
  </tr>
  
    <tr>
    <td><h3>Requested on:</h3></td>
    <td><h3>{$alert_data.0.timestamp }</h3</td>
  </tr>
  
  
</table>  
  



{elseif $alert_data.0.alert_type_id eq 2}
<!-- REQUESTING INFOMACTION -->
    <h2>Question: {if isset($data)} {$data.comments} {else}{$alert_data.0.reason }{/if}</h2>
    <h2>Answer: {if isset($data)}  {else}{$alert_data.0.alert_response }{/if}</h2>
{else}
    <h1>Loading  {$alert_data.0.alert_type_id}</h1>
{/if}


{if $alert_data.0.alert_status == 1 }
</form>

<form action="{$userhost}/new/" method="POST" >
  <button type="submit">Start again</button>


{else}
	<input type="submit" value="Refresh">
{/if}

</form>







<script type="text/javascript">


	window.onload=function()
	{
	    window.setTimeout(function() { document.myForm.submit(); }, 5000);
	};

</script>

