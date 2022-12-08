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

$yearFilter = "";
$weekFilter = -1;


// kiem tra request loc
if ($nv_Request->isset_request("filter", 'post')) {
    $yearFilter = $nv_Request->get_title('year', 'post', "");
    $weekFilter = $nv_Request->get_int('week', 'post', -1);
}

// kiem tra request xoa 
if ($nv_Request->isset_request("remove", 'post')) {
    $maMonHoc = $nv_Request->get_title('ma_mon_hoc', 'post');
    $ngayDay = $nv_Request->get_title('ngay_day', 'post');

    $deleteMonHocQuery = "DELETE FROM " . NV_PREFIXLANG . '_' . $module_data . '_kehoachbaiday ' . 
                        "WHERE ma_lop = :malop AND ma_mon_hoc = :mamonhoc AND ngay_day = :ngayday";
    $deleteStatement = $db->prepare($deleteMonHocQuery);
    $deleteStatement->bindParam(':malop', $_classId);
    $deleteStatement->bindParam(':mamonhoc', $maMonHoc);
    $deleteStatement->bindParam(':ngayday', $ngayDay);
    $deleteStatement->execute();
    $deleteStatement->closeCursor();
}

// kiem tra request thay doi noi dung
if ($nv_Request->isset_request("save", 'post')) {
    $maMonHoc = $nv_Request->get_title('ma_mon_hoc', 'post');
    $baiHoc = $nv_Request->get_title('baihoc', 'post');
    $nhanXet = $nv_Request->get_title('nhanxet', 'post');
    $xepLoai = $nv_Request->get_int('xeploai', 'post');
    $ngayDay = $nv_Request->get_title('ngay_day', 'post');
    $trangThai = $nv_Request->get_title('trang_thai', 'post');
    
    $canEdit = 0;
    if($trangThai == 'on') {
        $canEdit = 1;
    }
    else {
        $canEdit = 0;
    }

    $updateMonHocQuery = "UPDATE " . NV_PREFIXLANG . '_' . $module_data . '_kehoachbaiday ' . 
                        "SET bai_hoc = :baihoc, nhan_xet = :nhanxet, xep_loai = :xeploai, trang_thai = :trangthai " . 
                        "WHERE ma_lop = :malop AND ma_mon_hoc = :mamonhoc AND ngay_day = :ngayday";
    
    $updateStatement = $db->prepare($updateMonHocQuery);
    $updateStatement->bindParam(':baihoc', $baiHoc);
    $updateStatement->bindParam(':nhanxet', $nhanXet);
    $updateStatement->bindParam(':xeploai', $xepLoai);
    $updateStatement->bindParam(':trangthai', $canEdit);
    $updateStatement->bindParam(':malop', $_classId);
    $updateStatement->bindParam(':mamonhoc', $maMonHoc);
    $updateStatement->bindParam(':ngayday', $ngayDay);
    $updateStatement->execute();
    $updateStatement->closeCursor();
}

// gan du lieu vao cac filter combo box
$getAllYearQuery = "SELECT DISTINCT nam_hoc FROM " . NV_PREFIXLANG . '_' . $module_data . "_lop ";
$allYear = $db->query($getAllYearQuery)->fetchAll();

foreach ($allYear as $row) {
    $xtpl->assign("year", $row);
    $xtpl->parse("main.functions.filter.year_filter");
}

$getAllWeekQuery = "SELECT DISTINCT tuan  FROM " . NV_PREFIXLANG . '_' . $module_data . "_kehoachbaiday ";
$allWeek = $db->query($getAllWeekQuery)->fetchAll();

foreach ($allWeek as $row) {
    $xtpl->assign("week", $row);
    $xtpl->assign("from_date", );
    $xtpl->assign("to_date", );
    $xtpl->parse("main.functions.filter.week_filter");
}

$xtpl->parse("main.functions.filter");
$xtpl->parse("main.functions");

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
                        "WHERE k.ma_mon_hoc = m.ma_mon_hoc AND l.ma_lop = k.ma_lop AND k.ma_giao_vien = g.ma_giao_vien AND k.ma_lop = '" . $_classId . "' ";

if ($yearFilter != "") {
    $startYear = substr($yearFilter, 0, 4);
    $endYear = substr($yearFilter, 7, 4);
    $getAllSubjectsByClassQuery .= "AND ((month(k.ngay_day) >= 8 AND year(k.ngay_day) = " . $startYear . ") OR (month(k.ngay_day) <= 6 AND year(k.ngay_day) = ".  $endYear . ")) ";
}

if ($weekFilter != -1) {
    $getAllSubjectsByClassQuery .= "AND k.tuan = " . $weekFilter . " ";
}
                        
$getAllSubjectsByClassQuery .= "ORDER BY k.ngay_day, k.tiet_bat_dau ASC";

$_listSubjectsByClass = $db->query($getAllSubjectsByClassQuery)->fetchAll();

$num = 0;

if (!empty($_listSubjectsByClass)) {
    foreach ($_listSubjectsByClass as $row) {
        $xtpl->assign("subject", $row);
        
        $date = $row['ngay_day'];
        $dayOfWeek = GetDayOfWeek($date);
        $xtpl->assign("day_of_week", $dayOfWeek);
        $xtpl->assign("num", $num);
        $xtpl->assign("check", $row['trang_thai']=='1'?"checked":"");
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

function GetDayOfWeek($date) {
    $dowNumber = date('w', strtotime($date));
    switch ($dowNumber) {
        case 0:
            return "Chủ nhật";
        case 1:
            return "Thứ hai";
        case 2:
            return "Thứ ba";
        case 3:
            return "Thứ tư";
        case 4:
            return "Thứ năm";
        case 5:
            return "Thứ sáu";
        case 6:
            return "Thứ bảy";
    }
}