<?php
require_once("common/common.php");
?>

<?php
if (empty($data)) {
    echo "<div class='no-data'>No have data</div>";
} else {
    echo "<div class='info-student'>
                <div>
                    <div class='student-name'>Họ và tên: " . $detailStudent->student_name . "</div>
                    <div class='student-id'>Mã sinh viên: " . $detailStudent->student_id . "</div>
                    <div class='student-address'>Địa chỉ: " . $detailStudent->student_address . "</div>
                </div>
                <div>
                    <div class='student-evaluate'>Lớp: " . $detailStudent->student_class_name . " </div>
                    <div class='student-evaluate'>Đánh giá: " . ratings($data['evaluate'], count($detailStudent->student_point)) . " </div>
                    <div class='student-evaluate'>Điểm: " . $data['evaluate'] . "</div>
                </div>
            </div>
            <div class='student-point'>
                <table class='list-student-info'>
                    <thead>
                        <tr>
                            <th>Student's action</th>
                            <th>Student's point</th>
                        </tr>
                    </thead>
                    <tbody>";
    foreach ($detailStudent->student_point as $key => $value) {
        echo "<tr>";
        echo "<td>" . key($value) . "</td>";
        echo "<td>" . $value[key($value)] . "</td>";
        echo "</tr>";
    }
}


?>
</tbody>
</table>
</div>