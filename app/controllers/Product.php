<?php
    class Product extends Controller{
        protected $model;
        public function __construct()
        {
            $this->model = $this->model("ProductModel");
            // var_dump($this->model);
        }
        public function index()
        {
           echo "Trang chủ";
           $data = $this->model->getLists();
           print_r($data);
        }
        public function search(){
            // Nhờ vào cờ QSA trong htaccess, ta vẫn có thể lấy tham số từ $_GET để xử lý
            if(!isset($_GET['keyword'])){
                return;
            }
            echo "Từ khóa tìm kiếm: " . $_GET['keyword'] . "<br>";
        }
    }