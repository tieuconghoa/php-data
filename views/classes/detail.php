
        <?php
        require_once("common/common.php");
        if (empty($listStudent)) {
            echo "<div class='no-data'>No have data</div>";
        } else {
            echo "<table class='list-student-info'>
            <thead>
                <tr>
                    <th>Student's id</th>
                    <th>Student's name</th>
                    <th>Student's birthday</th>
                    <th>Student's address</th>
                    <th>Student's classify</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($listStudent as $student) {
                echo "<tr>";
                echo "<td>" . $student->student_id . "</td>";
                echo "<td><a href='?controller=students&action=detail&id=" . $student->student_id . "'> " . $student->student_name . "</td>";
                echo "<td>" . formatDateTime($student->student_birthday,'d-m-Y') . "</td>";
                echo "<td>" . $student->student_address . "</td>";
                echo "<td>" . ratings($student->student_point, 19) . "</td>";
                echo "</tr>";
            }
        }

        ?>
    </tbody>
</table>