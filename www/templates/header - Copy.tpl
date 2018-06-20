<!DOCTYPE html>
<html lang="en">
  <head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../ico/favicon.ico">

    <title>{#App_tital#} - {$title}</title>

	<!-- Load CSS -->
	<link href="/css/sertch.css" rel="stylesheet" type="text/css" />
	<!-- Load Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold" type="text/css" />
	<!-- Load jQuery library -->
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Load custom js -->
	<script type="text/javascript" src="/js/custom.js"></script>
	
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><sscript src="/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.1/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../../"><span lang="en-gb">{#App_tital#} - {#school_name#}</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
{*            <li><a href="#">Dashboard</a></li> -->
            
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
*} 
            <li><a href="../../settings/">Settings</a></li>
          </ul>
          <form class="navbar-form navbar-right">
<!--            <input type="text" class="form-control" placeholder="Search..."> 



		<input type="text" id="form-control" autocomplete="off">-->



          </form>
        </div>
      </div>
		<!-- Show Results -->
<h4 id="results-text">Showing results for: <b id="search-string">Array</b></h4>
<ul id="results"></ul>
     

    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		  
            <li {if $title == "Dashboard" OR $title == "Settings"} class="active" 	{/if} ><a href="../../../">Dashboard</a></li>
            <li {if $title == "Alerts" || $title == "Single Alert" } class="active" 								{/if} ><a href="../../../alerts/">Past alerts</a></li>
			<li {if $title == "Reports"} class="active" 							{/if} ><a href="../../../reports/">Reports</a></li>
			<li {if $title == "Admin"} class="active" 								{/if} ><a href="../../../admin/">Admin</a></li>
	

{*			
									
            <li {if isset($CURRENT_PAGE) != true} class="active" {/if} ><a href="../../">Overview</a></li> 
            <li {if $CURRENT_PAGE|strstr:"client"} class="active" {/if} ><a href="../../client/">Clients</a></li>

            <li {if $CURRENT_PAGE|strstr:"stock"} class="active" {/if} ><a href="../../stock/">Stock</a></li>
            <li {if $CURRENT_PAGE|strstr:"job"} class="active" {/if} ><a href="../../job/">Jobs</a></li>
            <li {if $CURRENT_PAGE|strstr:"loan"} class="active" {/if} ><a href="../../loan/">Loan Agreements</a></li>
			*}
{*            <li {if $CURRENT_PAGE|strstr:"user"} class="active" {/if}  ><a href="#">Users</a></li> *}
          </ul>
        </div>
