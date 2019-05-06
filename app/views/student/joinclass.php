<?php require APPROOT . '/views/common/header.php'; ?>
<?php sessionShowMessage(student_join_class);?>
<form method="post" action="<?php echo URLROOT . '/students/joinclass' ?>" class="w3-container">
    <input placeholder="KEY" class="w3-input w3-border w3-round" name="secret" type="text" style="width: 50%;">
    <br>
    <input type="submit" value="JOIN" class="w3-bar-item w3-button w3-dark-grey w3-hover-black">
</form>
<style>
form{
    display: flex;
    justify-content: center; 
    align-items: center; 
    min-height: 90vh
}
</style>
<?php require APPROOT . '/views/common/footer.php'; ?>
