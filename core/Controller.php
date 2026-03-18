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
    }