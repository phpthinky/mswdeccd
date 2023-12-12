ALTER TABLE e_weighing ADD COLUMN weighing_type int(1) DEFAULT 0 NOT NULL AFTER id;

UPDATE `e_weighing` `t1` SET `t1`.`weighing_type` = 1 WHERE t1.date_weighing = (SELECT MIN(date_weighing) FROM e_weighing t2 WHERE t2.student_id = t1.student_id);
DELETE FROM `e_weighing` WHERE weighing_type != 1;

ALTER VIEW v_uponentry AS SELECT s.student_id,s.center_id,s.worker_id,s.student_name,s.gender,(select T1.id from e_weighing T1 WHERE t1.student_id = s.student_id AND T1.weighing_type = 1) as weighing_id,s.year_id FROM `center_students_schoolyear` `s`;
ALTER VIEW v_20days AS SELECT s.student_id,s.center_id,s.worker_id,s.student_name,s.gender,(select T1.id from e_weighing T1 WHERE t1.student_id = s.student_id AND T1.weighing_type = 2) as weighing_id,s.year_id FROM `center_students_schoolyear` `s`;
ALTER VIEW v_40days AS SELECT s.student_id,s.center_id,s.worker_id,s.student_name,s.gender,(select T1.id from e_weighing T1 WHERE t1.student_id = s.student_id AND T1.weighing_type = 3) as weighing_id,s.year_id FROM `center_students_schoolyear` `s`;
ALTER VIEW v_terminal AS SELECT s.student_id,s.center_id,s.worker_id,s.student_name,s.gender,(select T1.id from e_weighing T1 WHERE t1.student_id = s.student_id AND T1.weighing_type = 4) as weighing_id,s.year_id FROM `center_students_schoolyear` `s`;