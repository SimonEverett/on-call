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


<div class="container" >
  <div class="jumbotron" style="  margin-bottom: 0px;">
  
	  <h2>Classroom assistant</h2>

<div class="container" style="height:100%;">
  <ul class="nav nav-tabs">
    <li {if $mode eq 'infomaction'	} class="active" {/if}><a href="{$userhost}/new/Infomaction/">Infomaction</a></li>
    <li {if $mode eq 'assistance'	} class="active" {/if}><a href="{$userhost}/new/Assistance/">Assistance</a></li>
    <li {if $mode eq 'about'		} class="active" {/if}><a href="{$userhost}/new/about/">About</a></li>
<!--    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
  </ul>

  <div class="tab-content">
    <div id="Infomaction" class="tab-pane fade in active">


	{IF ($REQUEST_URI == "/new/infomaction/confirm/" || $REQUEST_URI == "/new/assistance/confirm/") }
 		<form action="{$userhost}/new/pending/"  method="post">
 	{ELSE}
 		<form action="{$userhost}/new/{$mode}/confirm/"  method="post">
 	{/if}




	<!-- Request Info start   -->
{if $mode eq 'infomaction'}
	<p>Filling the form below if you need to ask the office a question.</p>
{/if}
{if $mode eq 'assistance'}
	<p>Fill in the form below if you require immediate assistance.</p>
{/if}
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
					<td style="width: 362px"><span lang="en-gb">{if isset($found) == false OR $found == TRUE   }<input type="text" name="name" {if isset($data.name)} value="{$data.name}"  disabled{/if} id="example-ajax-post" />{ELSE}
<>The system could not identify that students<h2>
h2
  {foreach key=key item=item from=$result}
    {$item.Name}({$item.username})<br />
  {/foreach}



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
		<input type="submit" value="Confurm Query" >
	{ELSE}
		<input type="submit" value="Submit Query" >
	{/if}
	
	
</form> 
		<!--  Request info end -->









    </div>
    <div id="about" class="tab-pane fade">
	<p>This application was developed for Linkit LTD and licensed for </p>


    </div>



    <div id="Assistance" class="tab-pane fade">
<!--      <h3>Menu 2</h3> -->



<!--  Request assistance end -->













 <form action="{$userhost}/new/2/"  method="post">


	<!-- Request Info start   -->
	<p>Fill in the form below if you require immediate assistance.</p>
				<table style="width: 100%">
				<tr>
					<td style="width: 178px"><span lang="en-gb">Room</span></td>
					<td colspan="2"><span lang="en-gb">
				  
				  <select name="room">
				    <option value='null'>Select one</option>
				    {html_options values=$ROOMS output=$ROOMS}
				</select>

				</td>
				</tr>
				<tr>
					<td style="width: 178px"><span lang="en-gb">Year</span></td>
					<td colspan="2">

					 <select name="year" id="year_dropdown">
						<option value="7">Year 7</option>
						<option value="8">Year 8</option>
						<option value="9">Year 9</option>
						<option value="10">Year 10</option>
						<option value="11">Year 11</option>
						<option value="12">Year 12</option>
					</select> 

				</div>
					
					</td>
				</tr>
				<tr>
					<td style="width: 178px"><span lang="en-gb">Name</span></td>
					<td style="width: 362px"><span lang="en-gb"> <input type="text" name="name" id="example-ajax-post" />	</span></td>
					<td><span lang="en-gb"> </span></td>
				</tr>
				
				<td colspan="2">
	<select class="form-control" id="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;">
		<option></option>
		<option>Rude to staff</option>
		<option>Shouting out</option>
		<option>Refusing to follow instructions</option>
		<option>Refusing to sit where asked</option>
		<option>Refusing to empty mouth</option>
		<option>Late to lesson</option>
		<option>Disrupting others</option>
	</select>




</td>
				
				
				<tr>
					<td style="width: 178px"><span lang="en-gb">Notes</span></td>
					<td colspan="2"><span lang="en-gb">
				  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1"></textarea></span></td>
				</tr>
			</table>		

	<input type="hidden" name="mode" value="2">
	<input type="submit" value="Submit Query" >
</form> 










<!--
	
	<p>Fill in the form below if you require immediate assistance.</p>
	
				<table style="width: 100%">
				<tr>
					<td style="width: 178px"><span lang="en-gb">Room</span></td>
					<td colspan="2"><span lang="en-gb">

				  <select>
				    <option value='null'>Select one</option>
				    {html_options values=$ROOMS output=$ROOMS}
				</select>
				
				</td>
				</tr>
				<tr>
					<td style="width: 178px"><span lang="en-gb">Year</span></td>
					<td colspan="2">
					
					<div class="dropdown">
				  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					Year
					<span class="caret"></span>
				  </button>

				  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					<li><a href="#">Year 7</a></li>
					<li><a href="#">Year 8</a></li>
					<li><a href="#">Year 9</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">Year 10</a></li>
					<li><a href="#">Year 11</a></li>
				  </ul>
				</div>
					
					</td>
				</tr>
				<tr>
					<td style="width: 178px"><span lang="en-gb">Name</span></td>
					<td style="width: 362px"><span lang="en-gb"> 
					<input id="dealerName" class="form-control" placeholder="First name" style="width: 50%"></span></td>
					<td><span lang="en-gb"> 
					<input id="tags0" class="form-control" placeholder="Second name" style="width: 50%"></span></td>
				</tr>

				
				<tr>
					<td style="width: 178px"><span lang="en-gb">Behaviour</span></td>

<td colspan="2">


      <select class="form-control" id="reason" style="width: 220px; border: 1px solid #ccc; border-radius: 3px;">
	<option></option>
	<option>Rude to staff</option>
	<option>Shouting out</option>
	<option>Refusing to follow instructions</option>
	<option>Refusing to sit where asked</option>
	<option>Refusing to empty mouth</option>
	<option>Late to lesson</option>
	<option>Disrupting others</option>

      </select>




</td>



					</td>	
				</tr>
				
				
				<tr>
					<td style="width: 178px"><span lang="en-gb">Notes</span></td>
					<td colspan="2"><span lang="en-gb">
				  <textarea name="comments" id="comments" style="width: 570px; height: 62px" cols="20" rows="1"></textarea></span></td>
				</tr>

				
			</table>		
			
			
-->
<!--  Request Asstanes end -->



    </div>




    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>






</div>
	
	  
        <script src="http://code.jquery.com/jquery.js"></script>
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
    data.phrase = $("#example-ajax-post2").val();
    return data;
  },

  requestDelay: 400
};




$("#example-ajax-post").easyAutocomplete(Name);
$("#example-ajax-post2").easyAutocomplete(Name2);



</script>
		
      </body>
    </html>
	
	
