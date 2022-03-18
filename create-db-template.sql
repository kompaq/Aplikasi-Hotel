CREATE DATABASE ukk_hotel;
use ukk_hotel;
CREATE Table tbl_reception(
  id_reception INT PRIMARY KEY AUTO_INCREMENT,
  nama_reception TEXT,
  username TEXT,
  password TEXT,
  level VARCHAR(20)
);
CREATE Table tbl_type_kamar(
  id_type_kamar INT PRIMARY KEY AUTO_INCREMENT,
  nama_type TEXT,
  gambar TEXT,
  deskripsi TEXT,
  jumlah_kamar INT(5)
);
CREATE Table tbl_kamar(
  id_kamar INT PRIMARY KEY AUTO_INCREMENT,
  id_type_kamar INT(11),
  nomor_kamar VARCHAR(5),
  harga_kamar VARCHAR(20),
  jumlah_kamar INT(5)
);
ALTER Table
  tbl_kamar
ADD
  CONSTRAINT FK_Memilih_nama_type FOREIGN KEY(id_type_kamar) REFERENCES tbl_type_kamar(id_type_kamar) ON DELETE RESTRICT ON UPDATE RESTRICT;
CREATE Table tbl_tamu(
    id_tamu INT PRIMARY KEY AUTO_INCREMENT,
    nik varchar(16),
    nama_tamu TEXT,
    alamat_tamu TEXT,
    nomor_telepon varchar(15),
    username TEXT,
    password TEXT,
    level VARCHAR(20)
  );
CREATE Table tbl_cek_in(
    id_cek_in INT PRIMARY KEY AUTO_INCREMENT,
    id_tamu INT(11),
    id_kamar INT(11),
    id_reception INT(11),
    tgl_cek_in DATE,
    tgl_cek_out DATE,
    lama_menginap VARCHAR(5),
    status VARCHAR(25)
  );
ALTER Table
  tbl_cek_in
ADD
  CONSTRAINT FK_Mencari_Tamu FOREIGN KEY(id_tamu) REFERENCES tbl_tamu(id_tamu) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER Table
  tbl_cek_in
ADD
  CONSTRAINT FK_Mencari_Kamar FOREIGN KEY(id_kamar) REFERENCES tbl_kamar(id_kamar) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER Table
  tbl_cek_in
ADD
  CONSTRAINT FK_Mencari_Reception FOREIGN KEY(id_reception) REFERENCES tbl_reception(id_reception) ON DELETE RESTRICT ON UPDATE RESTRICT;
CREATE Table tbl_cek_out(
    id_cek_out INT PRIMARY KEY AUTO_INCREMENT,
    id_cek_in INT(11),
    id_reception INT(11),
    total_harga VARCHAR(20),
    bayar VARCHAR(20),
    kembali VARCHAR(20),
    status VARCHAR(25)
  );
ALTER Table
  tbl_cek_out
ADD
  CONSTRAINT FK_Mencari_Transaksi_Cek_In FOREIGN KEY(id_cek_in) REFERENCES tbl_cek_in(id_cek_in) ON DELETE RESTRICT ON UPDATE RESTRICT;