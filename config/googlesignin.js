// if(localStorage.getItem("email")){
//     //document.getElementsByClassName("g-signin2").disabled = true;
//     alert(localStorage.getItem("email"));
// }else{
//     //document.getElementsByClassName("g-signin2").disabled = false;
// }

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
    
    //localStorage.setItem('email', profile.getEmail());
    var str = profile.getName()+"|"+profile.getEmail()+"|"+profile.getImageUrl();
    setCookie("q",str,1);
    //location.reload();
    //alert(userID);
    //sendToPHP(profile.getEmail());
    //window.location.replace('index.php?email='+profile.getEmail()); //?email='+profile.getEmail()
}

// var logout = function(){
//     document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://www.example.com";
// }

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = escape(name) + "=" + escape(value || "")  + expires + "; path=/";
}

function delcookie(name){
    setCookie(name,"",-1);
}

function sendToPHP(str){
    try{
        var xhttp = new XMLHttpRequest();
        // xhttp.onreadystatechange = function() {
        //     if (this.readyState == 4 && this.status == 200) {
        //       document.getElementById("txtHint").innerHTML = this.responseText;
        //     }
        // };
        xhttp.open("GET","index.php?q="+str,true);
        xhttp.send();
    }catch(e){
        alert(e)
    }
}


function signOut() {
    localStorage.removeItem('email');
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
    console.log('User signed out.');
    });
}