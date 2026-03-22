<?php
    define("_DIR_ROOT",__DIR__);
    // Xác định đường dẫn root của dự án (ở đây là về MVC_Training), giúp gọi các file ở các thư mục dễ hơn
    // Quy tắc: Thấy hàm PHP (require, include) -> Dùng _DIR_ROOT
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
    // Quy tắc: Thấy thẻ HTML (href, src) -> Dùng _WEB_ROOT
    define("_WEB_ROOT", $web_root);

    // Tự động load toàn bộ file trong thư mục configs (optional)
    $config_dir = scandir("configs");
    // print_r($config_dir);
    foreach($config_dir as $file_name){
        if($file_name !== '.' && $file_name !== '..' && file_exists('configs/' . $file_name)){
            require_once('configs/' . $file_name);
        }
    }
    // require_once("configs/database.php"); //load cấu hình cơ sở dữ liệu
    // require_once("configs/routes.php"); //load quy tắc định tuyến
    require_once("core/Route.php"); //load xử lú URL để định tuyến
    require_once("app/App.php"); //load app

    // Kiểm tra đã có cấu hình Database chưa mới thực hiện require
    if(!empty($config['database'])){
        $db_config = array_filter($config['database'], function ($value) {
            return true; //giữ lại các phần tử empty, null, ...
        });
        if(!empty($db_config)){
            // echo "<pre>";
            // print_r($db_config);
            // echo "</pre>";
            require_once("core/Connection.php");
            require_once("core/Database.php");
        }
        
    }
    require_once("core/Controller.php"); //load base Controller
    require_once("core/Model.php"); //load base Model
    