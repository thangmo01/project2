<?php require APPROOT . '/views/common/header.php'; ?>
    <h1>teacher</h1>
    <?php
        foreach ($data as $sub) {
            // print_r($sub);echo '<br>';
            echo '<a href="' . URLROOT . '/teachers/classDetail/' . $sub['class_id'] . '">' . $sub['class_id'] . '</a>';
            echo '<br>';
        }
    ?>
<?php require APPROOT . '/views/common/footer.php'; ?>