<!-- BEGIN: main  -->
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
    <!-- BEGIN: functions -->
    <div class="functions-section">
		<!-- BEGIN: filter -->
		<form action="{URL_ACTION}" method="post" class="filter-section" 
		style="width: 60%;
					height: 100%;
					display: inline;
					float: left;">
					
			<select name="year">
				<option value="" selected disabled> Chọn năm học</option>
				<!-- BEGIN: year_filter -->
				<option value="{year.nam_hoc}">{year.nam_hoc}</option>
				<!-- END: year_filter -->
			</select>

			<select name="week">
				<option value="" selected disabled> Chọn tuần</option>
				<!-- BEGIN: week_filter -->
				<option value="{week.tuan}"> {week.tuan} </option>
				<!-- END: week_filter -->
			</select>

			<input type="submit" name="filter">
		</form>
		<!-- END: filter -->

		<form action="get" class="export-to-file" style="width: 30%;
								height: 100%;
								display: inline;
								float: left;">
						<button>
				<img src="{NV_BASE_SITEURL}themes/default/images/icons/icons8-microsoft-excel-2019-48.png" alt="export-to-excel"
					style="width: 30px;">
			</button>
			Xuất Excel
		</form>
	</div>
    <!-- END: functions -->
</div>
<!-- END: main -->