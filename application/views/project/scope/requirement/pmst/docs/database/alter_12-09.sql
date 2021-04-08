
 CREATE TABLE IF NOT EXISTS `change_request` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `requester` VARCHAR(100) NULL DEFAULT NULL,    
    `number_id` INT(11) NULL DEFAULT NULL,
    `request_date` DATE NULL DEFAULT NULL,
    `type` VARCHAR(100) NULL DEFAULT NULL,
    `description` VARCHAR(1000) NULL DEFAULT NULL,
    `impacted_areas` VARCHAR(1000) NULL DEFAULT NULL,
    `impacted_docs` VARCHAR(1000) NULL DEFAULT NULL,
    `justification` VARCHAR(1000) NULL DEFAULT NULL,
    `comments` VARCHAR(1000) NULL DEFAULT NULL,
    `manager_opinion` VARCHAR(1000) NULL DEFAULT NULL,
    `committee_opinion` VARCHAR(1000) NULL DEFAULT NULL,
    `status` VARCHAR(1000) NULL DEFAULT NULL,
    `committee_date` DATE NULL DEFAULT NULL,
    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
        )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;