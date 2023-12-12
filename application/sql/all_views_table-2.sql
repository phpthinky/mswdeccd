
-- --------------------------------------------------------



--
-- Structure for view `center_students_schoolyear`
--
DROP VIEW IF EXISTS `center_students_schoolyear`;

CREATE VIEW `center_students_schoolyear`  AS SELECT DISTINCT `epupils`.`pupilsId` AS `student_id`, `eworkers`.`centerId` AS `center_id`, `eworkers`.`workersId` AS `worker_id`, `eschoolyear`.`YearId` AS `year_id`, `eschoolyear_by_worker_students`.`StudentType` AS `student_type`, concat(`epupils`.`lName`,', ',`epupils`.`fName`,' ',`epupils`.`mName`,' ',`epupils`.`ext`) AS `student_name`, `epupils`.`age` AS `age`, `epupils`.`gender` AS `gender`, `epupils`.`address` AS `address`, `eschoolyear`.`YearStart` AS `class_start`, `eschoolyear`.`YearEnd` AS `class_end` FROM ((((`epupils` join `eschoolyear_by_worker_students` on(`eschoolyear_by_worker_students`.`StudentId` = `epupils`.`pupilsId`)) join `eschoolyear_by_worker` on(`eschoolyear_by_worker`.`workersId` = `eschoolyear_by_worker_students`.`workersId`)) join `eworkers` on(`eworkers`.`workersId` = `eschoolyear_by_worker`.`workersId`)) join `eschoolyear` on(`eschoolyear`.`YearId` = `eschoolyear_by_worker_students`.`YearId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `center_workers`
--
DROP VIEW IF EXISTS `center_workers`;

CREATE  VIEW `center_workers`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name`, `ecenter`.`centerName` AS `center_name`, `eworkers`.`address` AS `worker_address`, `eworkers`.`jobStatus` AS `job_status`, `eworkers`.`contact_number` AS `contact_number` FROM (`eworkers` left join `ecenter` on(`eworkers`.`centerId` = `ecenter`.`centerId`))  ;

-- --------------------------------------------------------

--
-- Structure for view `center_workers_schoolyear`
--
DROP VIEW IF EXISTS `center_workers_schoolyear`;

CREATE  VIEW `center_workers_schoolyear`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, `eschoolyear`.`YearId` AS `year_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name`, `eworkers`.`address` AS `worker_address`, `eschoolyear`.`YearStart` AS `class_start`, `eschoolyear`.`YearEnd` AS `class_end`, `ecenter`.`centerName` AS `center_name`, `eworkers`.`jobStatus` AS `job_status`, `eschoolyear`.`Status` AS `class_status`, (select count(0) from `eschoolyear_by_worker_students` where `eschoolyear_by_worker_students`.`workersId` = `eworkers`.`workersId` and `eschoolyear_by_worker_students`.`YearId` = `eschoolyear_by_worker`.`YearId`) AS `total_students` FROM (((`eworkers` join `eschoolyear_by_worker` on(`eschoolyear_by_worker`.`workersId` = `eworkers`.`workersId`)) join `eschoolyear` on(`eschoolyear`.`YearId` = `eschoolyear_by_worker`.`YearId`)) join `ecenter` on(`ecenter`.`centerId` = `eworkers`.`centerId`))  ;

-- --------------------------------------------------------

--
-- Structure for view `center_schoolyear`
--
DROP VIEW IF EXISTS `center_schoolyear`;

CREATE VIEW `center_schoolyear`  AS SELECT DISTINCT `ecenter`.`centerId` AS `center_id`, `ecenter`.`centerName` AS `center_name`, `ecenter`.`barangay` AS `barangay`, `ecenter`.`centerAddress` AS `center_address`, (select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId` and `center_students_schoolyear`.`gender` = 1) AS `total_students_boys`, (select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId` and `center_students_schoolyear`.`gender` = 2) AS `total_students_girls`, (select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId`) AS `total_students`, (select `center_workers`.`worker_name` from `center_workers` where `center_workers`.`center_id` = `ecenter`.`centerId`) AS `worker_name`, (select `center_workers`.`contact_number` from `center_workers` where `center_workers`.`center_id` = `ecenter`.`centerId`) AS `contact_number` FROM `ecenter` ORDER BY `ecenter`.`barangay` ASC  ;


-- --------------------------------------------------------

--
-- Structure for view `center_students_nutritions`
--
DROP VIEW IF EXISTS `center_students_nutritions`;

CREATE  VIEW `center_students_nutritions`  AS SELECT `t1`.`id` AS `id`, `t1`.`student_id` AS `student_id`, `t1`.`date_weighing` AS `date_weighing`, `t1`.`wfa` AS `wfa`, `t1`.`hfa` AS `hfa`, `t1`.`wfh` AS `wfh`, `t3`.`student_name` AS `student_name`, `t3`.`year_id` AS `year_id`, `t3`.`worker_id` AS `worker_id` FROM ((`e_weighing` `t1` join (select `e_weighing`.`student_id` AS `student_id`,max(`e_weighing`.`date_weighing`) AS `MaxDate` from `e_weighing` group by `e_weighing`.`student_id`) `t2` on(`t1`.`student_id` = `t2`.`student_id` and `t1`.`date_weighing` = `t2`.`MaxDate`)) join `center_students_schoolyear` `t3` on(`t1`.`student_id` = `t3`.`student_id`))  ;

--
-- Structure for view `estudents`
--
DROP VIEW IF EXISTS `estudents`;

CREATE  VIEW `estudents`  AS SELECT DISTINCT `cs`.`student_id` AS `student_id`, `cs`.`center_id` AS `center_id`, `cs`.`worker_id` AS `worker_id`, `cs`.`year_id` AS `year_id`, `cs`.`student_type` AS `student_type`, `cs`.`student_name` AS `student_name`, `cs`.`class_start` AS `class_start`, `cs`.`class_end` AS `class_end`, `ep`.`birthDate` AS `birthdate`, `ep`.`gender` AS `gender`, `ep`.`barangay` AS `barangay` FROM (`center_students_schoolyear` `cs` join `epupils` `ep` on(`cs`.`student_id` = `ep`.`pupilsId`)) GROUP BY `cs`.`student_id` ORDER BY `cs`.`year_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `eworkers_inactive`
--
DROP VIEW IF EXISTS `eworkers_inactive`;

CREATE  VIEW `eworkers_inactive`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name` FROM `eworkers` WHERE !(`eworkers`.`workersId` in (select `eschoolyear_by_worker`.`workersId` from `eschoolyear_by_worker`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_20days`
--
DROP VIEW IF EXISTS `v_20days`;

CREATE  VIEW `v_20days`  AS SELECT `s`.`student_id` AS `student_id`, `s`.`center_id` AS `center_id`, `s`.`worker_id` AS `worker_id`, `s`.`student_name` AS `student_name`, `s`.`gender` AS `gender`, (select `w`.`id` from `e_weighing` `w` where `w`.`student_id` = `s`.`student_id` and `w`.`date_weighing` = (select `t2`.`date_weighing` + interval 20 day from `e_weighing` `t2` where `t2`.`student_id` = `t2`.`student_id` order by `t2`.`date_weighing` limit 1) order by `w`.`date_weighing` limit 1) AS `weighing_id`, `s`.`year_id` AS `year_id` FROM `center_students_schoolyear` AS `s`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_40days`
--
DROP VIEW IF EXISTS `v_40days`;

CREATE  VIEW `v_40days`  AS SELECT `s`.`student_id` AS `student_id`, `s`.`center_id` AS `center_id`, `s`.`worker_id` AS `worker_id`, `s`.`student_name` AS `student_name`, `s`.`gender` AS `gender`, (select `w`.`id` from `e_weighing` `w` where `w`.`student_id` = `s`.`student_id` and `w`.`date_weighing` = (select `t2`.`date_weighing` + interval 40 day from `e_weighing` `t2` where `t2`.`student_id` = `t2`.`student_id` order by `t2`.`date_weighing` limit 1) order by `w`.`date_weighing` limit 1) AS `weighing_id`, `s`.`year_id` AS `year_id` FROM `center_students_schoolyear` AS `s`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_ass_checklist`
--
DROP VIEW IF EXISTS `v_ass_checklist`;

CREATE  VIEW `v_ass_checklist`  AS SELECT DISTINCT `t1`.`student_id` AS `student_id`, (select `t2`.`date_assessment` from `assessment` `t2` where `t2`.`student_id` = `t1`.`student_id` and `t2`.`type` = 1 limit 1) AS `first_assessment`, (select `t3`.`date_assessment` from `assessment` `t3` where `t3`.`student_id` = `t1`.`student_id` and `t3`.`type` = 2 limit 1) AS `second_assessment`, (select `t4`.`date_assessment` from `assessment` `t4` where `t4`.`student_id` = `t1`.`student_id` and `t4`.`type` = 3 limit 1) AS `third_assessment` FROM `assessment` AS `t1``t1`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_centers`
--
DROP VIEW IF EXISTS `v_centers`;

CREATE  VIEW `v_centers`  AS SELECT `ecenter`.`centerId` AS `center_id`, `ecenter`.`centerName` AS `center_name`, `ecenter`.`barangay` AS `barangay`, `ecenter`.`centerAddress` AS `center_address`, (select concat(`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`lName`,' ',`eworkers`.`ext`) from `eworkers` where `eworkers`.`centerId` = `ecenter`.`centerId` and `eworkers`.`jobStatus` <> 6) AS `worker_name` FROM `ecenter``ecenter`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_current_weighing`
--
DROP VIEW IF EXISTS `v_current_weighing`;

CREATE  VIEW `v_current_weighing`  AS SELECT `t1`.`id` AS `id`, `t1`.`student_id` AS `student_id`, `t1`.`date_weighing` AS `date_weighing`, `t1`.`wfa` AS `wfa`, `t1`.`hfa` AS `hfa`, `t1`.`wfh` AS `wfh`, `t3`.`student_name` AS `student_name`, `t3`.`year_id` AS `year_id`, `t3`.`worker_id` AS `worker_id` FROM ((`e_weighing` `t1` join (select `e_weighing`.`student_id` AS `student_id`,max(`e_weighing`.`date_weighing`) AS `MaxDate` from `e_weighing` group by `e_weighing`.`student_id`) `t2` on(`t1`.`student_id` = `t2`.`student_id` and `t1`.`date_weighing` = `t2`.`MaxDate`)) join `center_students_schoolyear` `t3` on(`t1`.`student_id` = `t3`.`student_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `v_eccd_students`
--
DROP VIEW IF EXISTS `v_eccd_students`;

CREATE  VIEW `v_eccd_students`  AS SELECT `epupils`.`pupilsId` AS `student_id`, concat(`epupils`.`lName`,', ',`epupils`.`fName`,' ',`epupils`.`mName`,' ',`epupils`.`ext`) AS `student_name`, `epupils`.`gender` AS `gender`, (select max(`e_weighing`.`date_weighing`) from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId`) AS `max_weighing`, (select `e_weighing`.`height` from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId` and `e_weighing`.`date_weighing` = `max_weighing`) AS `height`, (select `e_weighing`.`weight` from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId` and `e_weighing`.`date_weighing` = `max_weighing`) AS `weight`, (select `e_weighing`.`wfa` from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId` and `e_weighing`.`date_weighing` = `max_weighing`) AS `wfa`, (select `e_weighing`.`hfa` from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId` and `e_weighing`.`date_weighing` = `max_weighing`) AS `hfa`, (select `e_weighing`.`wfh` from `e_weighing` where `e_weighing`.`student_id` = `epupils`.`pupilsId` and `e_weighing`.`date_weighing` = `max_weighing`) AS `wfh` FROM `epupils``epupils`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_raw_score`
--
DROP VIEW IF EXISTS `v_raw_score`;

CREATE  VIEW `v_raw_score`  AS SELECT `t`.`student_id` AS `student_id`, `t`.`date_assessment` AS `date_assessment`, `t`.`domain` AS `domain`, (select `t1`.`raw_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 1 limit 1) AS `raw_score_1`, (select `t1`.`scaled_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 1 limit 1) AS `scaled_score_1`, (select `t1`.`raw_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 2 limit 1) AS `raw_score_2`, (select `t2`.`scaled_score` from `assessment` `t2` where `t`.`student_id` = `t2`.`student_id` and `t2`.`domain` = `t`.`domain` and `t2`.`type` = 2 limit 1) AS `scaled_score_2`, (select `t3`.`raw_score` from `assessment` `t3` where `t`.`student_id` = `t3`.`student_id` and `t`.`domain` = `t`.`domain` and `t3`.`type` = 3 limit 1) AS `raw_score_3`, (select `t3`.`scaled_score` from `assessment` `t3` where `t`.`student_id` = `t3`.`student_id` and `t3`.`domain` = `t`.`domain` and `t3`.`type` = 3 limit 1) AS `scaled_score_3` FROM `assessment` AS `t` GROUP BY `t`.`domain`, `t`.`student_id``student_id`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_sum_scaled_score`
--
DROP VIEW IF EXISTS `v_sum_scaled_score`;

CREATE  VIEW `v_sum_scaled_score`  AS SELECT sum(`t1`.`scaled_score`) AS `sum_scaled_score`, `t1`.`student_id` AS `student_id`, `t1`.`type` AS `type`, `t1`.`date_assessment` AS `date_assessment`, (select `cs`.`worker_id` from `center_students_schoolyear` `cs` where `cs`.`student_id` = `t1`.`student_id`) AS `worker_id`, (select `cs`.`year_id` from `center_students_schoolyear` `cs` where `cs`.`student_id` = `t1`.`student_id`) AS `year_id` FROM `assessment` AS `t1` GROUP BY `t1`.`student_id`, `t1`.`type``type`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_terminal`
--
DROP VIEW IF EXISTS `v_terminal`;

CREATE  VIEW `v_terminal`  AS SELECT DISTINCT `s`.`student_id` AS `student_id`, `s`.`center_id` AS `center_id`, `s`.`worker_id` AS `worker_id`, `s`.`student_name` AS `student_name`, `s`.`gender` AS `gender`, (select `t1`.`id` from `e_weighing` `t1` where `t1`.`date_weighing` = (select max(`t2`.`date_weighing`) from `e_weighing` `t2` where `t2`.`student_id` = `s`.`student_id`) limit 1) AS `weighing_id`, `s`.`year_id` AS `year_id` FROM `center_students_schoolyear` AS `s`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_uponentry`
--
DROP VIEW IF EXISTS `v_uponentry`;

CREATE  VIEW `v_uponentry`  AS SELECT `s`.`student_id` AS `student_id`, `s`.`center_id` AS `center_id`, `s`.`worker_id` AS `worker_id`, `s`.`student_name` AS `student_name`, `s`.`gender` AS `gender`, (select `t1`.`id` from `e_weighing` `t1` where `t1`.`date_weighing` = (select min(`t2`.`date_weighing`) from `e_weighing` `t2` where `t2`.`student_id` = `s`.`student_id`)) AS `weighing_id`, `s`.`year_id` AS `year_id` FROM `center_students_schoolyear` AS `s`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_weighing`
--
DROP VIEW IF EXISTS `v_weighing`;

CREATE  VIEW `v_weighing`  AS SELECT `w`.`id` AS `id`, `w`.`date_weighing` AS `date_weighing`, `w`.`student_id` AS `student_id`, `w`.`weight` AS `weight`, `w`.`height` AS `height`, `w`.`wfa` AS `wfa`, `w`.`hfa` AS `hfa`, `w`.`wfh` AS `wfh`, `w`.`wfa_percentage` AS `wfa_percentage`, `w`.`hfa_percentage` AS `hfa_percentage`, `w`.`wfh_percentage` AS `wfh_percentage`, `w`.`status` AS `status`, concat(`p`.`lName`,', ',`p`.`fName`,' ',`p`.`mName`,' ',`p`.`ext`) AS `student_name` FROM (`e_weighing` `w` left join `epupils` `p` on(`p`.`pupilsId` = `w`.`student_id`)) WHERE `w`.`date_weighing` = (select max(`w2`.`date_weighing`) from `e_weighing` `w2` where `w`.`student_id` = `w2`.`student_id`)  ;
