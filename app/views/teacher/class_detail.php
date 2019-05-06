<?php require APPROOT . '/views/common/header.php'; ?>
<div class="w3-container">
    <?php sessionShowMessage(teacher_class_check);?>
<div class="w3-padding-16">
    <h2>Class : 000000000 Operating Systems </h2>
    <h2>Academic Year : 2018 <br>Semester : 1 </h2>
</div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Sec</th>
                <th>Student ID</th>
                <th>Name F-L</th>
                <th>Check</th>

            </tr>
        <?php 
        foreach($data as $subj )
        {
           // print_r($data);
            echo"<tr align = center>";  //data  
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
                echo "<td>-</td>";
            echo"</tr>";
        }
        ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
