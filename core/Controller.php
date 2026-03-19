<?php
    class Controller{
        public function model($model_name){
            if(!file_exists(_DIR_ROOT . "/app/models/" . $model_name .".php")){
                return false;
            }
            require_once(_DIR_ROOT . "/app/models/" . $model_name .".php");
            if(!class_exists($model_name))
                return false;
            $model = new $model_name();
            return $model;
        }
        public function render($view_path, $data=[]){
            if(!file_exists(_DIR_ROOT . "/app/views/" . $view_path .".php")){
                return false;
            }
            // print_r($data);
            extract($data); //hàm này biến các key trong mảng thành tên biến có giá trị = value
            require_once(_DIR_ROOT . "/app/views/" . $view_path .".php");
        }
    }
    