<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <?php echo isset($data['email_error']) ? '<h2 style="color: red">' .$data['email_error'] . '<h2>' : '';?>
</div>
<a href="<?php URLROOT . '/check/imageCheck';?>">check</a>
<?php require APPROOT . '/views/common/footer.php'; ?>
