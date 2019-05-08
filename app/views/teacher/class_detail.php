<?php require APPROOT . '/views/common/header.php'; ?>
<div class="w3-container">
    <?php sessionShowMessage(teacher_class_check);?>
    <div class="w3-padding-16">
        <h2 style="font-size:1.5em">
        Class : 
        <?php 
            echo $data['class_id']; 
            echo ' Subject : ';
            echo $data['detail']['name'];
            echo ' Semester : ' ;
            echo $data['detail']['semester'];
            echo ' Sec : ';
            echo $data['detail']['section'];    
        ?>
        </h2>
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
            foreach($data['detail']['table'] as $key => $sub )
            {
                echo"<tr>";
                    echo"<tr align = center>";
                    echo "<td>".$sub->student_id."</td>";
                    echo "<td>".$sub->status."</td>";
                    echo "<td>".$sub->num."</td>";
                    echo "<td>".$sub->checked_at."</td>";
                echo"</tr>";
            }
            ?>        
        </table>
    </div>
<?php require APPROOT . '/views/common/footer.php'; ?>
