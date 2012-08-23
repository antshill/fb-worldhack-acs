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

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

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
        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

        <script>
          function money(v) {
          	return '$' + Math.floor(v*100)/100.0;
          }
//        $.ready(function($) {
        	$.ajax({
        		url: apiurl + '/item',
        		dataType: 'json',
        		success: function(data, textStatus, jqXHR) {
        			console.log(data, textStatus);
        			$.each(data, function (i, item) {
        			console.log(i, item);
        				$('#needs').append('<tr/>');
        				$('#needs tr:last').append('<td><a href="#' + item.id + '" onclick="load(appurl + \'/item.html\')">' + item.name + '</td>');
        				$('#needs tr:last').append('<td style="text-align:right">' + money(item.cost) + '</td>');
        				$('#needs tr:last').append('<td>' + item.status + '</td>');
        			});
        		}
        	});
//    	});
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
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
