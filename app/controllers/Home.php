<?php
    class Home extends Controller{
        private $model;
        public function __construct()
        {
            $this->model = $this->model("HomeModel");
        }
        public function index()
        {
           echo "Trang chủ<br>";
           $data = $this->model->getLists();
           print_r($data);
        }
        public function detail($id='',$cat=''){
            //Tham số có giá trị mặc định để tránh lỗi khi $params rỗng
            echo "Mã sản phẩm: " . $id . "<br>";
            echo "Loại sản phẩm: " . $cat . "<br>";
        }
        public function search(){
            // Nhờ vào cờ QSA trong htaccess, ta vẫn có thể lấy tham số từ $_GET để xử lý
            if(!isset($_GET['keyword'])){
                return;
            }
            echo "Từ khóa tìm kiếm: " . $_GET['keyword'] . "<br>";
        }
    }