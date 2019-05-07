<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <?php echo isset($data['email_error']) ? '<h2 style="color: red;font-size:1.5em">' .$data['email_error'] . '<h2>' : '';?>
</div>
<style>
body, html {
  height: 100%;
  margin: 0;
}
h1 , p{
  font-size:0.9em;
}
</style>
<div class="coverbgimg">
  <div class="covermiddle" style="padding:15px 20px 15px 20px;margin-top:10%; margin-left:auto; margin-right:auto;border-radius: 5px; min-width:280px; max-width:70%;">
  <div>
    <h1>Project2</h1>
    <hr>
    <p>Project2 is our web project <br>that we made in this year 2019.<br></p>
    <hr>
    <h1><strong> Why it have to be Project2?</strong></h2>
    <p>Cause Project1 doesn't have "INNOVATION"<br>So it vanished like Thanos snap his finger <br><br></p>
  </div>
</div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
