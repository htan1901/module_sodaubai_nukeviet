<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 4FT
 * @Copyright (C) 2022 4FT. All rights reserved
 * @License GNU/GPL version 3 or any later version
 * @Createdate Mon, 3 Wed 2022 21:00:00 GMT
 */

if (!defined('NV_IS_MOD_SCHOOLBOOK')) die('Stop!!!');


//Chuyển đổi tpl sang xtemplate
$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
//Truyền tham số sang view
$xtpl->assign( 'LANG', $lang_module );

$_classId = $_GET['ma_lop'];

if ($nv_Request->isset_request("add_tkb", "post")) {
    $ngayDay = $nv_Request->get_title("ngay_day", "post");
    $tiet = $nv_Request->get_int("tiet", "post");
    $mon = $nv_Request->get_title("mon", "post");

    $add = "INSERT INTO " . NV_PREFIXLANG . '_' . $module_data . '_kehoachbaiday VALUES ()';


    die($ngayDay . " " . $tiet . " " . $mon);
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&amp;' . NV_OP_VARIABLE . '=class_manager&ma_lop=' . $_classId);
}
if ($nv_Request->isset_request("cancel_tkb", "post")) {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&amp;' . NV_OP_VARIABLE . '=class_manager&ma_lop=' . $_classId);
}

//Chuyển qua khối main
$xtpl->parse('main');
$ifram = $nv_Request->get_int('ifram', 'get', 0);
$contents = $xtpl->text('main');
//Khởi tạo giao diện
include NV_ROOTDIR . '/includes/header.php';
if( $ifram ) {
    echo nv_site_theme( $contents, 0 );
}
else
{
    echo nv_site_theme( $contents );
}
include NV_ROOTDIR . '/includes/footer.php';
    