<?php require APPROOT . '/views/common/header.php'; ?>
<?php sessionShowMessage(teacher_create_subject) ;?>
<h2 style="margin-left:25%; margin-top:20px ">Create Subject</h2>
<div style="padding:20px 40px 20px 40px; margin-top:20px; margin-left:25%; margin-right:25%; border-radius: 5px; background-color: #f2f2f2;"> 
  <form action="<?php echo URLROOT . '/teachers/createSubject' ?>" method="post">
    <div style="display: flex; flex-direction: column; width: 100%">
        <label for="subject_name">Subject Name<br></label>
        <input type="text" name="subject_name" 
          style="padding: 12px 30px;
            margin: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;">
    </div>
    <div style="display: flex; flex-direction: column; width: 100%">
        <label for="subject_code">Subject Code<br></label>
        <input type="text" name="subject_code" 
          style="padding: 12px 30px;
            margin: 8px;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;">
    </div>
    <input style="margin-left:81%; margin-top:8px;" class="buttonblack" type="submit" value="Create">
  </form>
</div>  
<?php require APPROOT . '/views/common/footer.php'; ?>