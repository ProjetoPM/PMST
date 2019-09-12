
 CREATE TABLE IF NOT EXISTS `procurement_statement_of_work` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `description` VARCHAR(1000) NULL DEFAULT NULL,    
    `types` VARCHAR(1000) NULL DEFAULT NULL,
    `selection_criterias` VARCHAR(1000) NULL DEFAULT NULL,
    `restrictions` VARCHAR(1000) NULL DEFAULT NULL,
    `premises` VARCHAR(1000) NULL DEFAULT NULL,
    `schedule` VARCHAR(1000) NULL DEFAULT NULL,
    `informations` VARCHAR(1000) NULL DEFAULT NULL,
    `procurement_management` VARCHAR(1000) NULL DEFAULT NULL,
    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
        )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;