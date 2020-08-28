<div class="content">
    <form action="" method="POST">
        <label class="person-label" for="fname">Class's id:</label>
        <input class="person-input disabled" type="text" id="fname" name="class_id" readonly value="<?= $data['lastClass']->class_id + 1 ?>"><br><br>
        <label class="person-label" for="fname">Class's name:</label>
        <input class="person-input" type="text" id="fname" name="class_name" required autofocus><br><br>
        <input class="btn-submit" name="submit" type="submit" value="Add">
        <input type="button" value="Quay lại" class="btn-submit" onclick="back()" />
    </form>
</div>