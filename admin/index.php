<?php
session_start();
if (!$_SESSION["dangnhap_admin"]) {
    header("location: ./login/login.php");
}

include("../model/pdo.php");
include("../model/danhmuc.php");
include("../model/sach.php");



include("./header.php");

if (isset($_GET['act']) && $_GET['act'] != '') {
    $act = $_GET['act'];

    switch ($act) {
        // Quản lý danh mục
        case 'themdanhmuc':
            if (isset($_POST['themmoi'])) {
                $tendanhmuc = $_POST['tendanhmuc'];
                themdanhmuc($tendanhmuc);
                $thongbao = "Thêm thành công";
            }
            include('./danhmuc/them.php');
            break;

        case 'lietkedanhmuc':
            $listdanhmuc = loaddanhmucAll();
            include('./danhmuc/lietke.php');
            break;
        case 'xoadm':
            $iddm = $_GET['iddm'];
            xoadanhmuc($iddm);
            $listdanhmuc = loaddanhmucAll();
            include('./danhmuc/lietke.php');
            break;

        case 'suadm':
            if (isset($_GET["iddm"]) && $_GET["iddm"] > 0) {
                $iddm = $_GET['iddm'];
                $listdanhmucone = loaddanhmucone($iddm);
            }
            include('./danhmuc/sua.php');
            break;

        case 'capnhatdm':
            if (isset($_POST["capnhat"])) {
                $id = $_POST["id"];
                $tendanhmuc = $_POST["tendanhmuc"];
                capnhatdanhmuc($id, $tendanhmuc);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loaddanhmucAll();
            include('./danhmuc/lietke.php');
            break;

        // Món ăn
        case 'themsach':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tensach = $_POST['tensach'];
                $mota = $_POST['mota'];
                $gia = $_POST['gia'];
                $nhaxuatban = $_POST['nhaxuatban'];
                $id_danhmuc = $_POST['id_danhmuc'];
                
                $noibat = $_POST['noibat'];

                $anhsach = $_FILES['anhsach']['name'];
                $anhsach_tmp = $_FILES['anhsach']['tmp_name'];
                $upload = "../uploads/anhsach/";

                $new_anhsach = time() . "_" . basename($anhsach);
                $target_file = $upload . $new_anhsach;

                if (move_uploaded_file($anhsach_tmp, $target_file)) {
                    echo "Thêm ảnh thành công";
                } else {
                    echo "Lỗi";
                }

                insert_sach($tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat);
                $thongbao = "Thêm thành công";
            }

            $listdanhmuc = loaddanhmucAll();

            include('./sach/them.php');
            break;

        case 'xoasach':
            if (isset($_GET['idsach']) && $_GET['idsach'] > 0) {
                $idsach = $_GET['idsach'];
                $list_sach_one = list_sach_one($idsach);
                extract($list_sach_one);
                $linkanh = '../uploads/anhsach/' . $list_sach_one['anhsach'];
                    unlink($linkanh);
                delete_sach($idsach);
            }

            $listsach = list_sach_All();
            include('./sach/lietke.php');
            break;

        case 'lietkesach':
            $listsach = list_sach_All();
            include('./sach/lietke.php');
            break;

        case 'suasach':
            if (isset($_GET['idsach']) && $_GET['idsach'] > 0) {
                $idsach = $_GET['idsach'];
                $list_sach_one = list_sach_one($idsach);
            }
            $listdanhmuc = loaddanhmucAll();
            include('./sach/sua.php');
            break;


        case 'capnhatsach':
            if (isset($_POST['capnhat']) && $_POST['capnhat']) {
                $id_sua = $_POST['id_sua'];
                $tensach = $_POST['tensach'];
                $mota = $_POST['mota'];
                $gia = $_POST['gia'];
                $nhaxuatban = $_POST['nhaxuatban'];
                $id_danhmuc = $_POST['id_danhmuc'];
               
                $noibat = $_POST['noibat'];

                $anhsach = $_FILES['anhsach']['name'];
                $anhsach_tmp = $_FILES['anhsach']['tmp_name'];
                $upload = "../uploads/anhsach/";

                $list_sach_one = list_sach_One($id_sua);

                if ($anhsach != "") {
                    $linkanh = '../uploads/anhsach/' . $list_sach_one['anhsach'];
                    unlink($linkanh);

                    $new_anhsach = time() . "_" . basename($anhsach);

                    $target_file = $upload . $new_anhsach;
                    if (move_uploaded_file($anhsach_tmp, $target_file)) {
                        echo "Thêm ảnh thành công";
                    } else {
                        echo "Lỗi khi tải lên ảnh mới";
                    }
                }

                capnhat_sach($id_sua, $tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat);
            }

            $listsach = list_sach_All();

            include('./sach/lietke.php');
            break;


        
        











    }
} else {
    include("main.php");
}






include("./footer.php");
?>