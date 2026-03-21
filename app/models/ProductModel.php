<?php
    class ProductModel extends Model{
        protected $_table = "mat_hang";
        private $data;
        public function getProductList(){
            $sql = "SELECT * FROM  {$this->_table}";
            $this->data = $this->query($sql,[], true)->fetchAll();
            // echo "In ra danh sách các sản phẩm";
            return $this->data;
        }
        public function getProductDetail($product_id){
            $data = [
                "1"=>["Name"=>"Redmi 10", "Category"=>"Smartphone","Price"=>"3000000"],
                "2"=>["Name"=>"Laptop G15-5511", "Category"=>"Laptop","Price"=>"12000000"],
                "3"=>["Name"=>"Keyboard Leaven", "Category"=>"Keyboard","Price"=>"500000"]
            ];
            if(empty($data))
                return;
            if(array_key_exists($product_id,$data))
                return $data[$product_id];
        }
    }