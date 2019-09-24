
ALTER TABLE `activity`  
    ADD `budget_at_cumulative_end` DECIMAL(11,2) NULL DEFAULT NULL,
    ADD `variation_at_the_end` DECIMAL(11,2) NULL DEFAULT NULL,
    ADD `estimate_for_completion` DECIMAL(11,2) NULL DEFAULT NULL;


