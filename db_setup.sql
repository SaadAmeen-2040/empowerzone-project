-- ============================================================
--  EMPOWER ZONE — Database Setup
--  Run this file once in phpMyAdmin or MySQL CLI.
--  Default login → email: admin@empowerzone.us | password: Admin@1234
-- ============================================================

CREATE DATABASE IF NOT EXISTS empowerzone_db
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE empowerzone_db;

CREATE TABLE IF NOT EXISTS users (
    id         INT UNSIGNED     NOT NULL AUTO_INCREMENT,
    full_name  VARCHAR(100)     NOT NULL,
    email      VARCHAR(150)     NOT NULL,
    password   VARCHAR(255)     NOT NULL,
    created_at TIMESTAMP        NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- NOTE: The default admin password hash is inserted by setup.php
-- (PHP's password_hash() is used so we cannot pre-compute it here).
-- Run setup.php once from your browser to seed the default account.
