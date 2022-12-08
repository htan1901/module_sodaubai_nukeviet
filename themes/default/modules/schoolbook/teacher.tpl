<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}/themes/default/css/schoolbook_teacher.css">
<div class="table-responsive" style="margin-bottom: 10%;background-color: azure;">
	<div id="top">

		<table style="width:100%;">
			<tr>
				<td>
					<p>
						<span class="bold_description">{LANG.full_name}: </span>{HOTEN}
					</p>
				</td>
				<td>
					<p>
						<span class="bold_description">{LANG.role}: </span>{VAITRO}
					</p>
				</td>

			</tr>
			<tr>
				<td>
					<p> <span class="bold_description">{LANG.school}: </span>{TRUONG}</p>
				</td>
				<td>
					<p> <span class="bold_description">{LANG.timestamp}: </span>{PHIEN}</p>
				</td>
			</tr>
		</table>

		<p class="main_title" style="">
			{LANG.responsible_title}
		</p>
	</div>

	<div>
		<!-- BEGIN: main_class -->
		<div class="class_block">
			<label>{LANG.main_class}</label><br>
			<div style="margin: 0 10px 0 10px;">
				<form action="{URL_ACTION}" method="get" class="class_form">
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
				<form action="{URL_ACTION}" method="get" class="class_form">
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
				<form action="{URL_ACTION}" method="get" class="class_form">
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
		<p class="sub_title">
			{LANG.empty_responsible_title}
		</p>
	</div>
	<!-- END: empty-->
	<style>
		.bold_description {
			font-weight: 650;
		}

		.class_block {
			margin: 20px 0 20px 0;
		}

		.class_form {
			display: inline;
			margin: 0 10px 0 10px;
		}

		.button {
			display: inline-block;
			border-radius: 4px;
			background-color: #4caf9d;
			border: none;
			color: black;
			text-align: center;
			font-size: 17px;
			width: 70px;
			height: 30px;
			transition: all 0.5s;
			cursor: pointer;
			margin: 5px;
			border: 2px solid black;
			color: aliceblue;
		}

		.main-class-button {
			background-color: #f4511e;
		}

		.teaching-class-button {
			background-color: #087E8B;
		}

		.button:hover {
			opacity: 0.5;
		}

		.main_title {
			text-align: center;
			font-size: x-large;
			font-weight: bold;
			margin: 20px 0 20px 0;
		}

		.sub_title {
			text-align: center; 
			margin: 20px 0 20px 0; 
			font-size: large;
		}
	</style>
</div>
<!-- END: main -->