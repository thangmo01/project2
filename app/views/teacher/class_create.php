<?php require APPROOT . '/views/common/header.php'; ?><div id="clock"></div></ul>
<h2 style="margin-left:25%; margin-top:20px ">Create Class</h2>
<div style="padding:20px 40px 20px 40px; margin-top:20px; margin-left:25%; margin-right:25%; border-radius: 5px; background-color: #f2f2f2;"> 
  
  <label for="subject_id">Subject ID</label>
  <label for="subject_name" style="margin-left:27%">Subject Name<br></label>

  <div style="white-space: nowrap"> <!--subject ID,name-->
    <!--subjectID-->
      <select id="subject_id" name="subject_id" style="width:30%">
        <option value="01236125">01236125</option>
        <option value="01236126">0123126</option>
        <option value="01236127">0123127</option>
        <option value="01236128">0123128</option>
        <option value="01236129">0123129</option>
        <option value="90598002">90598002</option>
      </select>
    <!--subject name-->
      <select id="subject_name" name="subject_name" style="margin-left:5%;width:60%">
        <option value="Web and mobile technologies">Web and mobile technologies</option>
        <option value="System analysis and design">System analysis and design</option>
        <option value="Data communication and computer networks">Data communication and computer networks</option>
        <option value="Telecommunication systems">Telecommunication systems</option>
        <option value="Operating systems">Operating systems</option>
        <option value="English for communication">English for communication</option>
      </select>
  </div>

  <label for="academic_year">Academic Year</label>
  <label for="semester" style="margin-left:23%">Semester</label>
  <label for="section" style="margin-left:28%">Section<br></label>

  <div style="white-space: nowrap"> <!--academic year,semester,section-->
    <!--academic year-->
      <select id="academic_year" name="academic_year" style="width:20%">
        <option value="Y2561">2561</option>
        <option value="Y2562">2562</option>
        <option value="Y2563">2563</option>
      </select>
    <!--semester-->
      <select id="semester" name="semester" style="margin-left:15%;width:21%">
        <option value="T1">1</option>
        <option value="T2">2</option>
      </select>
    <!--section-->
      <select id="section" name="section" style="margin-left:15%;width:22%">
        <option value="sec1">1</option>
        <option value="sec2">2</option>
      </select>
  </div>
  <button class="buttonblack" style="margin-left:81%; margin-top:8px;">Create</button>
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