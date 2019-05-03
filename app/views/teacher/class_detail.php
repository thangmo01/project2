<?php require APPROOT . '/views/common/header.php'; ?>
        <h1><center>
        <?php   
            echo "Class : ".$data['class_id']."<br>";        
        ?>
        </center></h1>
    <div id="clock"></div>

<?php    /*table*/
    echo"<table>";
        echo"<tr align = center>"; //head table
            echo "<th width=15%>Order</th>";
            echo "<th width=20%>Student ID</th>";
            echo "<th width=50%>Name</th>";
            echo "<th width=15%>Sec</th>";
        echo"</tr>";  
        foreach($data as $sub)
        {
            $num_count = 1 ;
            echo"<tr align = center>";  //data  
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td align=left>-</td>";
                echo "<td>"."</td>";
            echo"</tr>";
            $num_count++;
        }
    echo"</table>";

?>        

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

<?php require APPROOT . '/views/common/footer.php'; ?>