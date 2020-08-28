<div class="content">
    <form action="" method="POST">
        <label class="person-label" for="fname">Action's id:</label>
        <input class="person-input disabled" type="text" id="fname" name="action_id" readonly value="<?= $lastAction->action_id + 1 ?>"><br><br>
        <label class="person-label" for="fname">Action's name:</label>
        <input class="person-input" type="text" id="fname" name="action_value" required autofocus><br><br>
        <label class="person-label" for="fname">Capacity's name:</label>
        <select name="capacity_id">
            <?php foreach ($listCapacity as $capacity) {
                echo "<option value='$capacity->capacity_id'>" . $capacity->capacity_value . "</option>";
            }
            ?>
        </select>
        <br />
        <input class="btn-submit" name="submit" type="submit" value="Add">
        <input type="button" value="Quay lại" class="btn-submit" onclick="back()" />
    </form>
</div>