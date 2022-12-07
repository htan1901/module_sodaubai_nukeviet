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
$xtpl->assign( 'LANG', $lang_module );


// bat lenh chuyen trang
if($nv_Request->isset_request('lop', 'get')) {
    nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&amp;' . NV_OP_VARIABLE . '=class&' . 'lop=' . $nv_Request->get_title('lop', 'get') . '&ma_lop=' . $nv_Request->get_title('ma_lop', 'get'));
}

// lay username tu session
$username = $_SESSION['ten_dang_nhap'];

// lay du lieu cua giao vien
$getSchoolNameQuery = "SELECT ten_truong FROM " .
                        NV_PREFIXLANG . '_' . $module_data . "_truong " .
                        "WHERE ma_truong = '" . $_SESSION['ma_truong'] . "' ";
$_schoolName = $db->query($getSchoolNameQuery)->fetchAll();

$getTeacherNameQuery = "SELECT ho_ten FROM " .
                    NV_PREFIXLANG . '_' . $module_data . "_giaovien " .
                    "WHERE ma_giao_vien = '" . $_SESSION['ma_giao_vien'] . "' ";
$_teacherName = $db->query($getTeacherNameQuery)->fetchAll();

// gan gia tri vao teacher.tpl
$xtpl->assign('HOTEN', ' ' . $_teacherName[0]['ho_ten']);
$xtpl->assign('VAITRO', ' ' . ($_SESSION['vai_tro'] == '0'? 'Giáo vụ':"Giáo viên"));
$xtpl->assign('TRUONG', ' ' . $_schoolName[0]['ten_truong']);
$xtpl->assign('PHIEN', ' ' . $_SESSION['thoi_gian']);

// lay lop chu nhiem
$getMainClassQuery = "SELECT * FROM " . NV_PREFIXLANG . '_' . $module_data . "_lop WHERE ma_gvcn = '" . $_SESSION['ma_giao_vien'] . "'";
$_mainClassData = $db->query($getMainClassQuery)->fetchAll();

$_emptyPage = true;

// hien thi lop chu nhiem, neu co
if (!empty($_mainClassData[0])) {
    $xtpl->assign('MA_LOP', $_mainClassData[0]['ma_lop']);
    $xtpl->assign('TEN_LCN', $_mainClassData[0]['ten_lop']);
    $_class_link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&amp;' . NV_OP_VARIABLE . '=class&';
    $xtpl->parse('main.main_class');
    $_emptyPage = false;
}

// lay danh sach lop giang day
$getTeachingClassQuery = "SELECT l.ma_lop, l.ten_lop, l.nam_hoc FROM " . NV_PREFIXLANG . '_' . $module_data . "_kehoachbaiday k, " . NV_PREFIXLANG . '_' . $module_data . '_lop l ' . "WHERE k.ma_lop = l.ma_lop AND ma_giao_vien = '" . $_SESSION['ma_giao_vien'] . "'"; 
$_teachingClassData = $db->query($getTeachingClassQuery)->fetchAll();

if (!empty($_teachingClassData)) {
    foreach($_teachingClassData as $_eachrow) {
        $xtpl->assign("teaching_row", $_eachrow);
        $xtpl->parse('main.teaching_class.teaching_loop');
    }
    $xtpl->parse('main.teaching_class');
    $_emptyPage = false;
}

// lay tat ca lop thuoc truong
$getAllClassInSchool = "SELECT * FROM " . 
                        NV_PREFIXLANG . '_' . $module_data . "_lop l, " . NV_PREFIXLANG . '_' . $module_data . "_giaovien g "
                        . "WHERE g.ma_giao_vien = l.ma_gvcn AND g.ma_truong = '" . $_SESSION['ma_truong'] . "'" ;
$_allClassData = $db->query($getAllClassInSchool)->fetchAll();

// hien thi danh sach lop quan ly neu la giao vu
if($_SESSION['vai_tro'] == '0') {
    foreach($_allClassData as $_eachrow) {
        $xtpl->assign("manage_row", $_eachrow);
        $xtpl->parse('main.manage_class.manage_loop');
    }
    $xtpl->parse('main.manage_class');
    $_emptyPage = false;
}

if($_emptyPage) {
    $xtpl->parse('main.empty');
}

//Chuyển qua khối main
$xtpl->parse( 'main' );
$ifram = $nv_Request->get_int( 'ifram', 'get', 0 );
$contents = $xtpl->text( 'main' );
//Khởi tạo giao diện
include NV_ROOTDIR . '/includes/header.php';
if( $ifram )
{
    echo nv_site_theme( $contents, 0 );
}
else
{
    echo nv_site_theme( $contents );
}
include NV_ROOTDIR . '/includes/footer.php';