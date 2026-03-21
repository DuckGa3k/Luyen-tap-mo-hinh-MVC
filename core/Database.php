<?php
    class Database{
        protected $conn;
        function __construct()
        {
            global $db_config;
            $this->conn = Connection::getInstance($db_config);
            // var_dump($this->conn); //nó là một đối tượng PDO
        }
        // Phương thức truy vấn dùng chung, dùng được cả SELECT, INSERT, UPDATE, DELETE
        public function query($sql, $params = [], $statementStatus = false) {
            $statement = $this->conn->prepare($sql);
            $check = $statement->execute($params);
            
            // Nếu muốn lấy đối tượng statement để fetch dữ liệu (dùng khi thực hiện SELECT)
            if ($statementStatus) {
                return $statement;
            }
            return $check; // Trả về true/false cho INSERT/UPDATE/DELETE
        }
        
        // Hàm lấy ID vừa chèn (rất cần cho trang Checkout/Đơn hàng)
        public function lastInsertId() {
            return $this->conn->lastInsertId();
        }
    }