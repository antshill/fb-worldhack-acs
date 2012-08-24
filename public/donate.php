<?php

$url = "http://www.antshill.com/acs/ws/donation/userDonationInfo/" . $_GET['id'];

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
  <meta property="og:type"   content="og_acshelter:cause" /> 
  <meta property="og:url"    content="http://www.antshill.com/acs/donate.php?id=<?=$_GET['id']?>" /> 
  <meta property="og:title"  content="<?=ucwords($result->username)?>'s <?=ucwords($result->itemname)?> Campaign" /> 
  <meta property="og:image"  content="http://www.antshill.com/acs/img/dollar-sign.jpg" /> 
  <script>
    window.location.href="/acs/#<?=$_GET['id']?>";
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

  <script type="text/javascript">

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
  function postDonation()
  {
      FB.api(
        '/me/og_acshelter:donate_to',
        'post',
        { cause: 'http://www.antshill.com/acs/donate.php?id=<?=$_GET['id']?>' },
        function(response) {
           if (!response || response.error) {
              console.log('Error occured');
           } else {
              console.log('Cook was successful! Action ID: ' + response.id);
           }
        });


  }
  </script>
<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
  <h3>Stuffed Cookies</h3>
  <p>
    <img title="Stuffed Cookies" 
         src="http://acs.fbworldhack.com/img/dollar-sign.jpg" 
         width="550"/>
  </p>
</body>
</html>