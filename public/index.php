<?
if($_SERVER['SERVER_NAME'] == "acs.fbworldhack.com") {
  $url = "http://acs-api.fbworldhack.com";
} else {
  $url = "http://www.antshill.com/acs/ws";
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Austin Children's Shelter "Wishes"</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

		<meta property="fb:app_id" content="374619552609579" /> 
		<meta property="og:type"   content="og_acshelter:cause" /> 
		<meta property="og:url"    content="http://acs.worldhack.com" /> 
		<meta property="og:title"  content="Sample Cause" /> 
		<meta property="og:image"  content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png" /> 

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

    	<link href="css/bootstrap.min.css" rel="stylesheet">

		<style>
		  body {
			padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		  }
		</style>
	 
        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.0.js"></script>
    	<script src="js/bootstrap.min.js"></script>
            <script>
        	var apiurl = "<?=$url?>";
        	
        	function load(url) {
        		$('#content').load(url);
        	}

			window.fbAsyncInit = function() {
			  FB.init({
				appId      : '374619552609579', // App ID
				status     : true, // check login status
				cookie     : true, // enable cookies to allow the server to access the session
				xfbml      : true  // parse XFBML
			  });
			};
		
			// Load the SDK Asynchronously
			(function(d){
			  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
			  js = d.createElement('script'); js.id = id; js.async = true;
			  js.src = "//connect.facebook.net/en_US/all.js";
			  d.getElementsByTagName('head')[0].appendChild(js);
			}(document));

			  function login() {
				 FB.login(function(response) {
			   if (response.authResponse) {
				 console.log('Welcome!  Fetching your information.... ');
				 FB.api('/me', function(response) {
				   console.log('Good to see you, ' + response.name + '.');
				 });
			   } else {
				 console.log('User cancelled login or did not fully authorize.');
			   }
			 });
			  }
			  function postDonation(id)
			  {
				  FB.api(
					'/me/og_acshelter:donate_to',
					'post',
					{ cause: 'http://acs.fbworldhack.com/donate.php?id=' +id },
					function(response) {
					   if (!response || response.error) {
							console.log(response);
						  console.log('Error occured');
					   } else {
						  console.log('Cook was successful! Action ID: ' + response.id);
					   }
					});
			  }
        </script>
    </head>
    <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">Austin Children's Shelter "Wishes"</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
		<li><div id="fb-root"></div></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
	<img src="http://www.austinchildrenshelter.org/images/content/pagebuilder/ACS_logo_H_229x69.png"/>

        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <script>
          function money(v) {
          	return '$' + Math.floor(v*100)/100.0;
          }
		  $(document).ready(function() {
        	$.ajax({
        		url: apiurl + '/item',
        		dataType: 'json',
        		success: function(data, textStatus, jqXHR) {
        			$.each(data, function (i, item) {
        			var row = '<tr>' + 
        					'<td><a href="#' + item.id + '" onclick="load(\'item.html\')">' + item.name + '</td>' +
        					'<td style="text-align:right">' + money(item.cost) + '</td>' + 
        					'<td>' + item.status + '</td>' + 
        				'</tr>';
        			console.log(i, item, row);

        				$('#needs').append(row);
        			});
        		}
        	});
    	});
        </script>

        <div id="content">
			<h1>Wishes</h1>
			<div>Austin Children's Shelter (ACS) protects and heals children, young adults and families in need.  
For 27 years, the dedication of it’s leadership and staff, and the tremendous support of donors, volunteers and the community at large that has given ACS the ability to make a significant and positive difference in the lives of literally thousands of children who have suffered abuse and neglect. <div>
			<div>
				<table id="needs">
					<thead><th>Title</th><th>Cost</th><th>Status</th></thead>
				</table>
			</div>
        </div>

<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>

<div class="fb-facepile" data-href="http://www.antshill.com/acs" data-max-rows="1" data-width="300" data-colorscheme="dark"></div>

<div class="fb-activity" data-href="http://www.antshill.com" data-app-id="374619552609579" data-action="og_acshelter:donate_to" data-width="300" data-height="300" data-header="true" data-recommendations="true"></div>
      </div>

    <div class="footer" style="display:none">
      <p><strong>Bootstrap</strong>, from http://twitter.github.com/bootstrap/index.html.</p>
    </div>

    </body>
</html>
