
 CREATE TABLE IF NOT EXISTS `quality_checklist` (
    `quality_id` INT(11) NOT NULL AUTO_INCREMENT,
    `product_verified` VARCHAR(200) NULL DEFAULT NULL,    
    `verification__date` DATE NULL DEFAULT NULL,    
    `associated_documents` VARCHAR(200) NULL DEFAULT NULL,    
    `verification_officer` VARCHAR(200) NULL DEFAULT NULL,    
    `guidelines` VARCHAR(1000) NULL DEFAULT NULL,       

    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`quality_id`)
    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;

   CREATE TABLE IF NOT EXISTS `items_check` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `items_to_check` VARCHAR(200) NULL DEFAULT NULL,    
    `ok` BIT NULL DEFAULT NULL,    
    `comments` VARCHAR(200) NULL DEFAULT NULL,    

    `quality_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
    )

  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;

  CREATE TABLE IF NOT EXISTS `work_performance_report` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `responsible` VARCHAR(200) NULL DEFAULT NULL,    
    `date` DATE NULL DEFAULT NULL,    
    `main_activities` VARCHAR(1000) NULL DEFAULT NULL,    
    `next_activities` VARCHAR(1000) NULL DEFAULT NULL,    
    `comments` VARCHAR(1000) NULL DEFAULT NULL,             
    `issues` VARCHAR(1000) NULL DEFAULT NULL,       
    `changes` VARCHAR(1000) NULL DEFAULT NULL,       
    `risks` VARCHAR(1000) NULL DEFAULT NULL,       
    `attention_points` VARCHAR(1000) NULL DEFAULT NULL,       

    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;