<?php
include("sach/title.php");

if (isset($list_sach_one) && is_array($list_sach_one)) {
    extract($list_sach_one);
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form_them">
                <h4>Cập nhật sach</h4>
                <form action="index.php?act=capnhatsach" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_sua" value="<?= $id_sach ?>">
                    <div class="mb-3">
                        <label for="ok" class="form-label">Tên sách</label>
                        <input type="text" name="tensach" class="form-control" id="ok" placeholder="Nhập tên sách"
                            required value="<?= $tensach ?>">
                    </div>
                    <div class="form-group shadow-textarea ">
                        <label for="exampleFormControlTextarea6">Mô tả sách</label>
                        <textarea name="mota" class="form-control z-depth-1" id="exampleFormControlTextarea6"
                            rows="3" placeholder="Nhập mô tả sách"><?= $mota ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="ok1" class="form-label">Giá sách</label>
                        <input type="text" name="gia" class="form-control" id="ok1" placeholder="Nhập giá sách"
                            required value="<?= $gia ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok3" class="form-label">Tên nhà xuất bản</label>
                        <input type="text" name="nhaxuatban" class="form-control" id="ok3" placeholder="Nhập tên sách"
                            required value="<?= $nhaxuatban ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ok2" class="form-label">Hình ảnh sách</label><br>
                        <img src="../uploads/monan/<?= $anhsach ?>" width="150" alt="">
                        <input type="file" name="anhsach" class="form-control" id="ok2" placeholder="Nhập tên sách">
                    </div>

                    <div class="chosen-select-single mg-b-20 mb-3">
                        <label class="form-label">loại danh mục</label>
                        <select name="id_danhmuc" class="select2_demo_3 form-control">
                            <?php

                            foreach ($listdanhmuc as $key => $value) {
                                $selected = ($id_danhmuc == $value['id_danhmuc']) ? "selected" : "";
                                ?>
                                <option <?= $selected ?> value="<?= $value["id_danhmuc"] ?>">
                                    <?= $value["tendanhmuc"] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    

                    <div class="mb-3">
                        <label for="ok20" class="form-label">Nổi bật</label>
                        <input type="number" name="noibat" class="form-control" value="<?= $noibat ?>" id="ok20"
                            placeholder="Nhập số" required>
                    </div>

                    <div class="mb-3 form_btn form-check">
                        <input class="btn btn-primary mr-3 text-left" type="submit" name="capnhat" value="CẬP NHẬT MỚI"
                            required>
                        <a href="index.php?act=lietkemonan"><input class="btn btn-success text-left" type="button"
                                value="DANH SÁCH"></a>
                    </div>
                </form>

                <?php
                if (isset($thongbao) && $thongbao != "") {
                    echo '<div class="alert alert-success" role="alert">' . $thongbao . '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>