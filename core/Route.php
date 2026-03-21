<?php
    class Route{
        // Xử lý định tuyến
        function handelRoute($url){
            // echo "Xử lý định tuyến";
            global $routes;
            unset($routes['default_controller']);
            unset($routes['default_action']);
            // echo "<pre>";
            // print_r($routes);
            // echo "</pre>";
            $url = trim($url,"/");
            // echo $url;
            $handleUrl = $url;
            if(empty($routes)){
                return;
            }
            // Kiểm tra danh sách các định tuyến trong $routes
            foreach($routes as $key=>$value){
                // Dấu ~ ở đầu và cuối Regex là delimiter (cần phải có khi dùng PHP, có một số delimiter khác như #,/)
                /* is gọi là modifier(cờ), được đặt sau delimiter. Ý nghĩa các modifier:
                    i: không phân biệt hoa thường
                    m: multi-line (nhiều dòng)
                    s: dot match newline (dấu . sẽ khớp luôn cả ký tự xuống dòng)
                    u: unicode (dùng khi match tiếng Việt hay ngôn ngữ có dấu)
                */
                if(preg_match("~^". $key ."$~i",$url)){
                    $handleUrl = preg_replace("~^". $key ."$~i",$value,$url);
                }
            }
            // echo $handleUrl;
            return $handleUrl;
        }
    }