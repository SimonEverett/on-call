{config_load file="test.conf" section="setup"}
{include file="header.tpl"}


<!-- INFO -->
{if isset($acknowladged) && $acknowladged.0.alert_type_id == '2' && isset($fully_acknowladged) == false  }
	<div id="boxes">
		<div id="dialog" class="window">
			<div class="well well-lg"  >
	
			<H1>Response <a href="../../"class="close"/>X</a> </h1>
	
			<p>Student Name: {$acknowladged.0.Name}<br>Reason: {$acknowladged.0.reason}<br>Room: {$acknowladged.0.room}<br>Type of behaviour: {$acknowladged.0.behaviour_type_descriptions} </p>
			<form action="{$userhost}/acknowladge/{$acknowladged.0.alert_id }/">
				<p>Response: <br><textarea rows="4" cols="50" name="responce"></textarea> </p>
				<input type="submit"  value="Send Response">
			</form>
		</div>
	</div>
{/if}


<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>



<!-- Behaviour -->

{if isset($closed) && $close.0.alert_type_id == '1' && isset($fully_closed) == false  }
	<div id="boxes">
		<div id="dialog" class="window">
			<div class="well well-lg"  >
	
			<H1>Resulting actions <a href="../../"class="close"/>X</a> </h1>
	
			<p>Student Name: {$close.0.Name} ({$close.0.year})<br>Reason: {$close.0.reason}<br>Room: {$close.0.room}<br>Type of behaviour: {$BehaviourType.{$close.0.6}} </p>
			<form action="{$userhost}/close/{$close.0.alert_id }/">
				<p>Response: <br><textarea rows="4" cols="50" name="responce"></textarea> </p>
				<input type="submit"  value="Send Response">
			</form>
		</div>
	</div>
{/if}


<!-- Mask to cover the whole screen -->
  <div id="mask"></div>
</div>





<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


{if isset($fully_acknowladged)}
	<div class="alert alert-info">
	  <strong>Info</strong> Alert acknowledged
	</div>
{/if}

{if isset($closed)}
	<div class="alert alert-info">
	  <strong>Info</strong> Alert closed
	</div>
{/if}





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



	{include file="footer.tpl"}