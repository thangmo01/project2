<?php require APPROOT . '/views/common/header.php'; ?></ul>
    <h1>teacher</h1>
<!--    <?php
        foreach ($data as $sub) {
            // print_r($sub);echo '<br>';
            echo '<a href="' . URLROOT . '/teachers/classDetail/' . $sub['class_id'] . '">' . $sub['class_id'] . '</a>';
            echo '<br>';
        }
    ?>
-->    

<div id="clock"></div>

<?php    /*table*/
    echo"<table>";
        echo"<tr align = center>"; //head table
            echo "<th width=18%>Order</th>";
            echo "<th width=50%>Subject</th>";
            echo "<th width=12%>Student</th>";
            echo "<th width=20%>Key</th>";
        echo"</tr>";  
        foreach($data as $sub )
        {
            echo"<tr align = center>";  //data  
                echo "<td>".$sub['class_id']."</td>";
                echo "<td align=left><a href=' " . URLROOT . "/teachers/classDetail/".$sub['subject_name']. " '>".$sub['subject_name']."</td>";
                echo "<td>".$sub['student_count']."</td>";
                echo "<td>".$sub['class_key']."</td>";
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