CREATE VIEW v_sum_scaled_score AS SELECT SUM(t1.scaled_score) as sum_scaled_score,t1.student_id,t1.type,t1.date_assessment,
	(SELECT worker_id FROM center_students_schoolyear cs WHERE cs.student_id = t1.student_id) as worker_id,
	(SELECT year_id FROM center_students_schoolyear cs WHERE cs.student_id = t1.student_id) as year_id 
	FROM assessment t1 GROUP BY t1.student_id,t1.type;

CREATE VIEW v_raw_score as SELECT t.student_id,t.date_assessment,t.domain,
(SELECT t1.raw_score FROM `assessment` `t1` WHERE t.student_id = t1.student_id and t1.domain = t.domain AND t1.type = 1 LIMIT 1) as raw_score_1,
(SELECT t1.scaled_score FROM `assessment` `t1` WHERE t.student_id = t1.student_id and t1.domain = t.domain AND t1.type = 1 LIMIT 1) as scaled_score_1,
(SELECT t1.raw_score FROM `assessment` `t1` WHERE t.student_id = t1.student_id and t1.domain = t.domain AND t1.type = 2 LIMIT 1) as raw_score_2,
(SELECT t2.scaled_score FROM `assessment` `t2` WHERE t.student_id = t2.student_id and t2.domain = t.domain AND t2.type = 2 LIMIT 1) as scaled_score_2,
(SELECT t3.raw_score FROM `assessment` `t3` WHERE t.student_id = t3.student_id and t.domain = t.domain AND t3.type = 3 LIMIT 1) as raw_score_3,
(SELECT t3.scaled_score FROM `assessment` `t3` WHERE t.student_id = t3.student_id and t3.domain = t.domain AND t3.type = 3 LIMIT 1) as scaled_score_3
FROM `assessment` `t` GROUP BY t.domain,t.student_id;