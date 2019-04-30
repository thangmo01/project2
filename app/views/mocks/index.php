<?php require APPROOT . '/views/common/header.php'; ?>
<form action="<?php echo URLROOT . '/mocks/mockStudents';?>" method="get">
    <label for="start">start</label>
    <input type="number" name="start" id="start"><br>
    <label for="start">end</label>
    <input type="number" name="end" id="end"><br>
    <button type="submit">mockStudents</button>
</form>
<br>
<br>
<br>
<br>
<form action="<?php echo URLROOT . '/mocks/mockClassStudets';?>"  method="post">
    <button type="submit">mockClassStudets</button>
</form>
<?php require APPROOT . '/views/common/footer.php'; ?>