<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<div class="w3-container">
    <?php sessionShowMessage(teacher_class_check);?>
    <div class="w3-padding-16">
        <h2>Class : <?php 
    echo $data['class_id']; 
    echo ' Subject : ';
    echo $data['detail']['name'];
    echo ' Semester : ' ;
    echo $data['detail']['semester'];
    echo ' Sec : ';
    echo $data['detail']['section'];    
    ?></h2>
    </div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Student ID</th>
                <th>Status</th>
                <th> Num<br>Checks</th>
                <th>Check At</th>
            </tr>
        <?php
        foreach($data['detail']['table'] as $sub )
        {
            echo"<tr>";
                echo"<tr align = center>";
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
