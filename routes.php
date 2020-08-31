<?php
require_once('entities/account.php');
$controllers = array( 'account' => ['login', 'logout']);
//  Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.
if(isset($_SESSION["username"])) {
    $account = unserialize(serialize($_SESSION["account"]));
    $role = json_decode($account->role, true);
    $controllers = $role;
    $controllers['account'] = ['login', 'logout'];
    if(isset($controllers['classes'])) {
        $controllers['students'][] = 'detail';
        $controllers['classes'][]= 'detail';
    } else {
        $controllers['students'][] = 'addConfirm';
    }
} else {
    $controllers = array( 'account' => ['login', 'logout']);
}
// $controllers = array(
//     'students' => ['list', 'add', 'addConfirm', 'detail'],
//     'classes' => ['list', 'add', 'detail'],
//     'action' => ['list', 'add', 'edit'],
//     'capacity' => ['add', 'edit'],
//    
// );
// Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
// thì trang báo lỗi sẽ được gọi ra.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = array_keys($controllers)[0];
    $action = array_values($controllers)[0][0];
}

// Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
include_once('controllers/' . $controller . '_controller.php');
// Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
