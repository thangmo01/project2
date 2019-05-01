<?php require APPROOT . '/views/common/header.php'; ?>
    <h1>upload image</h1>
    <form action="<?php echo URLROOT . '/student/uploadImage';?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_image" id="profile_image"><br>
        <input type="submit" value="SUBMIT">
    </form>
<?php require APPROOT . '/views/common/footer.php'; ?>