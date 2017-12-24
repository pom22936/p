function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    // console.log('Name: ' + profile.getName());
    // console.log('Image URL: ' + profile.getImageUrl());
    // console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    $.ajax({
        "url":"insapi.php",
        "type":"POST",
        "data":{"id":profile.getId(),"name":profile.getName(),"email":profile.getEmail()},
        "success":function(e){
          console.log(e);
          if(e){
            location.href = "main_login.php";
          }else
            alert("รหัสผ่านไม่ถูกต้อง");
        }
      });
  }