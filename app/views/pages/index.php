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
    <h1>Lorem Ipsum</h1>
    <hr>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         when an unknown printer took a galley of type and scrambled it to make a type specimen book.
          It has survived not only five centuries, but also the leap into electronic typesetting,
           remaining essentially unchanged. 
           It was popularised in the 1960s with the release of Letraset sheets containing 
           Lorem Ipsum passages, and more recently with desktop publishing software like 
           Aldus PageMaker including versions of Lorem Ipsum.</p>
  </div>
</div>
<?php require APPROOT . '/views/common/footer.php'; ?>
