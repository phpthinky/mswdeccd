
CREATE TABLE `e_feeding` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_feeding` date NOT NULL,
  `drinks` varchar(50) NOT NULL,
  `foods` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_immunization`
--

CREATE TABLE `e_immunization` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_immunization` date NOT NULL,
  `type_immunization` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `remarks` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `e_weighing`;
CREATE TABLE `e_weighing` (
  `id` int(11) NOT NULL,
  `date_weighing` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `weight` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `wfa` varchar(5) NOT NULL,
  `hfa` varchar(5) NOT NULL,
  `wfh` varchar(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `e_feeding`
--
ALTER TABLE `e_feeding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_immunization`
--
ALTER TABLE `e_immunization`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_feeding`
--
ALTER TABLE `e_feeding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_immunization`
--
ALTER TABLE `e_immunization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- Indexes for dumped tables
--

--
-- Indexes for table `e_weighing`
--
ALTER TABLE `e_weighing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e_weighing`
--
ALTER TABLE `e_weighing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
