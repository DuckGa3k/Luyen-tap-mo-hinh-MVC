<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="<?php echo _WEB_ROOT; ?>/public/assets/client/css/style.css">
</head>
<body>
    <!-- Do file này sẽ được hiển thị trong class Controller nên có thể dùng $this->render() -->
    <?php $this->render("blocks/header") ?>
    <!-- Dữ liệu được truyền từ Controller sang client_layout 
     xong lại truyền qua view cụ thể (ví dụ product/detail), ta dùng mảng 2 chiều -->
     <!-- $sub_content ở đây thực chất là 1 biến mảng sau khi extract($data)
      Còn $content xác định xem file nào sẽ được mở -->
    <?php 
        $this->render($content, $sub_content) 
    ?>
    <?php $this->render("blocks/footer") ?>
    <script src="<?php echo _WEB_ROOT; ?>/public/assets/client/js/script.js"></script>
</body>
</html>