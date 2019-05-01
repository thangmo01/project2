<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
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
        <br><input type="text" name="firstname" value="enter your class">
            <a href="#">main</a>
            <a href="#">history</a>
            <a href="#">setting</a>
            <a href="#">logout</a>
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Option</button>
   
    
<?php //mysql

//connect
    $objConnect = mysqli_connect("localhost","root","","proj") or die("Error Connect to Database");
        
        
//stu (fname , lname)
    $user = "SELECT * FROM users WHERE user_type_id =2";
    $student = mysqli_query($objConnect,$user);

//stuID
    $userstu = "SELECT * FROM user_students";
    $userstuID = mysqli_query($objConnect,$userstu);

//sec
    $class = "SELECT * FROM classes";
    $section = mysqli_query($objConnect,$class);
    $result3 = mysqli_fetch_array($section);// must be 2
    $sec = $result3['section'];   
?>    
    
    <div id="clock"></div>

<?php    /*table*/

    echo"<table align = left>";
        echo"<tr>"; //head table
            echo "<th width=18%>Student ID</th>
            <th width=50%>Name</th>
            <th width=12%>Group</th>
            <th width=20%>Remove</th>";
        echo"</tr>";
    
    //loop recieve data from sql to table    
        while($result1 = mysqli_fetch_array($student))
        {   //data in table
            //name
                $fname = $result1['first_name'];
                $lname = $result1['last_name'];
            //student id
            $result2 = mysqli_fetch_array($userstuID);
            $stuID = $result2['student_id'];
                
            echo"<tr align = center>";  //data  
                echo"<td>$stuID</td>
                <td align=left>$fname $lname</td>
                <td>$sec</td>
                <td><button onclick=location.href=''>remove</button></td>";
            echo"</tr>";
            
        }
    echo"</table>";

?>

<?php   //close mysql
     mysqli_close($objConnect);
?>

<script>    // Sidebar big
        function openNav() 
        {
            document.getElementById("mySidebar").style.width = "300px";
            document.getElementById("main").style.marginLeft = "300px";
        }

        function closeNav() 
        {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
</script>

<script>        /* clock */
    function showTime() 
    {
        var date = new Date();
        var hr = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();
    
        hr = (hr === 0) ? 24 : hr;
        if (hr > 23) 
            {   hr = hr - 24;   }
        hr = (hr < 10) ? "0" + hr : hr;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;
        var time = hr + ":" + min + ":" + sec + " ";
        var clock = document.querySelector('#clock');
        clock.innerText = time;
        setTimeout(showTime, 1000);
    }
    showTime();
</script>
    </div>     
</body>
</html>
