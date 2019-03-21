create database caym;
use caym;
CREATE TABLE `caym`.`cuenta` (
 `id_cuenta` BIGINT(20) UNSIGNED NOT NULL,
 `cuenta` VARCHAR(100) NULL,
 `id_cuenta_padre` BIGINT(20) NULL,
 PRIMARY KEY (`id_cuenta`));

ALTER TABLE `caym`.`cuenta`
  CHANGE COLUMN `id_cuenta_padre` `id_cuenta_padre` BIGINT(20) UNSIGNED NULL DEFAULT NULL ,
  ADD INDEX `fk_cuenta_cuenta_idx` (`id_cuenta_padre` ASC);
ALTER TABLE `caym`.`cuenta`
  ADD CONSTRAINT `fk_cuenta_cuenta`
    FOREIGN KEY (`id_cuenta_padre`)
      REFERENCES `caym`.`cuenta` (`id_cuenta`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;
ALTER TABLE `caym`.`cuenta`
  ADD COLUMN `created_at` DATETIME NULL AFTER `id_cuenta_padre`,
  ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`;

INSERT INTO `caym`.`cuenta` (`id_cuenta`, `cuenta`) VALUES ('1', 'caym');
INSERT INTO `caym`.`cuenta` (`id_cuenta`, `cuenta`, `id_cuenta_padre`) VALUES ('2', 'caym', '1');
CREATE TABLE `caym`.`hosts` (
`id_hosts` BIGINT(20) NOT NULL AUTO_INCREMENT,
`host` VARCHAR(100) NULL,
`id_cuenta` BIGINT(20) UNSIGNED NULL,
PRIMARY KEY (`id_hosts`),
INDEX `fk_hosts_cuenta_idx` (`id_cuenta` ASC),
CONSTRAINT `fk_hosts_cuenta`
FOREIGN KEY (`id_cuenta`)
REFERENCES `caym`.`cuenta` (`id_cuenta`)
ON DELETE NO ACTION
ON UPDATE NO ACTION);
ALTER TABLE `caym`.`hosts`
  ADD COLUMN `created_at` DATETIME NULL AFTER `id_cuenta`,
  ADD COLUMN `updated_at` DATETIME NULL AFTER `created_at`;
INSERT INTO `caym`.`hosts` (`id_hosts`, `host`, `id_cuenta`) VALUES ('1', 'caym', '2');


CREATE TABLE `caym`.`template` (
 `id_template` BIGINT(20) NOT NULL AUTO_INCREMENT,
 `nombre` VARCHAR(100) NULL,
 `path` VARCHAR(100) NULL,
 `pathJs` VARCHAR(100) NULL,
 `created_at` DATETIME NULL,
 `updated_at` DATETIME NULL,
 `id_cuenta` BIGINT(20) UNSIGNED NULL,
 PRIMARY KEY (`id_template`),
 INDEX `fk_template_cuenta_idx` (`id_cuenta` ASC),
 CONSTRAINT `fk_template_cuenta`
   FOREIGN KEY (`id_cuenta`)
     REFERENCES `caym`.`cuenta` (`id_cuenta`)
     ON DELETE NO ACTION
     ON UPDATE NO ACTION);


ALTER TABLE `caym`.`hosts`
  ADD COLUMN `namespace` VARCHAR(100) NULL AFTER `updated_at`,
  ADD COLUMN `controller` VARCHAR(100) NULL AFTER `namespace`,
  ADD COLUMN `metodo` VARCHAR(100) NULL AFTER `controller`,
  ADD COLUMN `id_template` BIGINT(20) NULL AFTER `metodo`,
  ADD INDEX `fk_hosts_template_idx` (`id_template` ASC);
ALTER TABLE `caym`.`hosts`
  ADD CONSTRAINT `fk_hosts_template`
    FOREIGN KEY (`id_template`)
      REFERENCES `caym`.`template` (`id_template`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;

INSERT INTO `caym`.`template` (`id_template`, `nombre`, `path`, `pathJs`, `id_cuenta`) VALUES ('1', 'default', '', '', '1');

UPDATE `caym`.`hosts` SET `namespace`='App/Controllers', `controller`='Home', `metodo`='index', `id_template`='1' WHERE `id_hosts`='1';


CREATE TABLE `caym`.`ruta` (
`id_ruta` BIGINT(20) NOT NULL AUTO_INCREMENT,
`controller` VARCHAR(100) NULL,
`method` VARCHAR(100) NULL,
`id_cuenta` BIGINT(20) UNSIGNED NULL,
`created_at` DATETIME NULL,
`updated_at` DATETIME NULL,
PRIMARY KEY (`id_ruta`));


ALTER TABLE `caym`.`ruta`
  ADD CONSTRAINT `fk_ruta_cuenta`
    FOREIGN KEY (`id_cuenta`)
      REFERENCES `caym`.`cuenta` (`id_cuenta`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION;

INSERT INTO `caym`.`ruta` (`id_ruta`, `controller`, `method`, `id_cuenta`) VALUES ('1', 'Home', 'index', '1');

ALTER TABLE `caym`.`ruta`
  ADD COLUMN `ruta` VARCHAR(100) NULL AFTER `updated_at`;
UPDATE `caym`.`ruta` SET `ruta`='/' WHERE `id_ruta`='1';
INSERT INTO `caym`.`ruta` (`id_ruta`, `controller`, `method`, `id_cuenta`, `ruta`) VALUES ('2', 'Home', 'saluda', '1', '/saluda');
