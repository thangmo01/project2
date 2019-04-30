<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>auth</title>
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCRL8xcJoK7jj3r6s7OtdCiZz5djGuKjyo",
    authDomain: "check-name-c3dae.firebaseapp.com",
    databaseURL: "https://check-name-c3dae.firebaseio.com",
    projectId: "check-name-c3dae",
    storageBucket: "check-name-c3dae.appspot.com",
    messagingSenderId: "279764457881"
        };
        firebase.initializeApp(config);
        var provider = new firebase.auth.GoogleAuthProvider();
        function onSignInButtonClick() {
            firebase.auth().signInWithPopup(provider).then(function (result) {
                console.log(result);
                //Do something when login complete
				document.write("pass");
            }).catch(function (error) {
               document.write("error");
			   //Do something when error
            });
        }
    </script>
</head>
<body>
    <button SignInBuonclick="onttonClick()">Login</button>
</body>
</html>