<form action="" method="POST">
    <table class="list-student-info">
        <?php
        echo "<tr>";
        echo "<td>Student's Id </td>";
        echo "<td>" . $data['student']->student_id . "</td></tr>";
        echo "<tr>";
        echo "<td>Student's Name </td>";
        echo "<td>" . $data['student']->student_name . "</td></tr>";
        echo "<tr>";
        echo "<td>Student's Address </td>";
        echo "<td>" . $data['student']->student_address . "</td></tr>";
        echo "<tr>";
        echo "<td>Student's ClassName </td>";
        echo "<td>" . $data['className']->class_name . "</td>";
        echo "</tr>";
        foreach ($data['listStudentAction'] as $studentAction) {
            echo "<tr>";
            echo "<td>" . $studentAction->action_id . " </td>";
            echo "<td>" . $studentAction->action_point . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <input type="submit" name="submit" value="Xác nhận" class="btn-submit" />
    <input type="button" value="Quay lại" class="btn-submit" onclick="back()"/>
</form>