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
        echo"<table align = left>";
        $column = 1;
        $row = 0;

        echo"<tr>";
        echo"<th width=18%>Student ID</th>
          <th width=50%>Name</th>
          <th width=12%>Group</th>
          <th width=20%>Remove</th>";
        echo"</tr>";
        
        for ($column=1; $column <= 10; $column++) 
        {   echo"<tr align = center>";    /*data in table*/
            echo"<td>60010640</td>
            <td align=left>Pongsathorn Kaosamphan</td>
            <td>1</td>
            <td><button>remove</button></td>";
           
            echo"</tr>";
            
        }
        echo"</table>";
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