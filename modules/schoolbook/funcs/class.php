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

// lay du lieu cua giao vien
$getSchoolNameQuery = "SELECT ten_truong FROM " .
                        NV_PREFIXLANG . '_' . $module_data . "_truong " .
                        "WHERE ma_truong = '" . $_SESSION['ma_truong'] . "' ";
$_schoolName = $db->query($getSchoolNameQuery)->fetchAll();

$getTeacherNameQuery = "SELECT ho_ten FROM " .
                    NV_PREFIXLANG . '_' . $module_data . "_giaovien " .
                    "WHERE ma_giao_vien = '" . $_SESSION['ma_giao_vien'] . "' ";
$_teacherName = $db->query($getTeacherNameQuery)->fetchAll();

// gan gia tri vao teacher section
$xtpl->assign('HOTEN', ' ' . $_teacherName[0]['ho_ten']);
$xtpl->assign('VAITRO', ' ' . ($_SESSION['vai_tro'] == '0'? 'Giáo vụ':"Giáo viên"));
$xtpl->assign('TRUONG', ' ' . $_schoolName[0]['ten_truong']);
$xtpl->assign('PHIEN', ' ' . $_SESSION['thoi_gian']);

$_classId = $_GET['ma_lop'];
$getClassByIdQuery = "SELECT * FROM " . NV_PREFIXLANG . '_' . $module_data . "_lop WHERE ma_lop = '" . $_classId . "'";
$_className = $db->query($getClassByIdQuery)->fetchAll();

$xtpl->assign("LOP", $_className[0]['ten_lop']);

$getMainTeacherQuery = "SELECT * FROM " . NV_PREFIXLANG . '_' . $module_data . "_lop l, " . NV_PREFIXLANG . '_' . $module_data . '_giaovien g ' .
                        "WHERE l.ma_gvcn = g.ma_giao_vien AND l.ma_lop = '" . $_classId . "' ";
$_mainTeacher = $db->query($getMainTeacherQuery)->fetchAll();

$xtpl->assign("TEN_GVCN", $_mainTeacher[0]['ho_ten']);

// lay tat ca cac mon hoc thuoc lop
$getAllSubjectsByClassQuery = "SELECT * FROM " . 
                        NV_PREFIXLANG . '_' . $module_data . "_kehoachbaiday k, " . NV_PREFIXLANG . '_' . $module_data . '_monhoc m, ' . NV_PREFIXLANG . '_' . $module_data . '_lop l, ' . NV_PREFIXLANG . '_' . $module_data . '_giaovien g '.
                        " WHERE k.ma_mon_hoc = m.ma_mon_hoc AND l.ma_lop = k.ma_lop AND k.ma_giao_vien = g.ma_giao_vien AND k.ma_lop = '" . $_classId . "' ";

$_listSubjectsByClass = $db->query($getAllSubjectsByClassQuery)->fetchAll();

$num = 0;
if (!empty($_listSubjectsByClass)) {
    foreach ($_listSubjectsByClass as $row) {
        $xtpl->assign("subject", $row);
        $xtpl->assign("num", $num);
        // die($row);
        $xtpl->assign("check", $row['trang_thai']=='0'?"checked":"");
        $xtpl->assign("hidden", $_SESSION['vai_tro'] == '1'? "hidden":"");
        $xtpl->parse('main.schedule.subject_loop');
        $num++;
    }
    $xtpl->parse('main.schedule');
}

//Chuyển qua khối main
$xtpl->parse('main.script');
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
