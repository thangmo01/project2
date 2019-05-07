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
}
</style>

<div class="row">

<?php

foreach($data as $sub )
        {
  echo "<div class="."column".">";
   echo "<div class="."card".">";    
                echo "Subject : ";
                echo $sub->subject_name;
                echo "<br>";
                echo 'Section : ';
                echo $sub->section;
                echo "<br>";
                echo 'Semester';
                echo $sub->semester;
                echo "<br>";
                echo '';
                echo $sub->academic_year;
                echo "<br>";
                echo $sub->Check;
                echo "<br>";

        
      
    echo "</div>";
  echo "</div>";
}?></div>
<!-- 
  <div class="column">
    <div class="card">
      <h3>Telecom</h3>
      <p>154224518</p>
      <p>Enter class</p>
    </div>
  </div>
</div>

<div class="row">
  <div class="column">
    <div class="card">
      <h3>FoundationEng</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>SAD</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Webtech</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Datacom</h3>
      <p>Some text</p>
      <p>Some text</p>
    </div>
  </div>
</div> -->
<?php require APPROOT . '/views/common/footer.php'; ?>