<?php require APPROOT . '/views/common/header.php'; ?>
<li><a href="<?php echo URLROOT . '/students/profile';?>" class="buttonblue">Profile</a></li>
<div id="clock"></div></ul>    </div>
<div style="padding:20px; margin-top:30px;">
<h1>student</h1>
</div>
<script>        /* clock */
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