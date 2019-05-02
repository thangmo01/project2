<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <h1><?php echo $data['title'];?></h1>
    <h4><?php echo $data['description'];?></h4>
    <!-- <a href="<?php echo URLROOT. '/check' ;?>">check</a>
    <a href="<?php echo URLROOT . '/student/main';?>">student</a> -->
    <?php echo isset($data['error']) ? '<h2>' .$data['error'] . '<h2>' : '';?>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
