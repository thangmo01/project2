<?php require APPROOT . '/views/common/header.php'; ?>
<div class="w3-container">
    <div class="w3-padding-16" style="display: flex; justify-content: space-between">
        <h2>Class Total : </h2>
        <a href="<?php echo URLROOT . '/teachers/class_create';?>" class="buttonblack" style="margin-left:10%; margin-top:8px; margin-bottom:20px;" >Create New Class</a>
    </div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto">
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Academic Year</th>
                <th>Semaster</th>
                <th>Sec</th>
                <th>Num Checks</th>
                <th>Key</th>
                <th>Detail</th>
                <th>Check</th>
            </tr>
            <?php
            foreach($data as $sub){
                echo"<tr>";
                    echo "<td>".$sub->subject_code."</td>";
                    echo "<td>".$sub->subject_name."</td>";
                    echo "<td>".$sub->academic_year."</td>";
                    echo "<td>".$sub->semaster."</td>";
                    echo "<td>".$sub->section."</td>";
                    echo "<td>".$sub->num_checks."</td>";
                    echo "<td>".$sub->secret."</td>";
                    echo "<td><a href=' " . URLROOT . "/teachers/classDetail/".$sub->id. "'>detial</a></td>";
                    echo "<td><a href=' " . URLROOT . "/teachers/classCheck/".$sub->id. "'>check</a></td>";
                echo"</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
