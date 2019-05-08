<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<div class="w3-container">
    <div class="w3-padding-16">
        <h2 style="font-size:1.5em">
            <?php 
                echo ' Subject : ';
                echo $data['class']->subject_name;
                echo ' Semester : ' ;
                echo $data['class']->semaster;
                echo ' Sec : ';
                echo $data['class']->section;    
            ?>
        </h2>
    <div>
    <div class="w3-responsive">
        <h2 style="font-size:1.5em">
            Student : <?php echo count($data['students']);?>
        </h2>
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Student ID</th>
                <th>Name</th>
                <th>Profile</th>
            </tr>
            <?php
            foreach($data['students'] as $key => $stu )
            {
                echo"<tr>";
                    echo '<td style="width: 25%;">'.$stu->student_id."</td>";
                    echo '<td style="width: 25%;">'.$stu->first_name.'   '.$stu->last_name."</td>";
                    echo "<td>".'<img style="width: 5%; height: auto" src="'. $stu->image_link .'">'. "</td>";
                echo"</tr>";
            }
            ?>        
        </table>
    </div>
    <div class="w3-responsive">
        <h2 style="font-size:1.5em">
            Check : <?php echo count($data['checks']);?>
        </h2>
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Num <br> Checks</th>
                <th>Checked At</th>
                <th>TRUE</th>
                <th>FALSE</th>
                <th>Detail</th>
            </tr>
            <?php
            foreach($data['checks'] as $e )
            {
                echo"<tr>";
                    echo"<tr align = center>";
                    echo "<td>".$e->num."</td>";
                    echo "<td>".$e->checked_at."</td>";
                    echo "<td>".$e->true_count."</td>";
                    echo "<td>".$e->false_count."</td>";
                    echo "<td>".'<a '.'class="w3-button w3-khaki" '. 'href="'.URLROOT.'/teachers/classDetail/'.$data['class_id'].'/'.$e->num.'">detail</a>'."</td>";
                echo"</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
