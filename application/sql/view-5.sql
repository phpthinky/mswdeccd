ALTER TABLE `eparent` ADD `child_id` INT NOT NULL AFTER `height`;
ALTER TABLE `eparent` CHANGE `occupation` `occupation` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `eparent` CHANGE `familyPosition` `familyPosition` VARCHAR(25) NOT NULL;
ALTER TABLE `eparent` ADD `ext` VARCHAR(10) NOT NULL AFTER `lName`;
create view v_assessment as SELECT estudents.center_id,estudents.worker_id,estudents.year_id,estudents.student_name,estudents.student_id as pupil_id,v_raw_score.* FROM `estudents` LEFT JOIN v_raw_score on v_raw_score.student_id = estudents.student_id;
