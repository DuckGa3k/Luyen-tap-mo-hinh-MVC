<?php
    class App{
        private $__controller;
        private $__action;
        private $__params;
        private $__routes;
        private $__module;
        function __construct()
        {
            // Cách 1: truy cập biến toàn cầu 
            global $routes; 
            $this->__routes = new Route();
            if(!empty($routes['default_controller']))
                $this->__controller = $routes['default_controller'];
            // Cách 2: sử dụng mảng các biến toàn cầu
            // if(!empty($GLOBALS['routes']['default_controller']))
            //     $this->__controller = $GLOBALS['routes']['default_controller'];
            if(!empty($routes['default_action']))
                $this->__action = $routes['default_action'];
            // $url = $this->getURL();
            // echo $url;
            $this->handleURL();
        }
        function getURL(){
            if(!empty($_SERVER['PATH_INFO'])){
                $url = $_SERVER['PATH_INFO'];
            }else{
                $url = '/';
            }
            return $url;
        }
        function handleURL(){
            $url = $this->getURL();
            /* Phương thức handleRoutes sẽ kiểm tra các giá trị của biến toàn cầu routes (viết trong config)
            xem có đường dẫn nào khớp ko, nếu có thì nó sẽ trả về phần controller, action và params thực tế.
            Ví dụ đường dẫn là san-pham, trong biến toàn cầu routes có routes['san-pham'] = "product/index"
            thì $url cuối cùng ta nhận được là product/index, đoạn dưới được xử lý như cũ
            */
            $url = $this->__routes->handelRoute($url);
            $urlArray = array_values(array_filter(explode("/",$url)));
            // $urlArray[0] xác định controller, $urlArray[1] xác định action, còn lại xác định params
            // echo "<pre>";
            // print_r($urlArray);
            // echo "</pre>";
            $this->__module = 'web'; 
            if (!empty($urlArray[0])) {
                // Kiểm tra xem thư mục module có tồn tại không
                if (file_exists("app/controllers/" . $urlArray[0])) {
                    $this->__module = $urlArray[0];
                    array_shift($urlArray); // Xóa module ra khỏi mảng để index 0 luôn là Controller
                }
            }else{
                echo "File không tồn tại";
                $this->loadError();
                return;
            }
            // Xử lý Controller, nếu url có giá trị cho controller thì gán, ngược lại dùng mặc định (ở đây là home)
            if(!empty($urlArray[0])){
                $this->__controller = $urlArray[0]; //gán tên controller 
                $this->__controller = ucfirst($this->__controller); //viết hoa chữ cái đầu để đúng với tên file
            }else{
                $this->__controller = ucfirst($this->__controller);
            }
            // Kiểm tra file có tồn tại ko
            if(file_exists("app/controllers/". $this->__module ."/". $this->__controller . ".php")){
                require_once("app/controllers/". $this->__module ."/". $this->__controller . ".php");
                // Đảm bảo tên file và tên class phải giống nhau
                if(!class_exists($this->__controller)){
                    $this->loadError();
                    echo "Class không tồn tại";
                    return;
                }
                $this->__controller = new $this->__controller(); //tạo một đối tượng mới có tên là giá trị của controller
                // $this->__controller->index();
            }else{
                echo "File không tồn tại";
                $this->loadError();
                return;
            }
            // Xử lý Action
            if(!empty($urlArray[1])){
                $this->__action = $urlArray[1];
            }
            // echo $this->__action;
            // Xử lý Params
            $this->__params = array_slice($urlArray,2);
            // echo "<pre>";
            // print_r($this->__params);
            // echo "</pre>";
            // [$this->__controller, $this->__action]: gọi phương thức action của đối tượng controller
            // Kiểm tra phương thức của đối tượng có tồn tại ko trước khi gọi
            if(!method_exists($this->__controller,$this->__action)){
                echo "Phương thức không tồn tại";
                $this->loadError();
                return;
            }
            call_user_func_array([$this->__controller, $this->__action],$this->__params);
        }
        function loadError($name='404'){
            require_once("app/errors/" . $name . ".php");
        }
    }