﻿<?php require APPROOT . '/views/common/header.php'; ?>
<?php require APPROOT . '/views/common/sidebar.php'; ?>
    <div id="main"> 
<?php require APPROOT . '/views/common/time.php'; ?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
   </div>
   <a href="<?php echo URLROOT . '/student/main';?>">main</a>
<?php require APPROOT . '/views/common/footer.php'; ?>