<?php
    define("_DIR_ROOT",__DIR__);
    // Xác định đường dẫn root của dự án (ở đây là về MVC_Training), giúp gọi các file ở các thư mục dễ hơn
    // echo _DIR_ROOT;

    // Xử lý http root, ta cần tạo 1 chuỗi dạng http hoặc https:localhost/tên thư mục chứa dự án
    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
        $web_root = "https://" . $_SERVER["HTTP_HOST"];
    }else{
        $web_root = "http://" . $_SERVER["HTTP_HOST"];
    }
    // echo $web_root; có dạng http:localhost hoặc https:localhost
    // basename() lấy phần tên cuối cùng trong đường dẫn
    $folder = basename(_DIR_ROOT); //cần đảm bảo file hiện tại nằm trực tiếp trong thư mục ta cần lấy tên
    $web_root = $web_root . "/" .$folder;
    // echo $web_root;
    define("_WEB_ROOT", $web_root);
    require_once("configs/routes.php");
    require_once("app/App.php");
    require_once("core/Controller.php");