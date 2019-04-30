<?php require APPROOT . '/views/common/header.php'; ?>
    <div id="main">
        <button class="openbtn" onclick="openNav()">☰ Toggle Sidebar</button><br>
		 <?php date_default_timezone_set("Asia/Bangkok");
			echo "Today is " . date("Y/m/d") . "<br>";
			echo "Today is " . date("H:i:s") . "<br>";
			echo "Today is " . date("l");
		?>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>
   </div>
<?php require APPROOT . '/views/common/footer.php'; ?>