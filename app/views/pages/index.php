<?php require APPROOT . '/views/common/header.php'; ?>
<div>
    <?php echo isset($data['email_error']) ? '<h2 style="color: red">' .$data['email_error'] . '<h2>' : '';?>
</div>
<style>
body, html {
  height: 100%;
  margin: 0;
}
</style>
<div class="coverbgimg">
  <div class="covermiddle">
    <h1>Project2</h1>
    <hr>
    <p>Project2 is our web project <br>that we made in this year 2019.<br></p>
    <hr>
    <h1><strong> Why it have to be project2?</strong></h2>
    <p>Cause Project1 doesn't have "INNOVATION"<br>So it vanished like Thanos snap his finger </p>
  </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
