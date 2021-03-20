CREATE TYPE author_role AS ENUM ('admin', 'user');

CREATE TABLE authors (
	id SERIAL,
	created_on TIMESTAMPTZ DEFAULT NOW(),
	username TEXT NOT NULL UNIQUE,
	password TEXT NOT NULL,
	role author_role NOT NULL DEFAULT 'user',
	PRIMARY KEY (id) 
);

CREATE TABLE articles (
	id SERIAL,
	created_on TIMESTAMPTZ DEFAULT NOW(),
	aid TEXT NOT NULL UNIQUE,
	title TEXT NOT NULL UNIQUE,
	author INTEGER NOT NULL,
	stub TEXT,
	content TEXT,
	PRIMARY KEY (id),
	FOREIGN KEY (author) REFERENCES authors (id) 
);

CREATE TABLE logs(
	id SERIAL, 
	created_on TIMESTAMPTZ DEFAULT NOW(),
	logTime TEXT NOT NULL ,
	ip TEXT NOT NULL,
	logAction TEXT NOT NULL,
	logDescribtion TEXT NOT NULL,
	PRIMARY KEY (id)
);
