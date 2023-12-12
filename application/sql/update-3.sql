

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_assessment` date NOT NULL,
  `domain` varchar(50) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `raw_score` int(3) NOT NULL,
  `scaled_score` int(3) NOT NULL,
  `standard_score` int(3) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `student_id`, `date_assessment`, `domain`, `answer`, `raw_score`, `scaled_score`, `standard_score`, `type`) VALUES
(6, 3, '2023-11-02', 'fine_motor', '[\"10\"]', 1, 1, 0, 1),
(7, 3, '2023-11-02', 'fine_motor', '[\"10\"]', 1, 1, 0, 2),
(8, 3, '2023-11-10', 'gross_motor', '[\"9\",\"8\"]', 2, 1, 0, 3),
(9, 3, '2023-11-04', 'self_help', '[\"11\"]', 1, 1, 0, 1),
(10, 3, '2023-11-04', 'self_help', '[\"11\"]', 1, 1, 0, 2),
(11, 7, '2023-11-10', 'gross_motor', '[\"9\"]', 1, 1, 0, 1),
(12, 7, '2023-11-10', 'gross_motor', '[\"8\"]', 1, 1, 0, 2),
(13, 7, '2023-11-10', 'gross_motor', '[\"9\",\"8\"]', 2, 1, 0, 3),
(14, 306, '2023-11-01', 'gross_motor', '[\"9\",\"8\"]', 2, 0, 0, 1),
(15, 306, '2023-11-01', 'gross_motor', '[\"8\"]', 1, 0, 0, 2),
(16, 6, '2023-11-02', 'gross_motor', '[\"9\",\"8\"]', 2, 1, 0, 1),
(17, 306, '2023-11-04', 'gross_motor', '[\"9\",\"8\"]', 2, 0, 0, 3),
(18, 306, '2023-11-04', 'fine_motor', '[\"10\"]', 1, 0, 0, 1),
(19, 3, '2023-11-10', 'expressive_lang', '[\"23\"]', 1, 2, 0, 1),
(20, 3, '2023-11-10', 'expressive_lang', '[\"23\"]', 1, 2, 0, 2),
(21, 3, '2023-11-01', 'gross_motor', '[\"9\",\"8\",\"26\"]', 3, 1, 0, 1),
(22, 3, '2023-11-08', 'gross_motor', '[\"9\",\"26\"]', 2, 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ass_domain_question`
--

CREATE TABLE `ass_domain_question` (
  `id` int(11) NOT NULL,
  `domain` varchar(30) DEFAULT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `step` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ass_domain_question`
--

INSERT INTO `ass_domain_question` (`id`, `domain`, `question`, `description`, `step`) VALUES
(8, 'gross_motor', 'Hello World.', '', 2),
(9, 'gross_motor', 'Hi', '', 1),
(10, 'fine_motor', 'Hi', '', 0),
(11, 'self_help', 'Hi', '', 0),
(23, 'expressive_lang', 'Espreesiv question', '', 0),
(24, 'social_emotion', 'Essocial mo na yan', '', 0),
(25, 'cognitive', 'hi cog ni ', '', 0),
(26, 'gross_motor', 'ano naman', 'yan ha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ass_raw_score`
--

CREATE TABLE `ass_raw_score` (
  `id` int(11) NOT NULL,
  `gross_motor` varchar(100) DEFAULT NULL,
  `fine_motor` varchar(100) DEFAULT NULL,
  `self_help` varchar(100) DEFAULT NULL,
  `receiptive_lang` varchar(100) DEFAULT NULL,
  `expressive_lang` varchar(100) DEFAULT NULL,
  `cognitive` varchar(100) DEFAULT NULL,
  `social_emotion` varchar(100) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `date_assessment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ass_raw_score`
--

INSERT INTO `ass_raw_score` (`id`, `gross_motor`, `fine_motor`, `self_help`, `receiptive_lang`, `expressive_lang`, `cognitive`, `social_emotion`, `student_id`, `type`, `date_assessment`) VALUES
(2, '[\"9\"]', '[\"10\"]', NULL, NULL, NULL, NULL, NULL, 3, 1, '2023-11-01'),
(8, '[\"9\",\"8\"]', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_raw_score`
-- (See below for the actual view)
--


-- --------------------------------------------------------

--
-- Structure for view `v_raw_score`
--
DROP VIEW IF EXISTS `v_raw_score`;

CREATE VIEW `v_raw_score`  AS SELECT `t`.`student_id` AS `student_id`, `t`.`date_assessment` AS `date_assessment`, `t`.`domain` AS `domain`, (select `t1`.`raw_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 1 limit 1) AS `raw_score_1`, (select `t1`.`scaled_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 1 limit 1) AS `scaled_score_1`, (select `t1`.`raw_score` from `assessment` `t1` where `t`.`student_id` = `t1`.`student_id` and `t1`.`domain` = `t`.`domain` and `t1`.`type` = 2 limit 1) AS `raw_score_2`, (select `t2`.`scaled_score` from `assessment` `t2` where `t`.`student_id` = `t2`.`student_id` and `t2`.`domain` = `t`.`domain` and `t2`.`type` = 2 limit 1) AS `scaled_score_2`, (select `t3`.`raw_score` from `assessment` `t3` where `t`.`student_id` = `t3`.`student_id` and `t`.`domain` = `t`.`domain` and `t3`.`type` = 3 limit 1) AS `raw_score_3`, (select `t3`.`scaled_score` from `assessment` `t3` where `t`.`student_id` = `t3`.`student_id` and `t3`.`domain` = `t`.`domain` and `t3`.`type` = 3 limit 1) AS `scaled_score_3` FROM `assessment` AS `t` GROUP BY `t`.`domain`, `t`.`student_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_sum_scaled_score`
--
DROP VIEW IF EXISTS `v_sum_scaled_score`;

CREATE VIEW `v_sum_scaled_score`  AS SELECT sum(`t1`.`scaled_score`) AS `sum_scaled_score`, `t1`.`student_id` AS `student_id`, `t1`.`type` AS `type`, `t1`.`date_assessment` AS `date_assessment`, (select `cs`.`worker_id` from `center_students_schoolyear` `cs` where `cs`.`student_id` = `t1`.`student_id`) AS `worker_id`, (select `cs`.`year_id` from `center_students_schoolyear` `cs` where `cs`.`student_id` = `t1`.`student_id`) AS `year_id` FROM `assessment` AS `t1` GROUP BY `t1`.`student_id`, `t1`.`type` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_domain_question`
--
ALTER TABLE `ass_domain_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_raw_score`
--
ALTER TABLE `ass_raw_score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ass_domain_question`
--
ALTER TABLE `ass_domain_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ass_raw_score`
--
ALTER TABLE `ass_raw_score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
