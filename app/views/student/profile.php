<?php require APPROOT . '/views/common/header.php'; ?>
<div id="clock"></div></ul>
<div style="padding:20px; margin-top:30px;">   
<h1>student</h1>
</div>  
    <br>
    <h4>name : <?php echo $data['name'];?></h4>
    <h4>student id: <?php echo $data['student_id'];?></h4>
    <img src="<?php echo $data['image_link'];?>" alt="i" width=100 height=100>
    <h1>upload image</h1>
    <form action="<?php echo URLROOT . '/students/uploadImage';?>" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_image" id="profile_image"><br>
        <input type="submit" value="SUBMIT">
    </form>
    <div>
        <h4 style="color: green"><?php echo isset($data['message']) ? $data['message'] : '';?></h4>
        <h5 style="color: red"><?php echo isset($data['error']) ? $data['error'] : '';?></h5>
    </div>
    <?php sessionShowMessage(student_upload_image); ?>
<script>        
    /* clock */
    function showTime() 
    {
        var date = new Date();
        var hr = date.getHours();
        var min = date.getMinutes();
        var sec = date.getSeconds();   
        hr = (hr === 0) ? 24 : hr;
        if (hr > 23) 
            {   hr = hr - 24;   }
        hr = (hr < 10) ? "0" + hr : hr;
        min = (min < 10) ? "0" + min : min;
        sec = (sec < 10) ? "0" + sec : sec;
        var time = hr + ":" + min + ":" + sec + " ";
        var clock = document.querySelector('#clock');
        clock.innerText = time;
        setTimeout(showTime, 1000);
    }
    showTime();
</script>
<?php require APPROOT . '/views/common/footer.php'; ?>