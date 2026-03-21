<?php
    // Sử dụng mẫu thiết kế gọi là Singleton, nó tránh việc kết nối cơ sở dữ liệu nhiều lần
    class Connection{
        private static $instance = null;
        private static $conn = null;
        private function __construct($config)
        {
            // echo "<pre>";
            // print_r($config);
            // echo "</pre>";
            // Kết nối cơ sở dữ liệu
            try{
                // echo "Kết nối cơ sở dữ liệu<br>";
                $dsn = "mysql:host=" . $config['host'] ."; dbname=" . $config['db_name'] .";charset=utf8mb4";
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];
                $pdo = new PDO($dsn, $config['username'], $config['password'], $options);
                // echo "Kết nối thành công";
                self::$conn = $pdo;
            }catch(PDOException $e){
                $mess = $e->getMessage();
                die();
            }
        }
        public static function getInstance($config){
            if(self::$instance==null){
                new Connection($config);
                self::$instance = self::$conn; 
            }
            return self::$instance;
        }
    } 

