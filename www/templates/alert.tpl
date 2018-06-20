{config_load file="test.conf" section="setup"}
{include file="header.tpl"}

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


<form action="{$userhost}/alerts/t/" method="post">

        <h1 class="sub-header">Closed</h1>
{if isset($student_results) != TRUE	 }        
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




	    
{/if}

{if isset($alert_id) }
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
{/if}
        

        
		



                </tbody>
            </table>
          </div>
        </div>

{if isset($student_results) }

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    
    
{if $student == 's' }         <h2>Records {$student_results.0.name}</h2>{/if}
{if $student == 'u' }         <h2>Records Teacher {$student_results.0.fullname} </h2>{/if}

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th style="width: 128px">Date</th>
{if isset($alert_id) != true }                  
                  <th style="width: 128px">Room</th>
					<th style="width: 170px">Student name</th>                  
					<th style="width: 623px">Reason / Response</th> {/if}
<!--                  <th style="width: 100px">Responce</th> -->
                  <th style="width: 100px">Type</th>
                  <th style="width: 111px">Teacher</th>
                </tr>
              
              </thead>
              <tbody>

			  {foreach from=$student_results item=foo}
			  
                <tr>
                  <th style="width: 128px" >{$foo.timestamp}</th>
                  <th style="width: 128px" >{$foo.room}</th>
					<th style="width: 170px" ><a href="{$userhost}/alerts/s/{$foo.username}/">{$foo.name}</a></th>                  
					<th style="width: 723px" >{$foo.reason} {if $foo.alert_response != '' } (Response:{$foo.alert_response}) {/if}</th>

                  <th >{if $foo.alert_type_id == '1' }Assistance{/if}{if $foo.alert_type_id == '2' }Information{/if}</th>
                  <th style="width: 111px" ><a href="{$userhost}/alerts/u/{$foo.user_name}/">{$foo.user_name}</a></th>
                </tr>
            {/foreach}
            
<!--            
                  <tr>
                  <th style="width: 128px" >1/1/1990</th>
{if isset($alert_id) != true }                  
                  <th style="width: 128px" >K409</th>
					  <th style="width: 170px" >Chris Wheeler</th>                  
					  <th style="width: 623px" >Students has remove them selfs 
					  from the class</th> {/if}
                  <th >Understood</th>
                  <th ><span data-dobid="hdw">Assistance</span></th>
                  <th style="width: 111px" >B User</th>
                  </tr>
-->
              </tbody>
            </table>
          </div>
        </div>
{/if}


{include file="footer.tpl"}