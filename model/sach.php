<?php
function insert_sach($tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat)
{
    $sql = "INSERT INTO tbl_sach(`tensach`, `mota`, `gia`, `nhaxuatban`, `anhsach`, `id_danhmuc`, `noibat`) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat);
}

function delete_sach($id)
{
    $sql = "DELETE FROM tbl_sach WHERE id_sach = ?";
    pdo_execute($sql, $id);
}

function list_sach_All()
{
    $sql = "SELECT * FROM tbl_sach, tbl_danhmuc WHERE tbl_sach.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY id_sach DESC";
    $list_sach = pdo_query($sql);
    return $list_sach;
}

function list_sach_One($idsach)
{
    $sql = "SELECT * FROM tbl_sach WHERE id_sach = ?";
    $listSach = pdo_query_one($sql, $idsach);
    return $listSach;
}

function capnhat_sach($id_sua, $tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat)
{
    if ($new_anhsach != "") {
        $sql = "UPDATE tbl_sach SET tensach= ?,mota= ?,gia= ?,nhaxuatban= ?,anhsach= ?,id_danhmuc= ?, noibat = ? WHERE id_sach = ?";
        pdo_execute($sql, $tensach, $mota, $gia, $nhaxuatban, $new_anhsach,$id_danhmuc, $noibat, $id_sua);
    } else {
        $sql = "UPDATE tbl_sach SET tensach= ?,mota= ?,gia= ?,nhaxuatban= ? ,id_danhmuc= ?, noibat= ? WHERE id_sach = ?";
        pdo_execute($sql, $tensach, $mota, $gia, $nhaxuatban,$id_danhmuc, $noibat, $id_sua);
    }
}












?>