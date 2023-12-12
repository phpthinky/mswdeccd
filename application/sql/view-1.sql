

-- --------------------------------------------------------


--
-- Structure for view `center_students_schoolyear`
--
DROP VIEW IF EXISTS `center_students_schoolyear`;

CREATE VIEW `center_students_schoolyear`  AS SELECT DISTINCT `epupils`.`pupilsId` AS `student_id`, `eworkers`.`centerId` AS `center_id`, `eworkers`.`workersId` AS `worker_id`, `eschoolyear`.`YearId` AS `year_id`, `eschoolyear_by_worker_students`.`StudentType` AS `student_type`, concat(`epupils`.`lName`,', ',`epupils`.`fName`,' ',`epupils`.`mName`,' ',`epupils`.`ext`) AS `student_name`, `epupils`.`age`,`epupils`.`gender`,`epupils`.`address`,`eschoolyear`.`YearStart` AS `class_start`, `eschoolyear`.`YearEnd` AS `class_end` FROM ((((`epupils` join `eschoolyear_by_worker_students` on(`eschoolyear_by_worker_students`.`StudentId` = `epupils`.`pupilsId`)) join `eschoolyear_by_worker` on(`eschoolyear_by_worker`.`workersId` = `eschoolyear_by_worker_students`.`workersId`)) join `eworkers` on(`eworkers`.`workersId` = `eschoolyear_by_worker`.`workersId`)) join `eschoolyear` on(`eschoolyear`.`YearId` = `eschoolyear_by_worker_students`.`YearId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `center_workers`
--
DROP VIEW IF EXISTS `center_workers`;
CREATE VIEW `center_workers`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name`, `ecenter`.`centerName` AS `center_name`, `eworkers`.`address` AS `worker_address`, `eworkers`.`jobStatus` AS `job_status`,contact_number FROM (`eworkers` left join `ecenter` on(`eworkers`.`centerId` = `ecenter`.`centerId`));

-- --------------------------------------------------------

--
-- Structure for view `center_workers_schoolyear`
--
DROP VIEW IF EXISTS `center_workers_schoolyear`;

CREATE VIEW `center_workers_schoolyear`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, `eschoolyear`.`YearId` AS `year_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name`, `eworkers`.`address` AS `worker_address`, `eschoolyear`.`YearStart` AS `class_start`, `eschoolyear`.`YearEnd` AS `class_end`, `ecenter`.`centerName` AS `center_name`, `eworkers`.`jobStatus` AS `job_status`, `eschoolyear`.`Status` AS `class_status`, (select count(0) from `eschoolyear_by_worker_students` where `eschoolyear_by_worker_students`.`workersId` = `eworkers`.`workersId` and `eschoolyear_by_worker_students`.`YearId` = `eschoolyear_by_worker`.`YearId`) AS `total_students` FROM (((`eworkers` join `eschoolyear_by_worker` on(`eschoolyear_by_worker`.`workersId` = `eworkers`.`workersId`)) join `eschoolyear` on(`eschoolyear`.`YearId` = `eschoolyear_by_worker`.`YearId`)) join `ecenter` on(`ecenter`.`centerId` = `eworkers`.`centerId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `center_schoolyear`
--
DROP VIEW IF EXISTS `center_schoolyear`;


CREATE VIEW center_schoolyear as SELECT DISTINCT `ecenter`.`centerId` AS `center_id`, `ecenter`.`centerName` AS `center_name`, `ecenter`.`barangay` AS `barangay`, `ecenter`.`centerAddress` AS `center_address`, (select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId` AND center_students_schoolyear.gender = 1 ) AS `total_students_boys`,(select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId` AND center_students_schoolyear.gender = 2 ) AS `total_students_girls`,(select count(0) from `center_students_schoolyear` where `center_students_schoolyear`.`center_id` = `ecenter`.`centerId` ) AS `total_students`,(select worker_name from center_workers WHERE center_workers.center_id = ecenter.centerId) as worker_name,(select center_workers.contact_number from center_workers WHERE center_workers.center_id = ecenter.centerId) as contact_number FROM `ecenter` ORDER BY `barangay`ASC;
-- --------------------------------------------------------

--
-- Structure for view `estudents`
--
DROP VIEW IF EXISTS `estudents`;

CREATE VIEW `estudents`  AS SELECT DISTINCT `cs`.`student_id` AS `student_id`, `cs`.`center_id` AS `center_id`, `cs`.`worker_id` AS `worker_id`, `cs`.`year_id` AS `year_id`, `cs`.`student_type` AS `student_type`, `cs`.`student_name` AS `student_name`, `cs`.`class_start` AS `class_start`, `cs`.`class_end` AS `class_end`, `ep`.`birthDate` AS `birthdate`, `ep`.`gender` AS `gender`, `ep`.`barangay` AS `barangay` FROM (`center_students_schoolyear` `cs` join `epupils` `ep` on(`cs`.`student_id` = `ep`.`pupilsId`)) GROUP BY `cs`.`student_id` ORDER BY `cs`.`year_id` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `eworkers_inactive`
--
DROP VIEW IF EXISTS `eworkers_inactive`;

CREATE VIEW `eworkers_inactive`  AS SELECT DISTINCT `eworkers`.`workersId` AS `worker_id`, `eworkers`.`centerId` AS `center_id`, concat(`eworkers`.`lName`,', ',`eworkers`.`fName`,' ',`eworkers`.`mName`,' ',`eworkers`.`ext`) AS `worker_name` FROM `eworkers` WHERE !(`eworkers`.`workersId` in (select `eschoolyear_by_worker`.`workersId` from `eschoolyear_by_worker`)) ;
