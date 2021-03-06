<?php require APPROOT . '/views/common/header.php'; ?>
<?php sessionShowMessage(teacher_create_class) ;?>
<h2 style="margin-left:25%; margin-top:20px; font-size:1.5em">Create Class</h2>
<div style="padding:20px 30px 20px 30px; margin-top:20px; margin: auto; border-radius: 5px; background-color: #f2f2f2; min-width:280px; max-width:55%"> 
  <form action="<?php echo URLROOT . '/teachers/createClass' ?>" method="post">
    <label for="subject_id">Subject</label>
    <div style="white-space: nowrap"> 
      <select id="subject_id" name="subject_id" style="width:70%">
      <?php
        foreach ($data['subject_list'] as $subject) {
          echo '<option value="' . $subject->id . '">' .  $subject->subject_code . ' - ' . $subject->subject_name . '</option>';
        }
      ?>
      </select>
      <a class="w3-button w3-hover-black w3-dark-grey" href="<?php echo URLROOT . '/teachers/createSubject';?>">ADD</a>
    </div>
    <div style="white-space: nowrap; display: flex; jusify-content: space-around">
      <div style="display: flex; flex-direction: column; width:50%">
        <label for="semester_id">Semester</label>
        <select id="semester_id" name="semester_id">
          <?php
            foreach ($data['semaster_list'] as $semaster) {
              echo '<option value="' . $semaster->id . '">' .  $semaster->academic_year . ' - ' . $semaster->semaster . '</option>';
            }
          ?>
        </select>
      </div>
      <div style="display: flex; flex-direction: column; width: 50%">
        <label for="section">Section<br></label>
        <input type="text" name="section" 
          style="padding: 12px 30px;
            margin: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;">
      </div>
    </div>
    <div align="right">
    <input style="margin-right:10%;margin-top:8px;" class="buttonblack" type="submit" value="Create" >
    </div>
  </form>
</div>  
<?php require APPROOT . '/views/common/footer.php'; ?>