<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
    <title>订单列表</title>
	<meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
    <script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
        <th>订单编号</th>
        <th>订单名称 </th>
        <th>金额</th>
        <th>周期</th>
        <th>状态</th>
    </tr>
    </thead>
    <tr>
        <!-- <?php foreach ($orderArr as $order_item): ?>
        <th><?php echo $order_item['order_code'] ?></th>
        <th><?php echo $order_item['order_name'] ?></th>
        <th><?php echo $order_item['money'] ?></th>
        <th><?php echo $order_item['cycle'] ?></th>
        <th><?php echo $order_item['status'] ?></th>
        <?php endforeach ?> -->
    </tr>
</table>

</div>
</body>
</html>