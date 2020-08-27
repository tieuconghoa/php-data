<table class="list-student-info">
    <thead>
        <tr>
            <th>Class's id</th>
            <th>Class's name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($classes as $class) {
            echo "<tr>";
            echo "<td>" . $class->class_id . "</td>";
            echo "<td><a href='?controller=classes&action=detail&id=".$class->class_id."'>" . $class->class_name . "</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>