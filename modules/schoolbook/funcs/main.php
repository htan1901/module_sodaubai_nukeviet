<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 4FT 
 * @Copyright (C) 2022 4FT. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 12 Dec 2022 07:00:00 GMT+7
 */

if (!defined('NV_IS_MOD_SCHOOLBOOK')) die('Stop!!!');


//Chuyển đổi tpl sang xtemplate
$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
//Truyền tham số sang view
$xtpl->assign( 'LANG', $lang_module );
//Kiểm tra trạng thái khi người dùng chọn login
if ($nv_Request->isset_request('login', 'post')) {
    $input_username = $nv_Request->get_title('input_username', 'post', true);
    $input_password = $nv_Request->get_title('input_password', 'post', true);
    $xtpl->assign('USERNAME', $input_username);
    $xtpl->assign('PASSWORD', $input_password);

    //Kiểm tra thông tin người trong csdl
    $sql = 'SELECT * FROM ' . NV_PREFIXLANG . '_' . $module_data . "_taikhoan WHERE ten_dang_nhap = '".trim($input_username)."' AND mat_khau = '".trim($input_password)."';";

    $_row = $db->query($sql)->fetchAll();
    if (empty($_row[0])) {
        $xtpl->assign('ERROR', $lang_module['login_fail']);
        $xtpl->parse('main.error');
    } else {
        // login thanh cong
        // luu thong tin dang nhap va thoi gian vao session
        if (session_id() == '') {
            session_start();
        }
        
        $getTeacherDataQuery = "SELECT gv.ma_giao_vien ,gv.ho_ten, tr.ten_truong, tk.vai_tro, tr.ma_truong FROM " .
                                NV_PREFIXLANG . '_' . $module_data . "_taikhoan tk, " . NV_PREFIXLANG . "_" . $module_data . "_giaovien gv, " . NV_PREFIXLANG . "_" . $module_data . "_truong tr " .
                                "WHERE tk.ma_giao_vien = gv.ma_giao_vien AND gv.ma_truong = tr.ma_truong AND tk.ten_dang_nhap = '" . $input_username . "' ";
        $_teacherData = $db->query($getTeacherDataQuery)->fetchAll();

        $_SESSION['id'] = $_row[0]['id'].'';
        $_SESSION['ten_dang_nhap'] = $_row[0]['ten_dang_nhap'].'';
        $_SESSION['ma_giao_vien'] = $_teacherData[0]['ma_giao_vien'];
        $_SESSION['ma_truong'] = $_teacherData[0]['ma_truong'];
        $_SESSION['vai_tro'] = $_teacherData[0]['vai_tro'];
        $_SESSION['thoi_gian'] = '' . date("H:i d/m/Y");

        // chuyen huong sang trang giao vien
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&amp;' . NV_OP_VARIABLE . '=teacher');
    }
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
