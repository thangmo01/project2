<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<style>
    h2{ margin-left: 25%;    }
</style>        
<div style="padding:20px; margin-top:30px;">
    <h2 style="margin-lefft:10%">Class : <?php echo $data['class_id'];    ?></h2>
</div>

<?php    /*table*/
    echo"<table>";
        echo"<tr align = center>"; //head table
            echo "<th width=15%>ID</th>";
            echo "<th width=20%>status</th>";
            echo "<th width=50%>Check No.</th>";
            echo "<th width=15%>Checked at</th>";
        echo"</tr>";  
        foreach($data['detail'] as $sub )
        {
           // print_r($data);
            echo"<tr align = center>";  //data  
            echo "<td>".$sub->student_id."</td>";
            echo "<td>".$sub->status."</td>";
            echo "<td>".$sub->num."</td>";
            echo "<td>".$sub->checked_at."</td>";
            echo"</tr>";
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
