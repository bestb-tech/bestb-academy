CREATE DATABASE WEBQUANLYDUAN;
USE WEBQUANLYDUAN;

CREATE TABLE TAIKHOAN(
	Id int not null auto_increment primary key,
    TenTK nvarchar(50) not null,
    MatKhau nvarchar(30) not null,
    Ten nvarchar(50) not null,
    DiaChi text not null,
    SoDienThoai varchar(15) not null,
    Check_admin bit,   
	NgayTao datetime
)

-- insert TAIKHOAN
INSERT INTO TAIKHOAN(TenTK,MatKhau,Ten,DiaChi,SoDienThoai,Check_admin,NgayTao) values('haidz','12345','Van Hai','Son Dong- Bac Giang','0516164484',0,'26/10/2020')
INSERT INTO TAIKHOAN(TenTK,MatKhau,Ten,DiaChi,SoDienThoai,Check_admin,NgayTao) values('duongpk','12345','Hai Duong','Dai Tu- Thai Nguyen','0453445678',0,'26/10/2020')
INSERT INTO TAIKHOAN(TenTK,MatKhau,Ten,DiaChi,SoDienThoai,Check_admin,NgayTao) values('dungml','12345','Viet Dung','Ha Dong','0534534537',1,'26/10/2020')


drop table DanhMuc;
drop table SANPHAM;
drop table GIOHANG;


CREATE TABLE DANHMUC(
	Id int not null primary key,
    Ten nvarchar(20) not null
)

-- insert DANHMUC
INSERT INTO DANHMUC(Id,Ten) values(1,'Do gia dung')
INSERT INTO DANHMUC(Id,Ten) values(2,'Thuc pham')


CREATE TABLE SANPHAM(
	Id int not null  auto_increment primary key,
    DanhMuc_id int not null,
    Mau nvarchar(20) null,
    TenSP nvarchar(50) not null,
    MieuTa text not null,
    Gia decimal  not null,
    SoLuongTrongKho int not null,
	HanSuDung datetime,
	NgayThem datetime,
    Constraint DanhMuc_id_pk foreign key (DanhMuc_id) references DanhMuc(Id)
)

-- insert SANPHAM
INSERT INTO SANPHAM(DanhMuc_id, Mau,TenSP,MieuTa,Gia,SoLuongTrongKho,HanSuDung,NgayThem) values(1,'Xanh','Quạt','Quat NiTong thương hiệu nhật bản',120000,12,'26/10/2021','26/10/2020')
INSERT INTO SANPHAM(DanhMuc_id, Mau,TenSP,MieuTa,Gia,SoLuongTrongKho,HanSuDung,NgayThem) values(2,'Xanh','Mực Khô','Mực khô nguyên con',100000,30,'26/10/2021','26/10/2020')
INSERT INTO SANPHAM(DanhMuc_id, Mau,TenSP,MieuTa,Gia,SoLuongTrongKho,HanSuDung,NgayThem) values(1,'Đỏ','Vượt muỗi','Vượt muỗi thương hiệu SunHouse , Vượt là chết',90000,18,'26/10/2021','26/10/2020')


CREATE TABLE GIOHANG(
	Id int not null  auto_increment primary key,
    SanPham_id int not null,
	NguoiMua_id int not null,
    SoLuongSanPhamMua int not null,
    ThanhToan nvarchar(255) default null,
    NgayMuaHang datetime default null,
    TongGiaSanPham decimal default null,
	TrangThai narchar(100),
    Constraint SanPham_id_pk foreign key (SanPham_id) references SANPHAM(Id),
	Constraint TaiKhoan_id_pk foreign key (NguoiMua_id) references TAIKHOAN(Id)
)

-- insert GIOHANG
INSERT INTO GIOHANG(SanPham_id,NguoiMua_id,SoLuongSanPhamMua,TenSP,ThanhToan,NgayMuaHang,TongGiaSanPham,TrangThai) values(1,2,2,'Quạt','Thanh toán khi nhận hàng','2020-12-12',240000)
INSERT INTO GIOHANG(SanPham_id,NguoiMua_id,SoLuongSanPhamMua,TenSP,ThanhToan,NgayMuaHang,TongGiaSanPham,TrangThai) values(1,1,1,'Quạt','Thanh toán khi nhận hàng','2020-12-12',120000)
INSERT INTO GIOHANG(SanPham_id,NguoiMua_id,SoLuongSanPhamMua,TenSP,ThanhToan,NgayMuaHang,TongGiaSanPham,TrangThai) values(2,2,12,'Mực khô','Thanh toán khi nhận hàng','2020-12-1',1200000)