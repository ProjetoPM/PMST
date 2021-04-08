
 CREATE TABLE IF NOT EXISTS `upload` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `path` VARCHAR(1000) NULL DEFAULT NULL,    
    `view` VARCHAR(1000) NULL DEFAULT NULL,
    `alt` VARCHAR(1000) NULL DEFAULT NULL,
    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`project_id`) REFERENCES `project`(`project_id`)

    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;
