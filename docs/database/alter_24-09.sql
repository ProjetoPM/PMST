
 CREATE TABLE IF NOT EXISTS `project_performance_report` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `date` DATE NULL DEFAULT NULL,    
    `current_performance_analysis` VARCHAR(1000) NULL DEFAULT NULL,    
    `planned_forecasts` VARCHAR(1000) NULL DEFAULT NULL,    
    `forecasts_considering_current_performance` VARCHAR(1000) NULL DEFAULT NULL,    
    `current_risk_situation` VARCHAR(1000) NULL DEFAULT NULL,    
    `current_status_of_issues` VARCHAR(1000) NULL DEFAULT NULL,    
    `work_completed_during_the_period` VARCHAR(1000) NULL DEFAULT NULL,    
    `work_to_be_completed_in_the_next_period` VARCHAR(1000) NULL DEFAULT NULL,    
    `summary_of_changes` VARCHAR(1000) NULL DEFAULT NULL,    
    `earned_value_management` VARCHAR(1000) NULL DEFAULT NULL,    
    `other_relevant_information` VARCHAR(1000) NULL DEFAULT NULL,    
    

    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;

   CREATE TABLE IF NOT EXISTS `delivery_acceptance_term` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `validator_name` VARCHAR(200) NULL DEFAULT NULL,    
    `role` VARCHAR(200) NULL DEFAULT NULL,    
    `function` VARCHAR(200) NULL DEFAULT NULL,    
    `validation_date` DATE NULL DEFAULT NULL,    
    `comments` VARCHAR(1000) NULL DEFAULT NULL,    

    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;