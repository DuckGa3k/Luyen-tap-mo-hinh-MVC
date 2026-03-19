<?php
    class ProductModel{
        protected $_table;
        private $data;
        public function getProductList(){
            $this->data = [
                "1"=>"Redmi 10",
                "2"=>"Laptop G15-5511",
                "3"=>"Keyboard Leaven"
            ];
            // echo "In ra danh sách các sản phẩm";
            return $this->data;
        }
        public function getProductDetail($product_id){
            $data = [
                "1"=>"Redmi 10",
                "2"=>"Laptop G15-5511",
                "3"=>"Keyboard Leaven"
            ];
            if(empty($data))
                return;
            if(array_key_exists($product_id,$data))
                return $data[$product_id];
        }
    }