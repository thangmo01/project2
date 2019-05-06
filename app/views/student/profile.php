<?php require APPROOT . '/views/common/header.php'; ?>
<?php sessionShowMessage(student_upload_image); ?>
<div class="w3-container">
    <div class="w3-row w3-padding">
        <div class="w3-col m4 l4" style="display: flex; flex-direction: column; align-items: center">
            <div class="wrap-img">
                <img id="myimage" class="w3-padding" src="<?php echo $data['image_link'];?>" alt="Person" style="width:100%; min-height: 100px; max-height: 350px; height: auto;">
                <div id="select"  class="bottom-right">Select</div>
            </div>
            <form  action="<?php echo URLROOT . '/students/uploadImage';?>" method="post" enctype="multipart/form-data">
                <input name="profile_image" type="file" id="my_file" style="display: none;" onchange="onFileSelected(event)" />
                <input class="w3-button w3-dark-grey w3-hover-black" type="submit" value="UPLOAD">
            </form>
        </div>
        <div class="w3-col m8 l8">
            <h2>Name : <?php echo $data['name'];?></h2>
            <h2>Student ID: <?php echo $data['student_id'];?></h2>
        </div>
    </div>
</div>
<style>
#select{
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    width: 100%;
    height: 40px;
    background-color: rgba(0,0,0,0.5);
    bottom: 8px;
    cursor: pointer;
}
.wrap-img {
  position: relative;
  text-align: center;
  color: white;
}
</style>
<script>
$("#select").click(function() {
    $("input[id='my_file']").click();
});

function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag = document.getElementById("myimage");
  imgtag.title = selectedFile.name;

  reader.onload = function(event) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}
</script>
<?php require APPROOT . '/views/common/footer.php'; ?>