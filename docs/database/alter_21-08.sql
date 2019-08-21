RENAME TABLE `business_case` TO `benefits_plan`;

ALTER TABLE `benefits_plan`  
    CHANGE `business_case_id` `benefits_plan_id` INT(11) NOT NULL AUTO_INCREMENT;

   CREATE TABLE IF NOT EXISTS `business_case` (
    `business_case_id` INT(11) NOT NULL AUTO_INCREMENT,
    `business_deals` VARCHAR(1000) NULL DEFAULT NULL,
    `situation_analysis` VARCHAR(1000) NULL DEFAULT NULL,
    `recommendation` VARCHAR(1000) NULL DEFAULT NULL,
    `evaluation` VARCHAR(1000) NULL DEFAULT NULL,
    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`business_case_id`))
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;