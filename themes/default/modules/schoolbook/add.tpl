<!-- BEGIN: main -->
<form action="{URL_ACTION}" method="post" 
    style="display: flex; flex-direction: column; align-items: center; justify-content: center;">

    <p>
        <label for="ngay_day">Ngày dạy: </label>
        <input type="date" name="ngay_day" placeholder="Ngày dạy">
    </p>
    <p>
        <label for="tiet">Tiết: </label>
        <input type="number" min="1" max="10" name="tiet" placeholder="Tiết">
    </p>
    <p>
        <label for="mon">Môn: </label>
        <input type="text" name="mon" placeholder="Môn">
    </p>
    <p>
        <input name="add_tkb" type="submit" value="Thêm">
        <input name="cancel_tkb" type="submit" value="Hủy">
    </p>

</form>

<style>
    input {
        margin: 10px 0;
    }
</style>
<!-- END: main -->