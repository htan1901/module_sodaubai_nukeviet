<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}/themes/default/css/schoolbook_teacher.css">
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
			</tr>
			<!-- BEGIN: subject_loop-->
			
			<!-- END: subject_loop-->
		</table>
	</div>
</div>
<style>
	.textarea_baihoc,
	.textarea_nhanxet,
	.number_xeploai,
	.input_ngayday {
		resize: none;
		background-color: transparent;
		border: none;
	}

	.input_ngayday {
		width: 80%;
	}

	.span_button,
	button {
		display: inline-block;
		margin: 0 5px 0 5px;
		padding: 0;
		width: 25px;
		height: 25px;
		cursor: pointer;
		background-color: transparent;
		border: none;
	}

	span:hover,
	button:hover {
		opacity: 0.5;
	}
</style>
<!-- END: schedule-->

	
		

	<!-- BEGIN: empty-->
	<div>
		<p style="text-align: center; margin: 20px 0 20px 0; font-size: large;">
			{LANG.empty_responsible_title}
		</p>
	</div>
	<!-- END: empty-->
	<style>

	</style>
</div>
<!-- END: main -->