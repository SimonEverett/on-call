{config_load file="test.conf" section="setup"}

<!DOCTYPE html>
<html>
<title>Oncall - {#school_name#}</title >
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

			{IF ($REQUEST_URI == "/new/infomaction/confirm/" || $REQUEST_URI == "/new/assistance/confirm/" ) }
				{if isset($found) == false OR $found == TRUE or count($result) == 1 }
			 		<form action="{$userhost}/new/pending/" id="frm1" method="post">
				{/if}
			{ELSE}
		 		<form action="{$userhost}/new/infomaction/confirm/"  method="post">
			{/if}
			

			<!-- Request Info start   -->
			<p>Complete the form below if you need to ask the office a question.{isset($data.student_id)}</p>
						<table style="width: 100%">
						<tr>
							<td style="width: 178px"><span lang="en-gb">Room</span></td>
							<td colspan="2"><span lang="en-gb">
								<select name="room" {if isset($data.room)}disabled{/if}>
									{html_options options=$ROOMS selected=$data.room}
								</select>
									{if isset($data.room)} <input type="hidden" value="{$data.room}" name="room" >{/if}
						</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Year</span></td>
							<td colspan="2">
								 <select name="year" id="year_dropdown" {if isset($data.year)}disabled{/if}>
				 					{html_options options=$YEARS selected=$data.year}
								</select>
									{if isset($data.year)} <input type="hidden" value="{$data.year}" name="year" >{/if}
						</div>
							</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Name</span></td>
							<td style="width: 362px"><span lang="en-gb">{if !isset ($result) }<input type="text" name="name" {if isset($data.name)} value="{$data.name}"  disabled{/if} id="example-ajax-post" /> <input type="hidden" name="student_id" value="{$data.student_id}">
							
							{elseif count($result) == 1 }
								<input type="text" name="name" {if isset($data.name)} value="{$data.name}"  disabled{/if} id="example-ajax-post" /><input type="hidden" name="student_id" value="{$result.0.student_id}">
							{ELSE}
		<h3>Choose student a from below.</h3>
		
		  {foreach key=key item=item from=$result}
		  
				<form action="/new/infomaction/confirm/" method="post">
				  <input type="hidden" name="comments" value="{$data.comments}">
				  <input type="hidden" name="mode" value="{$data.mode}">
				  <input type="hidden" name="room" value="{$data.room}">
				  <input type="hidden" name="year" value="{$data.year}">
				  <input type="hidden" name="name" value="{$item.Name}">
  				  <input type="hidden" name="student_id" value="{$item.student_id}">
 
				  
				  <input type="submit" value="{$item.Name}">
				</form> 
		  {/foreach}
		</br>
		{/if} </span></td>
								{if isset($data.name)} <input type="hidden" value="{$data.name}" name="name" >{/if}
							<td><span lang="en-gb"></span></td>
						</tr>
		{if $mode eq 'assistance'}
						<tr>
							<td style="width: 178px"><span lang="en-gb">Type of Behaviour</span></td>
							<td style="width: 362px">					
								<select class="form-control" id="reason" name="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;" {if isset($data.reason)} disabled{/if}>
									{html_options options=$BehaviourType selected=$data.reason}
								</select>
									{if isset($data.reason)} <input type="hidden" value="{$data.reason}" name="reason" >{/if}
							</td>
						</tr>
		{/if}
		{if $mode eq 'infomaction'}
						<tr>
							<td style="width: 178px"><span lang="en-gb">Question</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1"  {if isset($data.comments)} disabled{/if} >{if isset($data.comments)}{$data.comments}{/if}</textarea></span></td>
							{if isset($data.comments)} <input type="hidden" value="{$data.comments}" name="comments" >{/if}
						</tr>
		{/if}
		{if $mode eq 'assistance'}
						<tr>
							<td style="width: 178px"><span lang="en-gb">Comments</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1" {if isset($data.comments)}disabled {/if}>{if isset($data.comments)}{$data.comments}{/if}</textarea></span></td>
							{if isset($data.comments)} <input type="hidden" value="{$data.comments}" name="comments" >{/if}
						</tr>
		{/if}
		
					</table>		
		
			<input type="hidden" name="mode" value="{$mode}">
			
			{IF ($REQUEST_URI == "/new/infomaction/confirm/" || $REQUEST_URI == "/new/assistance/confirm/" ) }
				{if isset($found) == false OR $found == TRUE or count($result) == 1  }
					<input type="submit" value="Confirm Question" >
				{/if}
			{ELSE}
				<input type="submit" value="Submit Query" >
			{/if}
			
			
		</form> 
<!--  Request info end -->

</div>

<div id="Assistance" class="w3-container city">
  <h2>Assistance</h2>

			{IF ($REQUEST_URI == "/new/infomaction/confirm/" || $REQUEST_URI == "/new/assistance/confirm/" ) }
				{if isset($found) == false OR $found == TRUE  or count($result) == 1 }
			 		<form action="{$userhost}/new/pending/"  method="post">
				{/if}
			{ELSE}
		 		<form action="{$userhost}/new/assistance/confirm/"  method="post">
			{/if}
		
			<!-- Request Info start   -->
			<p>Fill in the form below if you require <u>immediate</u> assistance.</p>
						<table style="width: 100%">
						<tr>
							<td style="width: 178px"><span lang="en-gb">Room</span></td>
							<td colspan="2"><span lang="en-gb">
						 
								<select name="room" {if isset($data.room)}disabled{/if}>
									{html_options options=$ROOMS selected=$data.room}
								</select>
									{if isset($data.room)} <input type="hidden" value="{$data.room}" name="room" >{/if}
		
						</td>
						</tr>
						<tr>
							<td style="width: 178px"><span lang="en-gb">Year</span></td>
							<td colspan="2">
		
						 <select name="year" id="year_dropdown2" {if isset($data.year)}disabled{/if}>
		 					{html_options options=$YEARS selected=$data.year}
						</select>
							{if isset($data.year)} <input type="hidden" value="{$data.year}" name="year" >{/if}
		
		
						</div>
							
							</td>
						</tr>
						<tr>


							<td style="width: 178px"><span lang="en-gb">Name</span></td>

		
	<td style="width: 362px"><span lang="en-gb">
	
	{if !isset ($result) }
		<input type="text" name="name" {if isset($data.name)} value="{$data.name}"  disabled{/if} id="example-ajax-post2" />  <input type="hidden" name="student_id" value="{$data.student_id}">
	{elseif count($result) == 1 }
		<input type="text" name="name" {if isset($data.name)} value="{$data.name}"  disabled{/if} id="example-ajax-post" /><input type="hidden" name="student_id" value="{$result.0.student_id}">
	{ELSE}
				
		<h3>Choose student a from below.</h3>
		
			{foreach key=key item=item from=$result}
				<form action="/new/assistance/confirm/" method="post">
					<input type="hidden" name="comments" value="{$data.comments}">
					<input type="hidden" name="mode" value="{$data.mode}">
					<input type="hidden" name="room" value="{$data.room}">
					<input type="hidden" name="year" value="{$data.year}">
					<input type="hidden" name="name" value="{$item.Name}">
					<input type="hidden" name="comments" value="{$data.comments}">
					<input type="hidden" name="reason" value="{$data.reason}">
					<input type="submit" value="{$item.Name}">
					<input type="hidden" name="student_id" value="{$item.student_id}">
				</form> 
			{/foreach}
		</br>
	{/if} </span></td>

			</tr>



				<tr>
					<td style="width: 178px"><span lang="en-gb">Type of Behaviour</span></td>
					<td style="width: 362px">					
						<select class="form-control" id="reason" name="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;" {if isset($data.reason)} disabled{/if}>
							{html_options options=$BehaviourType selected=$data.reason}
						</select>
							{if isset($data.reason)} <input type="hidden" value="{$data.reason}" name="reason" >{/if}
					</td>
				</tr>


						
						
						<tr>
							<td style="width: 178px"><span lang="en-gb">Notes</span></td>
							<td colspan="2"><span lang="en-gb">
						  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1" {if isset($data.comments)} disabled{/if}>{$data.comments}</textarea></span></td>
						  
  							{if isset($data.comments)} <input type="hidden" value="{$data.comments}" name="comments" >{/if}
						  
						</tr>
					</table>		
		
			<input type="hidden" name="mode" value="{$mode}">
			
			
			{IF ($REQUEST_URI == "/new/infomaction/confirm/" || $REQUEST_URI == "/new/assistance/confirm/" ) }
				{if isset($found) == false OR $found == TRUE  or count($result) == 1 }
					<input type="submit" value="Confirm Request" >
				{/if}
			{ELSE}
				<input type="submit" value="Submit Query" >
			{/if}
			
			
			

		</form> 
		





</div>

<div id="About" class="w3-container city">
  <h2>About</h2>
  <p>This application was developed by Simon Everett for Link ICT Services Limited, St. Peter's House, Mansfield Road, Derby, DE1 3TP | Company Number: 08142733 and is licensed to {#school_name#}.</p>
</div>

<script>

		{if $REQUEST_URI eq '/new/infomaction/' }	
			openCity("Infomaction")
		{elseif $REQUEST_URI eq '/new/assistance/' ||  $REQUEST_URI eq '/new/assistance/confirm/' }
			openCity("Assistance")
		{elseif $REQUEST_URI eq '/new/about/' }
			openCity("About")
		{else}
			openCity("Infomaction")
		{/if}



function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}
</script>

<script src="{$userhost}/js/jquery.js"></script>
<script src="{$userhost}/js/bootstrap.min.js"></script>
<script src="{$userhost}/js/jquery.easy-autocomplete.js"></script>

<script>

var Name = {

  url: function(phrase) {
          return "{$userhost}/json.php?year=" + document.getElementById("year_dropdown").value + "&Name=" + document.getElementById("example-ajax-post").value ;
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
          return "{$userhost}/json.php?year=" + document.getElementById("year_dropdown2").value + "&Name=" + document.getElementById("example-ajax-post2").value ;
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


{if count($result) == 1 }

$(document).ready(function(){
     $("#frm1").submit();
});

{/if}

</script>



</body>
</html>

