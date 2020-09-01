<form action="./?controller=students&action=addConfirm" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <label class="person-label" for="fname">Student's name:</label>
            <input class="person-input" type="text" id="fname" name="student_name" required autofocus><br><br>
            <label class="person-label" for="fname">Student's birthday:</label>
            <input class="person-input" type="date" id="fname" name="student_birthday" pattern="\d{2}-\d{2}-\d{4}" placeholder="dd-mm-yyyy" required />
            <br><br>
            <input class="person-input disabled" type="hidden" id="fname" name="student_id" readonly value="<?= $data['student']->student_id + 1 ?>"><br><br>
        </div>
        <div class="col-sm-6">
            <label class="person-label" for="lname">Student's address:</label>
            <input class="person-input" type="text" id="lname" name="student_address" required><br><br>
            <label class="person-label" for="lname">Student's class:</label>
            <select name="student_class" onchange="changeGroup(value)">
                <?php
                foreach ($data['classes'] as $class) {
                    echo "<option value='$class->class_id'>" . $class->class_name . "</option>";
                }
                ?>
            </select>
        </div>
    </div>


    <table>
        <thead>
            <tr>
                <th class="th-class">Hành động</th>
                <th class="th-class">1</th>
                <th class="th-class">2</th>
                <th class="th-class">3</th>
                <th class="th-class">4</th>
                <th class="th-class">5</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['capacities'] as $capacity) {
                echo '<tr>';
                echo '<td class="capacity" colspan="6"><label>' . $capacity->capacity_value . '</label></td>';
                echo '</tr>';
                foreach ($data['capacityComponents'] as $capacityComponent) {
                    if ($capacityComponent->id == $capacity->capacity_id) {
                        echo '<tr>';
                        echo '<td colspan="6"><label class="capacity-component">' . $capacityComponent->capacity_component_value . '</label></td>';
                        echo '</tr>';
                        foreach ($data['action'] as $action) {
                            if ($action->capacity_component_id == $capacityComponent->id) {
                                echo '<tr>';
                                echo '<td><label class="action-value">' . $action->action_value . '</label></td>';
                                echo '<td class="radio-btn"><input type="radio" name="' . $action->action_id . '" value="1" checked required></td>
                                    <td class="radio-btn"><input type="radio" name="' . $action->action_id . '" value="2" ></td>
                                    <td class="radio-btn"><input type="radio" name="' . $action->action_id . '" value="3"></td>
                                    <td class="radio-btn"><input type="radio" name="' . $action->action_id . '" value="4"></td>
                                    <td class="radio-btn"><input type="radio" name="' . $action->action_id . '" value="5"></td>';
                                echo '</tr>';
                            }
                        }
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <input class="btn-submit" name="submit-add" type="submit" value="Gửi" />
</form>