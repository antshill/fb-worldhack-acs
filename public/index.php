<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Austin Children's Shelter Wishes</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.1.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.0.js"></script>
        <script>
        	var appurl = "http://acs.fbworldhack.com";
        	var apiurl = "http://acs-api.fbworldhack.com";
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
        </script>
    </head>
    <body>

		<div id="fb-root"></div>
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
        			console.log(data, textStatus);
        			$.each(data, function (i, item) {
        			var row =         				'<tr>' + 
        					'<td><a href="#' + item.id + '" onclick="load(\'/item.html\')">' + item.name + '</td>' +
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
			<div>
				<table id="needs">
					<thead><th>Title</th><th>Cost</th><th>Status</th></thead>
				</table>
			</div>
        </div>
    </body>
</html>
