CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

create table message (
	sender varchar(50) not null,
	resiver varchar(50) not null,
	message varchar(200) not null,
	created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);