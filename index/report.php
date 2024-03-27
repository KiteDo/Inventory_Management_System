<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="side-bar">
        <header>
            <a href="#">
                <span class="title">Quản lý hàng hóa</span>
            </a>
        </header>

        <div class="menu">
            <div class="item"><a href="index.php"><i class="fa-solid fa-house"></i>Trang chủ</a></div>
            <div class="item">
                <a class="sub-btn">
                    <i class="fa-brands fa-dropbox"></i>Quản lý hàng hóa
                    <i class="fas fa-angle-right dropdown"></i>
                </a>
                <div class="sub-menu">
                    <a href="inventory_in.php" class="sub-item">Quản lý nhập</a>
                    <a href="inventory_out.php" class="sub-item">Quản lý xuất</a>
                    <a href="inventory.php" class="sub-item">Quản lý tồn</a>
                </div>
            </div>

            <div class="item">
                <a href="bill.php">
                    <i class="fa-solid fa-money-bill"></i>Quản lý hóa đơn
                </a>
            </div>

            <div class="item">
                <a href="report.php"><i class="fa-solid fa-message"></i>Báo cáo
                </a>
            </div>
            <div class="item">
                <a href="../login/login.html">
                    <i class="fa-solid fa-money-bill"></i>Đăng xuất
                </a>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fa-solid fa-border-all"></i>
            </div>
            <div class="user">
                <img src="user.png" alt="">
            </div>
        </div>

        <!--details-->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Hàng Hóa</h2>
                </div>
                <table>
                    <a href="add_invent.html">Thêm sản phẩm mới </a>
                    <tr>
                        <thead >
                        <th>Mã Hàng</th>
                        <th>Tên Hàng</th>
                        <th>Đơn Vị</th>
                        <th>Giá</th>
                        <th>Công Ty</th>
                        </thead>
                    </tr>
                    <?php
                    include '../connectdb.php';
                    $sql = "SELECT * FROM inventory "; // Thay ten_bang bằng tên bảng bạn muốn hiển thị
                
                    $result = mysqli_query($conn, $sql);
                
                    // Kiểm tra và hiển thị dữ liệu
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id_product'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><?php echo $row['unit'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['company'];?></td>
                            <td><a onclick="return confirm('bạn chắc chứ?')" href = "delete.php?sid=<?php echo $row['id_product'];?>">Xóa</a></td>
                        </tr>
                    <?php
                    } 
                    ?>
                </table>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                //jquery for toggle sub menus
                $('.sub-btn').click(function () {
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });

            });

        </script>

        <script>
            //MenuToggle
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.side-bar');
            let main = document.querySelector('.main');

            toggle.onclick = function () {
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
        </script>
</body>

</html>