<?php require APPROOT . '/views/common/header.php'; ?>
    <h1>upload image</h1>
    <form action="<?php echo URLROOT . '/students/uploadImage';?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_image" id="profile_image"><br>
        <input type="submit" value="SUBMIT">
    </form>
    <h4 style="color: green"><?php echo isset($data['message']) ? $data['message'] : '';?></h4>
    <h5 style="color: red"><?php echo isset($data['error']) ? $data['error'] : '';?></h5>
    <?php if(isset($data['result'])) print_r($data['result']);?>
<?php require APPROOT . '/views/common/footer.php'; ?>