{config_load file="test.conf" section="setup"}
{include file="header.tpl"}<br>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


{if isset($add)}
	<div class="alert alert-info">
	  <strong>{$type}</strong> Item added
	</div>
{/if}

{if isset($remove)}
	<div class="alert alert-info">
	  <strong>{$type}</strong> Item removed
	</div>
{/if}


        <h1 class="sub-header">Managed Settings</h1>
		
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th style="width: 600px">Room</th>
<!--                  <th style="width: 100px">Actions</th> -->
                </tr>
              
              </thead>
              <tbody>
<!--
                <tr>
                  <th >EM 1</th>
                  <th >-</th>
                </tr>
-->
              {foreach from=$ROOMS item=foo}
                <tr>
                  <th >{$foo}</th>
<!--                  <th ><button type="button" class="btn btn-primary btn-md" onclick="window.location='../../../room/remove/ID/';" >-</button></th> -->
                </tr>
                {/foreach}

              </tbody>
            </table>
          </div>
        </div>

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<!--        <h1 class="sub-header"><span lang="en-gb">Years</span></h1> -->
		
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				<tr>
                  <th>Year</th>
                  <th>Ou</th>
                </tr>
              
              </thead>
              <tbody>

			  {foreach from=$YEARS item=foo}
                <tr>
                  <th >{$foo.0}</th>
                  <th >{$foo.1}</th>
				</tr>
            {/foreach}

              </tbody>
            </table>
          </div>
        </div>




          </div>
        </div>



{include file="footer.tpl"}