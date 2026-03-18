<?php
    class ProductModel{
        protected $_table;
        public function getLists(){
            $data = [
                "Redmi 10",
                "Laptop G15-5511",
                "Keyboard Leaven"
            ];
            // echo "In ra danh sách các sản phẩm";
            return $data;
        }
    }