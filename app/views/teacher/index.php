<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<div style="padding:20px; margin-top:30px;">   
    <h1>Teacher Page</h1>
</div>
<h2>Class Total : </h2>
<?php   /*table*/
    echo"<table>";
        echo"<tr align = center>"; //head table
            echo "<th width=10%>Subject Code</th>";
            echo "<th width=15%>Subject Name</th>";
            echo "<th width=5%>Academic Year</th>";
            echo "<th width=2%>Semaster</th>";
            echo "<th width=2%>Section</th>";
            echo "<th width=2%>Num Checks</th>";
            echo "<th width=20%>Key</th>";
            echo "<th width=2%>Edit</th>";
            echo "<th width=2%>Check</th>";
        echo"</tr>";
    foreach($data as $sub){
        echo"<tr align = center>";  //id subject_code  subject_name academic_year semaster section num_checks secret
            echo "<td>".$sub->subject_code."</td>";
            echo "<td>".$sub->subject_name."</td>";
            echo "<td>".$sub->academic_year."</td>";
            echo "<td>".$sub->semaster."</td>";
            echo "<td>".$sub->section."</td>";
            echo "<td>".$sub->num_checks."</td>";
            echo "<td>".$sub->secret."</td>";
            echo "<td align=left><a href=' " . URLROOT . "/teachers/classDetail/".$sub->id. "'>edit</a></td>";
            echo "<td align=left><a href=' " . URLROOT . "/teachers/classCheck/".$sub->id. "'>check</a></td>";
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