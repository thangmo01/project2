<?php require APPROOT . '/views/common/header.php'; ?>
<div class="w3-container">
    <?php sessionShowMessage(teacher_class_check);?>
    <div class="w3-padding-16">
        <h2>Class Total : </h2>
    </div>
    <div class="w3-responsive">
        <table class="w3-table-all w3-card-4 w3-small" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
            <tr style="text-align: center">
                <th>Subject <br> ID</th>
                <th style="width:200px; max-width: 200px;" >Subject <br> Name</th>
                <th>Academic <br> Year</th>
                <th>Semester</th>
                <th>Sec</th>
                <th>Num <br>Checks</th>
                <th>Key</th>
                <th>Students</th>
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
                    echo "<td>".$sub->students."</td>";
                    echo "<td><a " . 'class="w3-button w3-khaki"' . "href=' " . URLROOT . "/teachers/classDetail/".$sub->id. "'>detail</a></td>";
                    echo "<td><a " . 'class="w3-button w3-indigo"' . "href=' " . URLROOT . "/teachers/classCheck/".$sub->id. "'>check</a></td>";
                echo"</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
