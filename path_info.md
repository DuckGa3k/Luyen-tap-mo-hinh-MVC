Khái niệm:
- PATH_INFO trong PHP (thường truy cập qua $_SERVER['PATH_INFO']) là thành phần đường dẫn nằm sau tên file PHP nhưng trước query string. 
- Nó chứa thông tin bổ sung về "đường dẫn ảo" mà trình duyệt gửi đến, thường được dùng trong các framework để định tuyến URL (URL routing) mà không cần rewrite toàn bộ URL. 

Chi tiết về PATH_INFO:
- Vị trí: Nó xuất hiện giữa tên tệp script (ví dụ: index.php) và dấu hỏi chấm ? (query string).
- Ví dụ: Nếu URL là http://example.com/index.php/san-pham/dien-thoai?id=1.
    +   SCRIPT_NAME: /index.php
    +   PATH_INFO: /san-pham/dien-thoai
    +   QUERY_STRING: id=1