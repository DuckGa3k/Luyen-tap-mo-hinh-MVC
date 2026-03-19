<?php
    class Product extends Controller{
        private $model;
        private $data=[];
        public function __construct()
        {
            $this->model = $this->model("ProductModel");
            // var_dump($this->model);
        }
        public function index()
        {
           $data = $this->model->getProductList();
           $this->data["content"] = "product/list";
           $this->data["title"] = "Danh sách sản phẩm";
           $this->data["sub_content"]["listProduct"] = $data;
            //    print_r($data);
            // Render ra View
            // $this->render("product/list", $this->data);
            $this->render("layouts/client_layout", $this->data);
        }
        public function detail($id=''){
            //Tham số có giá trị mặc định để tránh lỗi khi $params rỗng
            // echo "Mã sản phẩm: " . $id . "<br>";
            // echo "Loại sản phẩm: " . $cat . "<br>";
            $data = $this->model->getProductDetail($id);
            $this->data["title"] = "Sản phẩm " . $data["Name"];
            $this->data["content"] = "product/detail";
            $this->data["sub_content"]["detailProduct"] = $data;
            // $this->render("product/detail", $this->data);
            $this->render("layouts/client_layout", $this->data);
        }
        public function search(){
            // Nhờ vào cờ QSA trong htaccess, ta vẫn có thể lấy tham số từ $_GET để xử lý
            if(!isset($_GET['keyword'])){
                return;
            }
            // echo "Từ khóa tìm kiếm: " . $_GET['keyword'] . "<br>";
        }
    }