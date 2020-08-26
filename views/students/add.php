<form action="" method="POST">
    <fieldset class="person">
        <legend>Personalia:</legend>
        <label class="person-label" for="fname">Student's id:</label>
        <input class="person-input disabled" type="text" id="fname" name="student_id" readonly value="<?= $data['student']->student_id + 1 ?>"><br><br>
        <label class="person-label" for="fname">Student's name:</label>
        <input class="person-input" type="text" id="fname" name="student_name" required autofocus><br><br>
        <label class="person-label" for="lname">Student's address:</label>
        <input class="person-input" type="text" id="lname" name="student_address" required><br><br>
        <label class="person-label" for="lname">Student's class:</label>
        <select name="student_class">
            <?php
            foreach ($data['classes'] as $class) {
                echo "<option value='$class->class_id'>".$class->class_name."</option>";
            }
            echo "<option>Add group</option>";
            ?>
        </select>
        <table>
            <thead>
                <tr>
                    <th>Hành động</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['capacities'] as $capacity) {
                    echo '<tr>';
                    echo '<td class="capacity" colspan="6"><label>' . $capacity->capacity_value . '</label></td>';
                    echo '</tr>';
                    foreach ($data['action'] as $action) {
                        if ($action->capacity_id == $capacity->capacity_id) {
                            echo '<tr>';
                            echo '<td><label class="action-value">' . $action->action_value . '</label></td>';
                            echo '<td class="checkbox"><input type="radio" name="' . $action->action_id . '" value="1" checked required></td>
                            <td class="checkbox"><input type="radio" name="' . $action->action_id . '" value="2" ></td>
                            <td class="checkbox"><input type="radio" name="' . $action->action_id . '" value="3"></td>
                            <td class="checkbox"><input type="radio" name="' . $action->action_id . '" value="4"></td>
                            <td class="checkbox"><input type="radio" name="' . $action->action_id . '" value="5"></td>';
                            echo '</tr>';
                        }
                    }
                }
                ?>
            </tbody>
        </table>
        <input class="btn-submit" name="submit" type="submit" value="Gửi" />
    </fieldset>
</form>