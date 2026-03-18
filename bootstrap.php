<?php
    define("_DIR_ROOT",__DIR__);
    // Xác định đường dẫn root của dự án (ở đây là về MVC_Training), giúp gọi các file ở các thư mục dễ hơn
    // echo _DIR_ROOT;
    require_once("configs/routes.php");
    require_once("core/Controller.php");
    require_once("app/App.php");