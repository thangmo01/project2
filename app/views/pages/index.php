<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <h1><?php echo $data['title'];?></h1>
    <h4><?php echo $data['description'];?></h4>
    <a href="<?php echo URLROOT . '/student/main';?>">student</a>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
