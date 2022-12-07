<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}/themes/default/css/schoolbook_teacher.css">
<div class="table-responsive" style="margin-bottom: 10%;background-color: azure;">
	<div id="top">

		<table style="width:100%;">
			<tr>
				<td>
					<p> <b>{LANG.full_name}: </b>{HOTEN}</pơ>
				</td>
				<td>
					<p> <b>{LANG.role}: </b>{VAITRO}</p>
				</td>

			</tr>
			<tr>
				<td>
					<a> <b>{LANG.school}: </b>{TRUONG}</a>
				</td>
				<td>
					<a> <b>{LANG.timestamp}: </b>{PHIEN}</a>
				</td>
			</tr>
		</table>

		<p style="text-align: center; font-size: x-large; font-weight: bold; margin: 20px 0 20px 0;">
			{LANG.responsible_title}
		</p>
	</div>

	<div>
		<!-- BEGIN: main_class -->
		<div class="class_block">
			<label>{LANG.main_class}</label><br>
			<div style="margin: 0 10px 0 10px;">
				<form action="{URL_ACTION}" method="get" class="class_form" 
				style="display: inline; margin: 0 10px 0 10px;">
					<input type="hidden" name="ma_lop" value="{MA_LOP}">
					<input type="submit" name="lop" value="{TEN_LCN}" class="button main-class-button">
			</div>
			</form>
		</div>
		<!-- END: main_class -->

		<!-- BEGIN: teaching_class -->
		<div class="class_block">
			<label>{LANG.teaching_class}</label><br>
			<div style="margin: 0 10px 0 10px;">
				<!-- BEGIN: teaching_loop -->
				<form action="{URL_ACTION}" method="get" class="class_form" 
				style="display: inline; margin: 0 10px 0 10px;">
					<input type="hidden" name="ma_lop" value="{teaching_row.ma_lop}">
					<input type="submit" name="lop" value="{teaching_row.ten_lop}" class="button teaching-class-button">
				</form>
				<!-- END: teaching_loop -->
			</div>
		</div>
		<!-- END: teaching_class -->

		<!-- BEGIN: manage_class -->
		<div class="class_block">
			<label>{LANG.manage_class}</label><br>
			<div style="margin: 0 10px 0 10px;">
				<!-- BEGIN: manage_loop -->
				<form action="{URL_ACTION}" method="get" class="class_form" 
				style="display: inline; margin: 0 10px 0 10px;">
					<input type="hidden" name="ma_lop" value="{manage_row.ma_lop}">
					<input type="submit" name="lop" value="{manage_row.ten_lop}" class="button">
				</form>
				<!-- END: manage_loop -->
			</div>
		</div>
		<!-- END: manage_class -->
	</div>

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