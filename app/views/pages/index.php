<?php require APPROOT . '/views/common/header.php'; ?>

<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script>
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

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
/* style inputs and link buttons */
input,
.btn {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 5px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none; /* remove underline from anchors */
}

input:hover,
.btn:hover {
  opacity: 1;
}

/* style the container */
.container {
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;
} 

/* add appropriate colors to fb, twitter and google buttons */
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}

/* Two-column layout */
.col {
  float: center;
  width: 50%;
  margin: auto;
  padding: 0 50px;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* hide some text on medium and large screens */
.hide-md-lg {
  display: none;
}
/* Responsive layout - when the screen is less than 650px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 650px) {
  .col {
    width: 100%;
    margin-top: 0;
  }
  /* hide the vertical line */
  .vl {
    display: none;
  }
  /* show the hidden text on small screens */
  .hide-md-lg {
    display: block;
    text-align: center;
  }
}
</style>

<h2>Social Login Form</h2>
<p>test version of project2</p>

<div class="container">
  <form action="/action_page.php">
    <div class="row">
      <h2 style="text-align:center">Register</h2>

     
      <div class="col">
        <input type="text" name="first name" placeholder="first name" required>
        <input type="text" name="last name" placeholder="last name" required>
        
        <a  href="" class="google btn"><i class="fa fa-google fa-fw">
          </i> Register with KMITL account</a>
          <button SignInBuonclick="onttonClick()">Login</button>
      </div>
 
    </div>
  </form>
</div>

<div>
    <h1><?php echo $data['title'];?></h1>
    <h4><?php echo $data['description'];?></h4>
    <a href="<?php echo URLROOT . '/student/main';?>">student</a>
    <a href="<?php echo URLROOT . '/teacher/main';?>">teacher</a>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
