{config_load file="test.conf" section="setup"}
{include file="header.tpl"}

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <h1 class="sub-header">Report</h1>
		
		
	A full report can be download using the download link below;<br><br> 


	
	<button type="button" class="btn btn-primary btn-md" onclick="window.location='{$userhost}/download_report/';" >Download</button>
	
    </div>
        
{include file="footer.tpl"}