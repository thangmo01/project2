<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<div class="w3-container">
    <?php sessionShowMessage(teacher_class_check);?>
    <div class="w3-padding-16">
        <h2>Class : ----------</h2>
        <h2>Academic Year :<?php echo $sub->academic_year." Semester : ".$sub->semaster; ?></h2>
    </div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Section</th>
                <th>Student ID</th>
                <th>Name</th>
                <th> Num<br>Checks</th>
                <th>Check At</th>
            </tr>
        <?php
        foreach($data['detail'] as $sub )
        {
            echo"<tr>";
                echo"<tr align = center>";
                echo "<td>".$sub->section."</td>";
                echo "<td>".$sub->student_id."</td>";
                echo "<td>---------</td>";
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
