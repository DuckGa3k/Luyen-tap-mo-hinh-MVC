<?php
// Base model
    class Model extends Database{
        function __construct()
        {
            parent::__construct(); // Gọi constructor của Database để lấy kết nối
        }
    }