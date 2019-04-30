<?php require APPROOT . '/views/common/header.php'; ?>
<?php require APPROOT . '/views/common/sidebar.php'; ?>
		<a href="<?php echo URLROOT . '/teacher/main';?>">main</a>
    <a href="<?php echo URLROOT . '/teacher/room';?>">room</a>
    <a href="<?php echo URLROOT . '/teacher/setting';?>">setting</a>
		<div id="main"> 
		<h1>Teacher Check</h1>
		<?php require APPROOT . '/views/common/time.php'; ?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
   </div>

<?php require APPROOT . '/views/common/footer.php'; ?>