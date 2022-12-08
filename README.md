# Module sổ đầu bài
Với sự bùng nổ về công nghệ thông tin, các công tác quản lý cũng từ đó được số hóa nhằm gia tăng hiệu suất quản lý. Vì vậy Công ty cổ phần phát triển Mã nguồn mở Việt Nam (VINADES.JCS) cùng với cộng đồng mã nguồn mở NukeViet đã xây dựng module phần mềm quản lý sổ đầu bài, có phân quyền và hướng dẫn sử dụng.

## Thành viên thực hiện
**Tên trường:** Trường Đại học công nghệ TP.HCM

**Thành viên thực hiện đề tài:**
- Nguyễn Xuân Nhân
- Danh Hoàng Tân
- Than Trấn Nghiệp

## Chi tiết ý tưởng
- Sử dụng các phần mềm Docker, NukeViet CMS, OpenLiteSpeed (hoặc Nginx, Apache), MariaDB, PHP để build môi trường phát triển.
- Thiết lập một số thông tin: Tên sở, phòng, trường dùng trong việc xuất file sổ đầu bài.
- Quản lý phân phối chương trình: Năm học, khối, môn, tiết, tên bài học. Nhập PPCT trừ file excel.
- Quản lý tuần: Tên tuần, mô tả, thời gian từ ngày đến ngày, năm học, trạng thái: Mở/ khóa. Khi khóa thì giáo viên không được sửa, nhập sổ đầu bài. Có chức năng chép sang tuần trước, chép sang tuần sau có giữ thời khóa biểu hay không (mục đích tiện lợi trong khâu quản lý).
- Quản lý môn học: Tên môn, thứ tự.
- Quản lý lớp học: Tên lớp, thứ tự, giáo viên chủ nhiệm (chọn trong danh sách thành viên).
- Quản lý sổ đầu bài: Chọn năm, tuần, lớp, buổi => Hiển thị sổ đầu bài. Giáo viên nhập, sửa, xóa tùy quyền. Có chức năng xuất sổ đầu bài ra file (excel, pdf hoặc word) để in.

## Môi trường phát triển
- Docker
    - Apache httpd
    - PHP
    - MySQL
    - phpmyadmin
- NukeVietCMS
- Git/Github

## Thiết lập môi trường phát triển
Đầu tiên ta `clone` project về

```sh
$ git clone https://github.com/htan1901/module_sodaubai_nukeviet.git
```

Build image từ Dockerfile

```sh
$ docker build -t olp/env .
```

Pull image từ Docker Hub

```sh
 $ docker pull olp/env
```

Sử dụng lệnh `docker run` to tiến hành chạy container, sử dụng tham số `-v` để mount trên thư mục của bạn, tham số `-p` có thể forward port `80` (HTTP) , `443` (HTTPS) và `3306` (MariaDB/MySQL) .

Đường dẫn `/opt/lampp/htdocs` là đường dẫn chứa source code của trang web, mount nó để có thể chỉnh sửa website

```sh
$ docker run -d -v {đường dẫn chứa source code trang web của bạn}:/opt/lampp/htdocs -p 80:80 -p 443:443 -p 3306:3306 olp/env
```

Truy cập `localhost/{tên folder chứa nuke viet}` để có thể cài đặt NuekViet. **Lưu ý:** thư mục NukeViet được
đặt trong `{đường dẫn chứa source code trang web của bạn}` đã được khai báo trên lệnh `docker run`

Truy cập phpmyadmin bằng địa chỉ `localhostphpmyadmin/`

# Hướng dẫn sử dụng

Xem hướng dẫn sử dụng tại [Hướng dẫn sử dụng](https://github.com/htan1901/module_sodaubai_nukeviet/wiki)

# LICENSE

See [LICENSE](LICENSE) file for more information.
