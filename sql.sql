CREATE DATABASE IF NOT EXISTS brulve DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

use brulve;

CREATE TABLE 'client' (
                          id           INT AUTO_INCREMENT PRIMARY KEY,
                          name         VARCHAR(100) NOT NULL,
                          email        VARCHAR(100) NOT NULL,
                          phone_number VARCHAR(100) NOT NULL,
                          account_type BOOLEAN      NOT NULL,
                          cpf_cpnj     VARCHAR(14)  NOT NULL,
                          address_id   INT,
                          FOREIGN KEY (address_id) REFERENCES address (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

CREATE TABLE 'address' (
                           id           INT AUTO_INCREMENT PRIMARY KEY,
                           street       VARCHAR(100) NOT NULL,
                           number       VARCHAR(100) NOT NULL,
                           neighborhood VARCHAR(100) NOT NULL,
                           city         VARCHAR(100) NOT NULL,
                           state        VARCHAR(100) NOT NULL,
                           client_id    INT          NOT NULL,
                           FOREIGN KEY (client_id) REFERENCES client (id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8
  COLLATE = utf8_unicode_ci;

