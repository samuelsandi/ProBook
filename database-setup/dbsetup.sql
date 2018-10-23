
CREATE TABLE buku (
		id_buku INT(6) AUTO_INCREMENT PRIMARY KEY,
		judul varchar(50) NOT NULL,
		penulis varchar(50) NOT NULL,
		rating decimal,
		vote int(6) NOT NULL DEFAULT 0,
		cover varbinary
);

CREATE TABLE user (
		username varchar(20) PRIMARY KEY,
		nama_depan varchar(20) NOT NULL,
		nama_belakang varchar(20),
		email varchar(50) NOT NULL,
		/* dan lainya */
);

INSERT INTO buku (judul, penulis, cover)
VALUE ('database system concepts', 'Silberschatz', LOAD_FILE('book1.jpeg'));