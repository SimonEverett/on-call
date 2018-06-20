{config_load file="test.conf" section="setup"}
{include file="header.tpl"}

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<p>

<h2>Import logs</h2>

<h3>Duplicate Student's</h3>


	<table class="table table-striped" >
              <thead>
				<tr>
                  <th >Name</th>
                  <th >Username</th>
                  <th >Year/Form</th>
                </tr>
		</thead>



{if $duplicates|is_array}
		{foreach from=$duplicates item=foo}
   				<tr>
                  <th >{$foo.Name}</th>
				  <th >{$foo.username}</th>
                  <th >{$foo.year}</th>
                </tr>
		{/foreach}
		</table>
{else}

   				<tr>
                  <th > - </th>
				  <th > None </th>
                  <th > - </th>
                </tr>
		</table>
{/if}





<h3>Staff import log</h3>
<pre>{$staff_log}</pre>

<h3>Year 7</h3>
<pre>{$year7_log}</pre>

<h3>Year 8</h3>
<pre>{$year8_log}</pre>

<h3>Year 9</h3>
<pre>{$year9_log}</pre>

<h3>Year 10</h3>
<pre>{$year10_log}</pre>

<h3>Year 11</h3>
<pre>{$year11_log}</pre>

<h3>Year 12</h3>
<pre>{$year12_log}</pre>

<h3>Year 13</h3>
<pre>{$year13_log}</pre>

</p>

{include file="footer.tpl"}