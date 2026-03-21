<?php
    $routes['default_controller'] = 'home';
    $routes['default_action'] = 'index';
    $routes['san-pham/.+-(\d+).html'] = 'web/product/detail/$1';
    $routes['san-pham'] = 'web/product/index';
    $routes['trang-chu'] = 'web/home/index';
    $routes['dashboard'] = 'admin/dashboard/index';