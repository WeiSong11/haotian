-- User: majiang
/*
DROP USER IF EXISTS majiang;

CREATE USER majiang WITH
  LOGIN
  SUPERUSER
  INHERIT
  CREATEDB
  CREATEROLE
  REPLICATION;
*/
-- Database: majiang

DROP DATABASE IF EXISTS majiang;

CREATE DATABASE majiang
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Chinese (Simplified)_China.936'
    LC_CTYPE = 'Chinese (Simplified)_China.936'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;

COMMENT ON DATABASE majiang
    IS 'majiang database';

-- SCHEMA: majiang

DROP SCHEMA IF EXISTS majiang ;

CREATE SCHEMA majiang
    AUTHORIZATION postgres;

COMMENT ON SCHEMA majiang
    IS 'majiang schema';

GRANT ALL ON SCHEMA majiang TO postgres;

-- Table: majiang.admin_groups

DROP TABLE IF EXISTS majiang.admin_groups;

CREATE TABLE majiang.admin_groups
(
    id smallserial PRIMARY KEY,
    name varchar(20) NOT NULL,
    description varchar(100) NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.admin_groups
    OWNER to postgres;

INSERT INTO majiang.admin_groups(name, description) VALUES('webmaster', 'Webmaster');
INSERT INTO majiang.admin_groups(name, description) VALUES('admin', 'Administrator');
INSERT INTO majiang.admin_groups(name, description) VALUES('manager', 'Manager');
INSERT INTO majiang.admin_groups(name, description) VALUES('staff', 'Staff');

-- Table: majiang.admin_login_attempts

DROP TABLE IF EXISTS majiang.admin_login_attempts;

CREATE TABLE majiang.admin_login_attempts
(
    id bigserial PRIMARY KEY,
    ip_address varchar(15) NOT NULL,
    login varchar(100) NOT NULL,
    time integer NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.admin_login_attempts
    OWNER to postgres;

-- Table: majiang.admin_users

DROP TABLE IF EXISTS majiang.admin_users;

CREATE TABLE majiang.admin_users
(
    id smallserial PRIMARY KEY,
    ip_address varchar(15) NOT NULL,
    username varchar(100) NOT NULL,
    password varchar(255) NOT NULL,
    salt varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    activation_code varchar(40) NOT NULL,
    forgotten_password_code varchar(40) NOT NULL,
    forgotten_password_time integer NOT NULL,
    remember_code varchar(40) NOT NULL,
    created_on integer NOT NULL,
    last_login integer NOT NULL,
    active smallint  NOT NULL,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.admin_users
    OWNER to postgres;

INSERT INTO majiang.admin_users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name) VALUES ('127.0.0.1', 'webmaster', '$2y$08$/X5gzWjesYi78GqeAv5tA.dVGBVP7C1e1PzqnYCVe5s1qhlDIPPES', '', '', '', '', 0, '', 1451900190, 1465489592, 1, 'Webmaster', '');
INSERT INTO majiang.admin_users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name) VALUES ('127.0.0.1', 'admin', '$2y$08$7Bkco6JXtC3Hu6g9ngLZDuHsFLvT7cyAxiz1FzxlX5vwccvRT7nKW', '', '', '', '', 0, '', 1451900228, 1465489580, 1, 'Admin', '');
INSERT INTO majiang.admin_users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name) VALUES ('127.0.0.1', 'manager', '$2y$08$snzIJdFXvg/rSHe0SndIAuvZyjktkjUxBXkrrGdkPy1K6r5r/dMLa', '', '', '', '', 0, '', 1451900430, 1465489585, 1, 'Manager', '');
INSERT INTO majiang.admin_users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name) VALUES ('127.0.0.1', 'staff', '$2y$08$NigAXjN23CRKllqe3KmjYuWXD5iSRPY812SijlhGeKfkrMKde9da6', '', '', '', '', 0, '', 1451900439, 1465489590, 1, 'Staff', '');

