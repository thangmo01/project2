<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <h1><?php echo $data['title'];?></h1>
    <h4><?php echo $data['description'];?></h4>
    <a href="<?php echo URLROOT. '/check' ;?>">check</a>
    <a href="<?php echo URLROOT . '/student/main';?>">student</a>
    <br>
    <?php 
        $authUrl = getGClient()->createAuthUrl();
        echo '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">LOGIN</a>';
    ?>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
