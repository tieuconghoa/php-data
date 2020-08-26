<table class="list-student-info">
    <thead>
        <tr>
            <th>Student's id</th>
            <th>Student's name</th>
            <th>Student's class</th>
            <th>Student's classify</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . $student->student_id . "</td>";
            echo "<td>" . $student->student_name . "</td>";
            echo "<td>" . $student->student_class_name . "</td>";
            echo "<td>" . $student->student_point . "</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>