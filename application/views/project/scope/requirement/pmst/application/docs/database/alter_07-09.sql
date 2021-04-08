
ALTER TABLE `stakeholder`  
    ADD `interest` INT(11) NULL DEFAULT NULL,
    ADD `power` INT(11) NULL DEFAULT NULL,
    ADD `influence` INT(11) NULL DEFAULT NULL,
    ADD `impact` INT(11) NULL DEFAULT NULL,
    ADD `average` INT(11) NULL DEFAULT NULL,
    ADD `expected_engagement` VARCHAR(50) NULL DEFAULT NULL,
    ADD `current_engagement` VARCHAR(50) NULL DEFAULT NULL,
    ADD `strategy` TEXT NULL DEFAULT NULL,
    ADD `scope` TEXT NULL DEFAULT NULL,
    ADD `observation` TEXT NULL DEFAULT NULL;

