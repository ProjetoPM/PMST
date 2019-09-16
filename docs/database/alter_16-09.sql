
 CREATE TABLE IF NOT EXISTS `activity` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `associated_id` VARCHAR(10) NULL DEFAULT NULL,    
    `project_phase` VARCHAR(20) NULL DEFAULT NULL,    
    `milestone` VARCHAR(20) NULL DEFAULT NULL,    
    `activity_name` VARCHAR(100) NULL DEFAULT NULL,

    `predecessor_activity` VARCHAR(100) NULL DEFAULT NULL,
    `dependence_type` VARCHAR(100) NULL DEFAULT NULL,
    `anticipation` VARCHAR(100) NULL DEFAULT NULL,
    `wait` VARCHAR(100) NULL DEFAULT NULL,

    `resource_description` VARCHAR(100) NULL DEFAULT NULL,
    `required_amount_of_resource` INT(11) NULL DEFAULT NULL,
    `resource_cost_per_unit` DECIMAL(11,2) NULL DEFAULT NULL,
    `resource_type` VARCHAR(100) NULL DEFAULT NULL,

    `resource_name` VARCHAR(200) NULL DEFAULT NULL,
    `function` VARCHAR(100) NULL DEFAULT NULL,
    `availability_start` DATE NULL DEFAULT NULL,
    `availability_ends` DATE NULL DEFAULT NULL,

    `estimated_duration` DECIMAL(11,2) NULL DEFAULT NULL,
    `replanted_duration` DECIMAL(11,2) NULL DEFAULT NULL,
    `performed_duration` DECIMAL(11,2) NULL DEFAULT NULL,
    `estimated_start_date` DATE NULL DEFAULT NULL,
    `replanted_start_date` DATE NULL DEFAULT NULL,
    `performed_start_date` DATE NULL DEFAULT NULL,
    `estimated_end_date` DATE NULL DEFAULT NULL,
    `replanted_end_date` DATE NULL DEFAULT NULL,
    `performed_end_date` DATE NULL DEFAULT NULL,

    `estimated_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `cumulative_estimated_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `replanted_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `contingency_reserve` DECIMAL(11,2) NULL DEFAULT NULL,
    `sum_of_work_packages` DECIMAL(11,2) NULL DEFAULT NULL,
    `contingency_reserve_of_packages` DECIMAL(11,2) NULL DEFAULT NULL,
    `baseline` DECIMAL(11,2) NULL DEFAULT NULL,
    `budget` DECIMAL(11,2) NULL DEFAULT NULL,
    `cumulative_replanted_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `real_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `cumulative_real_cost` DECIMAL(11,2) NULL DEFAULT NULL,

    `estimated_completed` DECIMAL(11,2) NULL DEFAULT NULL,
    `replanted_completed` DECIMAL(11,2) NULL DEFAULT NULL,
    `real_completed` DECIMAL(11,2) NULL DEFAULT NULL,

    `agregate_value` DECIMAL(11,2) NULL DEFAULT NULL,
    `planned_value` DECIMAL(11,2) NULL DEFAULT NULL,
    `real_agregate_cost` DECIMAL(11,2) NULL DEFAULT NULL,
    `variation_of_terms` DECIMAL(11,2) NULL DEFAULT NULL,
    `variation_of_costs` DECIMAL(11,2) NULL DEFAULT NULL,
    `deadline_performance_index` DECIMAL(11,2) NULL DEFAULT NULL,
    `costs_performance_index` DECIMAL(11,2) NULL DEFAULT NULL,
    `estimated_of_completation` DECIMAL(11,2) NULL DEFAULT NULL,

    `duration_pessimistic` DECIMAL(11,2) NULL DEFAULT NULL,
    `duration_probable` DECIMAL(11,2) NULL DEFAULT NULL,
    `duration_otimistic` DECIMAL(11,2) NULL DEFAULT NULL,
    `duration_beta` DECIMAL(11,2) NULL DEFAULT NULL,
    `duration_triangular` DECIMAL(11,2) NULL DEFAULT NULL,
    `cost_pessimistic` DECIMAL(11,2) NULL DEFAULT NULL,
    `cost_probable` DECIMAL(11,2) NULL DEFAULT NULL,
    `cost_otimistic` DECIMAL(11,2) NULL DEFAULT NULL,
    `cost_beta` DECIMAL(11,2) NULL DEFAULT NULL,
    `cost_triangular` DECIMAL(11,2) NULL DEFAULT NULL,

    `project_id` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
    )
  ENGINE = InnoDB
  DEFAULT CHARACTER SET = utf8;