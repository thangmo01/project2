<?php require APPROOT . '/views/common/header.php'; ?>
    <h1>teacher</h1>
    <?php echo $data['title'] ?>
    <?php
        foreach ($data as $sub) {
            print_r($sub);echo '<br>';
        }
    ?>
<?php require APPROOT . '/views/common/footer.php'; ?>