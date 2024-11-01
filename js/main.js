(function(slbox_d, slbox_s, slbox_id) {
  var js, fjs = slbox_d.getElementsByTagName(slbox_s)[0];
  if (slbox_d.getElementById(slbox_id)) return;
  js = slbox_d.createElement(slbox_s); js.slbox_id = slbox_id;
  js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0&appId=1404042346373392&autoLogAppEvents=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));