<?php
    class Product{
        public function index()
        {
           echo "Trang chủ";
        }
        public function search(){
            // Nhờ vào cờ QSA trong htaccess, ta vẫn có thể lấy tham số từ $_GET để xử lý
            if(!isset($_GET['keyword'])){
                return;
            }
            echo "Từ khóa tìm kiếm: " . $_GET['keyword'] . "<br>";
        }
    }