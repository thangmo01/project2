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
       <br> <input type="text" name="firstname" value="enter your class">
                <a href="#">main</a>
                <a href="#">history</a>
                <a href="#">setting</a>
                <a href="#">logout</a>
                
    </div>

    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Option</button>
   
    
<?php       /* time
    echo"<br><br><br><br>";
    echo date("d/m/Y")."<br>";
    date_default_timezone_set("Asia/Bangkok");
    date("H:i:s")."<br>";   */
?>    
    
<div id="clock"></div>


<?php    /*table*/


        echo"<table >";
        $column = 1;
        $row = 0;
        $late =1;
        $absent =2;
        $fname ='Pongsathorn';
        $lname ='Kaosamphan';
        $idstd =60010640;
        $sp5='&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo"<tr align = center>";
        echo"<th width=20%>Student ID</th>
        <th width=45%>Name</th>
        <th width=35%>History(Late/Absent)</th>";
        echo"</tr>";
        
        for ($column=1; $column <= 10; $column++) 
        {   echo"<tr >";    /*data in table*/
            echo"<td align=center valign=top>$idstd</td>
            <td valign=top>$fname $lname</td>
            <td style='padding: 10px 15px 10px 60px;'>Late : $late
                <br>$sp5- 1/2/1999 
            <br>Absent : $absent
                <br>$sp5- 2/2/2222
                <br>$sp5- 2/3/1999</td>";
           
            echo"</tr>";
            
        }
        echo"</table>";
        echo "<button style='float: right;'>export</button>";
?>

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

<script>        /* clock */
    function showTime() 
    {
    var date = new Date();
    var hr = date.getHours();
    var min = date.getMinutes();
    var sec = date.getSeconds();
    
    hr = (hr === 0) ? 24 : hr;
    if (hr > 23) 
    {
        hr = hr - 24;
        
    }
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