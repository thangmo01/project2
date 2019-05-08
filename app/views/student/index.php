<?php require APPROOT . '/views/common/header.php'; ?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  margin: 10px 0 10px 0;
}

/* Remove extra left and right margins, due to padding */
.row {
margin: 0 -5px;
padding: 0 5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  margin-bottom: 20px;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  transition: all 300ms;
  cursor: pointer;
}
.card:hover {
  transform: scale(1.05);
}
</style>
<div class="w3-container">
  <?php if(!empty($data)):?>
  <div class="row">
    <?php
    foreach($data as $sub ){
      echo "<div class="."column".">";
        echo "<div class="."card".">";    
        echo "Subject : ";
        echo $sub->subject_name;
        echo "<br>";
        echo 'Section : ';
        echo $sub->section;
        echo "<br>";
        echo 'Semester: ';
        echo $sub->semester;
        echo "<br>";
        echo 'Academic year: ';
        echo $sub->academic_year;
        echo "<br>";
        echo 'Check: ';
        echo $sub->check . '/' . $sub->num_checks;
        echo "<br>";
        echo "</div>";
      echo "</div>";
    }
    ?>
  </div>
  <?php else:?>
  <h1>Join class ^</h1>
  <?php endif;?>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>