-- Table: majiang.admin_users_groups

DROP TABLE IF EXISTS majiang.admin_users_groups;

CREATE TABLE majiang.admin_users_groups
(
    id smallserial PRIMARY KEY,
    user_id smallserial NOT NULL,
    group_id smallserial NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.admin_users_groups
    OWNER to postgres;

INSERT INTO majiang.admin_users_groups (user_id, group_id) VALUES (1, 1);
INSERT INTO majiang.admin_users_groups (user_id, group_id) VALUES (2, 2);
INSERT INTO majiang.admin_users_groups (user_id, group_id) VALUES (3, 3);
INSERT INTO majiang.admin_users_groups (user_id, group_id) VALUES (4, 4);

-- Table: majiang.groups

DROP TABLE IF EXISTS majiang.groups;

CREATE TABLE majiang.groups
(
    id smallserial PRIMARY KEY,
    name varchar(20) NOT NULL,
    description varchar(100) NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.groups
    OWNER to postgres;

INSERT INTO majiang.groups (name, description) VALUES ('members', 'General User');

-- Table: majiang.login_attempts

DROP TABLE IF EXISTS majiang.login_attempts;

CREATE TABLE majiang.login_attempts
(
    id bigserial PRIMARY KEY,
    ip_address varchar(15) NOT NULL,
    login varchar(100) NOT NULL,
    time integer NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.login_attempts
    OWNER to postgres;

-- Table: majiang.users

DROP TABLE IF EXISTS majiang.users;

CREATE TABLE majiang.users
(
    id bigserial PRIMARY KEY,
    ip_address varchar(15) NOT NULL,
    username varchar(100) NOT NULL,
    password varchar(255) NOT NULL,
    salt varchar(255) NOT NULL,
    email varchar(100) NOT NULL,
    activation_code varchar(40) NOT NULL,
    forgotten_password_code varchar(40) NOT NULL,
    forgotten_password_time integer NOT NULL,
    remember_code varchar(40) NOT NULL,
    created_on integer NOT NULL,
    last_login integer NOT NULL,
    active smallint  NOT NULL,
    first_name varchar(50) NOT NULL,
    last_name varchar(50) NOT NULL,
    company varchar(100) NOT NULL,
    phone varchar(20) NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.users
    OWNER to postgres;

INSERT INTO majiang.users (ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, company, phone) VALUES ('127.0.0.1', 'member', '$2y$08$kkqUE2hrqAJtg.pPnAhvL.1iE7LIujK5LZ61arONLpaBBWh/ek61G', '', 'member@member.com', '', '', 0, '', 1451903855, 1451905011, 1, 'Member', 'One', '', '');

-- Table: majiang.users_groups

DROP TABLE IF EXISTS majiang.users_groups;

CREATE TABLE majiang.users_groups
(
    id bigserial PRIMARY KEY,
    user_id bigserial NOT NULL,
    group_id smallserial NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.users_groups
    OWNER to postgres;

INSERT INTO majiang.users_groups (user_id, group_id) VALUES (1, 1);

-- Table: majiang.ads_manages

DROP TABLE majiang.ads_manages;

CREATE TABLE majiang.ads_manages
(
    id bigserial PRIMARY KEY,
    ads_id varchar(50) NOT NULL,
    ads_name varchar(255) NOT NULL,
    ads_user_id varchar(50) NOT NULL,
    available_price varchar(50) NOT NULL,
    balance_price varchar(50) NOT NULL,
    ip_address varchar(150) NOT NULL,
    online_status varchar(10) NOT NULL,
    payment_method varchar(255) NOT NULL,
    payment_number varchar(50) NOT NULL,
    total_price varchar(100) NOT NULL,
    ads_status varchar(10) NOT NULL,
    ads_date timestamp without time zone NOT NULL,
    ads_price integer NOT NULL
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE majiang.ads_manages
    OWNER to postgres;