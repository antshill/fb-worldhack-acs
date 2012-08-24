<?php

$url = "http://www.antshill.com/acs/ws/sponsor/" . $_GET['id'];

 $curl = curl_init($url);

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $curl_response = curl_exec($curl);

 $result = json_decode($curl_response);
 //echo $result->id;
 curl_close($curl);
?>

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#"> 
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# og_acshelter: http://ogp.me/ns/fb/og_acshelter#">

  <title>OG Tutorial App</title>
  <meta property="fb:app_id" content="374619552609579" /> 
  <meta property="og:type"   content="og_acshelter:need" /> 
  <meta property="og:url"    content="http://www.antshill.com/acs/sponsor.php?id=<?=$_GET['id']?>" /> 
  <meta property="og:title"  content="Tricycle Campaign" /> 
  <meta property="og:image"  content="http://www.antshill.com/acs/img/dollar-sign.jpg" /> 
  <script>
    //window.location.href="/acs/#<?=$_GET['id']?>";


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
    function postSponsorship(id)
    {
      FB.api(
        '/me/og_acshelter:sponsor',
        'post',
        { need: 'http://www.antshill.com/acs/sponsor.php?id=' +id },
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
  <div id="fb-root"></div>
  <script>
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
</body>
</html>