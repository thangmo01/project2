<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./main.css" />

</head>
<body>
   
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <img class="img" src="team2.jpg" alt="John" style="width:50%">
        <h1>
            Hi,Jo<h1>
                <br> <input type="text" name="firstname" value="enter your class">
                <a href="#">Services</a>
                <form>
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="fname" value="John" style="position:center">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lname" value="Doe">
                </form>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Toggle Sidebar</button><br>
		 <?php
    echo "Today is " . date("Y/m/d") . "<br>";
    echo "Today is " . date("Y.m.d") . "<br>";
    echo "Today is " . date("Y-m-d") . "<br>";
    echo "Today is " . date("l");
    ?>
    <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
   </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

</body>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100" rel="stylesheet">
</html>