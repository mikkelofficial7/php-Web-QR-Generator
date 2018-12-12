
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT ,
  `user_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL ,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL ,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL ,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL ,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL ,
  `user_job` text CHARACTER SET utf8 NOT NULL,
  `user_qrcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ci_users' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--

INSERT INTO `ci_users` (`user_id`, `user_username`, `user_password`, `user_name`, `user_email`, `user_address`, `user_job`, `user_qrcode`) VALUES
(1, 'webeasystep', 'ce1c343dcwrwr2sfsfsf324', 'ahmed fakhr', 'info@webeasystep.com', 'Cairo,Egypt', 'php developer', '')


