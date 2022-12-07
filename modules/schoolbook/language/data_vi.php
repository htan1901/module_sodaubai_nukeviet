<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 4FT 
 * @Copyright (C) 2022 4FT. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 12 Dec 2022 07:00:00 GMT+7
 */

if (! defined('NV_ADMIN')) {
    die('Stop!!!');
}

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_monhoc (ma_mon_hoc, ten_mon_hoc) VALUES
	('MH001', 'Vật lý'),
	('MH002', 'Toán học'),
	('MH003', 'Hóa học'),
	('MH004', 'Lịch sử'),
	('MH005', 'Thể dục'),
	('MH006', 'Tiếng Anh'),
	('MH007', 'Tin học'),
	('MH008', 'Địa lý'),
	('MH009', 'Giáo dục công dân'),
	('MH012', 'Ngữ văn');
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_truong (ma_truong, ten_truong) VALUES
	('TR001', 'Trường trung học phổ thông Võ Thị Sáu');
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_giaovien (ma_giao_vien, ho_ten, sdt, ma_truong) VALUES
	('GV001', 'Trần Lê Huỳnh Tú', '0369966969', 'TR001'),
	('GV002', 'Trần Lê Tài', '0389988998', 'TR001'),
	('GV003', 'Nguyễn Đình Trung', '0456789012', 'TR001'),
	('GV004', 'Phan Đình Tùng', '0123456789', 'TR001'),
	('GV005', 'Lê Ô Nát Đô', '0456789012', 'TR001'),
	('GV006', 'Đờ Vanh Xi', '0123456789', 'TR001'),
	('GV007', 'Đây Vít', '0123456789', 'TR001'),
	('GV008', 'Đờ Ghia', '0456789012', 'TR001'),
	('GV009', 'Lê Ô Neo', '0123456789', 'TR001'),
	('GV010', 'Mẹc Xi', '0456789012', 'TR001');
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_lop (ma_lop, ten_lop, khoi, nam_hoc, ma_gvcn) VALUES
	('L001', '10A1', 10, '2022 - 2023', 'GV001'),
	('L002', '11A1', 11, '2022 - 2023', 'GV007'),
	('L003', '12A2', 12, '2022 - 2023', 'GV004'),
	('L004', '10A1', 10, '2021 - 2022', 'GV005'),
	('L005', '11A1', 11, '2021 - 2022', 'GV002'),
	('L006', '12A1', 12, '2021 - 2022', 'GV008');
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_kehoachbaiday (ma_lop, ma_mon_hoc, ngay_day, tiet_bat_dau, bai_hoc, nhan_xet, xep_loai, trang_thai, ma_giao_vien) VALUES
	('L001', 'MH001', '2022-11-12', 1, 'Bài 1', 'Lớp học tốt', 9, 0, 'GV001'),
	('L001', 'MH002', '2022-11-12', 2, 'Bài 2', 'Lớp học tốt nhưng tệ', 6, 1, 'GV003'),
	('L001', 'MH003', '2022-11-12', 3, 'Bài 6', 'Lớp không học, quậy', 3, 0, 'GV004'),
	('L001', 'MH004', '2022-11-12', 4, 'Bài 4', 'Lớp học ổn', 8, 1, 'GV005'),
	('L001', 'MH001', '2022-11-20', 1, 'Bài 2', 'Lớp học tốt', 9, 1, 'GV005'),
	('L001', 'MH002', '2022-11-20', 2, 'Bài 3', 'Lớp học tốt nhưng tệ', 6, 1, 'GV003'),
	('L001', 'MH003', '2022-11-20', 3, 'Bài 7', 'Lớp không học, quậy', 3, 0, 'GV004'),
	('L001', 'MH004', '2022-11-20', 4, 'Bài 5', 'Lớp học ổn', 8, 1, 'GV005');
");

$db->query("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_taikhoan (ten_dang_nhap, mat_khau, ma_giao_vien, vai_tro) VALUES
	('tutlh', 'tutlh', 'GV001', 0),
	('taitl', 'taitl', 'GV002', 0),
	('trungnd', 'trungnd', 'GV003', 1),
	('tungpd', 'tungpd', 'GV004', 1),
	('dolon', 'dolon', 'GV005', 1),
	('xidv', 'xidv', 'GV006', 1),
	('vitd', 'vitd', 'GV007', 1),
	('ghiad', 'ghiad', 'GV008', 1),
	('neolo', 'neolo', 'GV009', 1),
	('xim', 'xim', 'GV010', 1);
");
