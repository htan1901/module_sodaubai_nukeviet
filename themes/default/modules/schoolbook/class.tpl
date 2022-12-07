<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/default/css/schoolbook_class.css">
<div class="table-responsive" style="margin-bottom: 10%;background-color: azure;">
	<div id="top">
		<table style="width: 100%;">
			<tr>
				<td>
					<p> <b>{LANG.full_name}</b>{HOTEN}</p>
				</td>
				<td>
					<p> <b>{LANG.role}</b>{VAITRO}</p>
				</td>
			</tr>

			<tr>
				<td>
					<p> <b>{LANG.school}</b>{TRUONG}</p>
				</td>
				<td>
					<p> <b>{LANG.timestamp}</b>{PHIEN}</p>
				</td>
			</tr>
		</table>
	</div>

	<div style="text-align: center; width: 100%;">
		<p><b>{LANG.class}: </b>{LOP}</p>
		<p><b>{LANG.gvcn}: </b>{TEN_GVCN}</p>
		<br>
	</div>

	<div class="functions-section">
		<form action="get" class="filter-section" style="width: 60%;
					height: 100%;
					display: inline;
					float: left;">
			<select>
				<option value="" selected disabled> Chọn năm học</option>
				<option value=""> Năm x </option>
				<option value=""> Năm y </option>
			</select>

			<select>
				<option value="" selected disabled> Chọn học kỳ</option>
				<option value=""> HK I </option>
				<option value=""> HK II </option>
			</select>

			<select>
				<option value="" selected disabled> Chọn tuần</option>
				<option value=""> Tuan x </option>
				<option value=""> Tuan y </option>
				<option value=""> Tuan z </option>
			</select>

			<input type="submit">
		</form>

		<form action="get" class="export-to-file" style="width: 30%;
								height: 100%;
								display: inline;
								float: left;">
			<!-- <select required="required">
				<option value="Excel" selected disabled> Excel</option>
				<option value="PDF"> PDF </option>
			</select> -->
			<!-- <i> 
				<img src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-edit-32.png" alt="" srcset=""> 
				<input type="submit" name="type" value="Excel">
			</i> -->
			<button>
				<img src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-microsoft-excel-2019-48.png" alt="export-to-excel"
					style="width: 30px;">
			</button>
			Xuất Excel
		</form>
	</div>

	<div style="width: 100%; margin: 10px 0 10px 0;">
		<br>
		<p class="title" style="font-weight: 600; text-align: center;">
			<br><span>Tuần</span>
		</p>
	</div>

	<!-- BEGIN: schedule-->
	<div style="width: 100%">
		<table id="so_dau_bai" style="text-align: center;width: 100%;">
			<tr class="table_row">
				<th class="table_col"> Thứ / Ngày</th>
				<th class="table_col"> Đặc quyền </th>
				<th class="table_col"> Tiết </th>
				<th class="table_col"> Môn học </th>
				<th class="table_col"> Bài học </th>
				<th class="table_col"> Nhận xét</th>
				<th class="table_col"> Đánh giá </th>
				<th class="table_col"> Ký tên </i></th>
				<th class="table_col" {hidden}>{LANG.status}</th>
			</tr>
			<!-- BEGIN: subject_loop-->
			<tr class="table_row">
				<td hidden>
					<span class="row_id">{subject.ma_mon_hoc}</span>
				</td>
				<td class="table_col">Thứ.../{subject.ngay_day}</td>
				<td class="table_col">
					<button title="edit" class="button_save" onclick="save({num})" hidden><img
							src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-save-48.png" alt=""
							style="width: 100%; height: 100%;">
					</button>
					<button title="cancel" class="button_cancel" onclick="cancel({num})" hidden><img
							src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-cancel-48.png" alt=""
							style="width: 100%; height: 100%;">
					</button>
					<button title="edit" class="button_edit" onclick="edit({num})"><img
							src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-edit-48.png" alt=""
							style="width: 100%; height: 100%;">
					</button>
					<button title="edit" class="button_remove" onclick=""><img
							src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-remove-48.png" alt=""
							style="width: 100%; height: 100%;">
					</button>
				</td>
				<td class="table_col">{subject.tiet_bat_dau}</td>
				<td class="table_col">{subject.ten_mon_hoc}</td>
				<td class="table_col">
					<textarea readonly class="textarea_baihoc">{subject.bai_hoc}</textarea>
				</td>
				<td class="table_col">
					<textarea readonly class="textarea_nhanxet">{subject.nhan_xet}</textarea>
				</td>
				<td class="table_col">
					<input readonly type="number" min="0" max="10" style="text-align: center" class="number_xeploai"
						value="{subject.xep_loai}">
				</td>
				<td class="table_col">{subject.ho_ten}</td>
				<td class="table_col" {hidden}>
					<input type="checkbox" name="trang_thai" {check} class="input_trangthai">
				</td>
			</tr>
			<!-- END: subject_loop-->
		</table>
	</div>
