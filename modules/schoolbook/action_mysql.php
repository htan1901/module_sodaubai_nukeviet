<?php

/**
 * @Project NUKEVIET 4.x
 * @Author 4FT 
 * @Copyright (C) 2022 4FT. All rights reserved
 * @License GNU/GPL version 3 or any later version
 * @Createdate Wed, 12 Dec 2022 07:00:00 GMT+7
 */
if (!defined('NV_IS_FILE_MODULES')) {
    exit('Stop!!!');
}

$sql_drop_module = [];

$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_monhoc';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_truong';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_giaovien';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_lop';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_kehoachbaiday';
$sql_drop_module[] = 'DROP TABLE IF EXISTS ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_taikhoan';

$sql_create_module = $sql_drop_module;

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_monhoc (
  ma_mon_hoc char(5),
  ten_mon_hoc varchar(50) NOT NULL,
  PRIMARY KEY (ma_mon_hoc)
) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_truong (
  ma_truong char(8) NOT NULL,
  ten_truong varchar(500) NOT NULL,
  PRIMARY KEY (ma_truong)
) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_giaovien (
  ma_giao_vien varchar(10) NOT NULL,
  ho_ten varchar(100) NOT NULL,
  sdt char(10) NOT NULL,
  ma_truong char(8) NOT NULL,
  FOREIGN KEY (ma_truong) REFERENCES " . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_truong(ma_truong),
  PRIMARY KEY (ma_giao_vien)
) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_lop (
  ma_lop char(5),
  ten_lop varchar(10) NOT NULL,
  khoi tinyint NOT NULL,
  nam_hoc varchar(20) NOT NULL,
  ma_gvcn varchar(10) NOT NULL,
  FOREIGN KEY (ma_gvcn) REFERENCES " . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_giaovien(ma_giao_vien),
  PRIMARY KEY (ma_lop)
) ENGINE=MyISAM";

$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_kehoachbaiday (
  ma_lop varchar(10) NOT NULL,
  ma_mon_hoc varchar(10) NOT NULL,
  ngay_day date NOT NULL,
  tiet_bat_dau tinyint NOT NULL,
  bai_hoc varchar(200) NOT NULL,
  nhan_xet varchar(200) NOT NULL,
  xep_loai tinyint NOT NULL,
  trang_thai bit NOT NULL,
  ma_giao_vien varchar(10) NOT NULL,
  FOREIGN KEY (ma_lop) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_lop(ma_lop),
  FOREIGN KEY (ma_mon_hoc) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_monhoc(ma_mon_hoc),
  FOREIGN KEY (ma_giao_vien) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_giaovien(ma_giao_vien),
  PRIMARY KEY (ma_lop, ma_mon_hoc, ngay_day)
) ENGINE=MyISAM";
 
$sql_create_module[] = 'CREATE TABLE ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . "_taikhoan (
  id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  ten_dang_nhap varchar(50) NOT NULL,
  mat_khau varchar(100) NOT NULL,
  ma_giao_vien varchar(10) NOT NULL,
  vai_tro tinyint NOT NULL,
  FOREIGN KEY (ma_giao_vien) REFERENCES " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_giaovien(ma_giao_vien),
  PRIMARY KEY (id)
) ENGINE=MyISAM";
