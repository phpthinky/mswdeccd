ALTER TABLE `eworkers` ADD `contact_number` VARCHAR(20) NOT NULL DEFAULT 'not specified' AFTER `sector`;
ALTER TABLE `eworkers` ADD `end_contract` DATE  NULL AFTER `dateHired`;