</div>
<style>
	.textarea_baihoc,
	.textarea_nhanxet,
	.number_xeploai {
		resize: none;
		background-color: transparent;
		border: none;
	}

	button {
		width: 40px;
		height: 30px;
		cursor: pointer;
		background-color: transparent;
		border: none;
	}

	button:hover {
		opacity: 0.5;
	}
</style>
<!-- END: schedule-->
<!-- BEGIN: script -->
<script>
	var editButtons = document.getElementsByClassName('button_edit');
	var cancelButtons = document.getElementsByClassName('button_cancel');
	var saveButtons = document.getElementsByClassName('button_save');
	var removeButtons = document.getElementsByClassName('button_remove');
	var textAreaBaiHocs = document.getElementsByClassName('textarea_baihoc');
	var rowIDs = document.getElementsByClassName('row_id');
	var textAreaNhanXets = document.getElementsByClassName('textarea_nhanxet');
	var numberXepLoais = document.getElementsByClassName('number_xeploai');
	var inputTrangThais = document.getElementsByClassName('input_trangthai');

	function edit(index) {

		// kiem tra xem row co duoc phep sua hay khong
		if (!inputTrangThais[index].checked) {
			window.alert("Bạn không có quyền sửa nội dung dòng này!");
			return;
		}

		changeToEditState(index);
	}

	function save(index) {
		if(numberXepLoais[index].value == "") {
			window.alert("Điểm số rỗng!");
			return;
		}

		const url = "{URL_ACTION}";
		const data = {
			"ma_mon_hoc": rowIDs[index].innerHTML,
			"bai_hoc": textAreaBaiHocs[index].innerHTML,
			"nhan_xet": textAreaNhanXets[index].innerHTML,
			"xep_loai": numberXepLoais[index].value,
		};

		$.post(url, data, function(){
			console.log(data);
		});
	}

	function cancel(index) {
		if (confirm("Bạn muốn hủy thay đổi!")) {
			changeToNormalState(index);
			return;
		}
	}

	function changeToNormalState(index) {
		// cho phep sua cac truong duoc sua
		textAreaBaiHocs[index].readOnly = true;
		textAreaNhanXets[index].readOnly = true;
		numberXepLoais[index].readOnly = true;

		// thay doi css cho de nhin
		textAreaBaiHocs[index].style.backgroundColor = 'transparent';
		textAreaBaiHocs[index].style.border = 'none';

		textAreaNhanXets[index].style.backgroundColor = 'transparent';
		textAreaNhanXets[index].style.border = 'none';

		numberXepLoais[index].style.backgroundColor = 'transparent';
		numberXepLoais[index].style.border = 'none';

		// hien thi nut huy va luu
		cancelButtons[index].hidden = true;
		saveButtons[index].hidden = true;
		editButtons[index].hidden = false;
		removeButtons[index].hidden = false;
	}

	function changeToEditState(index) {
		// cho phep sua cac truong duoc sua
		textAreaBaiHocs[index].readOnly = false;
		textAreaNhanXets[index].readOnly = false;
		numberXepLoais[index].readOnly = false;

		textAreaBaiHocs[index].focus();

		// thay doi css cho de nhin
		textAreaBaiHocs[index].style.backgroundColor = '#fff';
		textAreaBaiHocs[index].style.border = '2px solid #ccc';
		textAreaBaiHocs[index].style.borderRadius = '4px';

		textAreaNhanXets[index].style.backgroundColor = '#fff';
		textAreaNhanXets[index].style.border = '2px solid #ccc';
		textAreaNhanXets[index].style.borderRadius = '4px';

		numberXepLoais[index].style.backgroundColor = '#fff';
		numberXepLoais[index].style.border = '2px solid #ccc';
		numberXepLoais[index].style.borderRadius = '4px';

		// hien thi nut huy va luu
		cancelButtons[index].hidden = false;
		saveButtons[index].hidden = false;
		editButtons[index].hidden = true
		removeButtons[index].hidden = true;
	}
</script>
<!-- END: script -->
</div>
<!-- END: main -->