#
# TABLE STRUCTURE FOR: Pesonal_loan_information
#

DROP TABLE IF EXISTS `Pesonal_loan_information`;

CREATE TABLE `Pesonal_loan_information` (
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(30) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `Pesonal_loan_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('L1PMD8G982', 'Tarek Vai', '0187774634', 'Farmgate,Dhaka', '1');
INSERT INTO `Pesonal_loan_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('1VVO7PVPIQ', 'Tanzil Ahmads', '3453456345634', '76 Newyork, Denmark', '1');
INSERT INTO `Pesonal_loan_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('TIT1QLU8H3', 'johan', '53463456', '98 Green Road,Farmgate', '1');


#
# TABLE STRUCTURE FOR: account_2
#

DROP TABLE IF EXISTS `account_2`;

CREATE TABLE `account_2` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(40) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` float NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('1', 'Supplier', '2017-10-10 12:09:21', '1');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('2', 'Customer', '2017-10-10 12:09:35', '2');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('3', 'Office', '2017-10-10 12:10:14', '3');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('4', 'Loan', '2017-10-10 12:13:24', '4');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('5', 'Labor Bill', '2017-10-25 14:37:48', '3');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('6', 'Office Rent', '2017-10-25 14:38:15', '3');
INSERT INTO `account_2` (`account_id`, `account_name`, `created_at`, `parent_id`) VALUES ('7', 'ddd', '2017-10-31 11:14:42', '1');


#
# TABLE STRUCTURE FOR: accounts
#

DROP TABLE IF EXISTS `accounts`;

CREATE TABLE `accounts` (
  `account_id` varchar(220) NOT NULL,
  `account_table_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`account_id`, `account_table_name`, `account_name`, `status`) VALUES ('R4YJJ3MXRC', 'outflow_pt3vxiow9x', 'Customer', '1');
INSERT INTO `accounts` (`account_id`, `account_table_name`, `account_name`, `status`) VALUES ('ZVWPEP1J1W', 'inflow_yh5i8w9oea', 'customar payment', '2');
INSERT INTO `accounts` (`account_id`, `account_table_name`, `account_name`, `status`) VALUES ('RE248GHTEZ', 'outflow_1td1fz8uvv', 'Supplier Payment', '1');


#
# TABLE STRUCTURE FOR: bank_add
#

DROP TABLE IF EXISTS `bank_add`;

CREATE TABLE `bank_add` (
  `bank_id` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ac_name` varchar(250) DEFAULT NULL,
  `ac_number` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `signature_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bank_add` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES ('DCMHATDNVW', 'Duchbangla Banks', 'fgdfg dfgdfg', 'test12354567', 'Dhanmondi', 'http://farukandbrothers.com/my-assets/image/logo/91846f062bfda8d0d4eb2aee02f39437.jpg', '1');
INSERT INTO `bank_add` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES ('U72XGTBMTE', 'Agrani bank', 'bdtask123', 'bdt1263456', 'Kawran Bazar', 'http://farukandbrothers.com/my-assets/image/logo/340c5b6661391a9efd57aef74fb8933b.jpg', '1');
INSERT INTO `bank_add` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES ('873GO7X38D', 'islami Bnak', 'gddfgd', '43534563456345', 'Dhakas', 'http://farukandbrothers.com/my-assets/image/logo/2b5c4be0d187cede95e3489f0e786db7.png', '1');
INSERT INTO `bank_add` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES ('8XRLB6YVU8', 'uttara', 'dfgdsfg', '34523452345', 'dfgdfgsdas', '', '1');
INSERT INTO `bank_add` (`bank_id`, `bank_name`, `ac_name`, `ac_number`, `branch`, `signature_pic`, `status`) VALUES ('DJTQEQH2WR', 'City Bank', 'bdtask', '4534534634634', 'Dhaka', 'http://farukandbrothers.com/my-assets/image/logo/356121f59e3ce8f91bf5148ec7c1cafe.jpg', '1');


#
# TABLE STRUCTURE FOR: bank_summary
#

DROP TABLE IF EXISTS `bank_summary`;

CREATE TABLE `bank_summary` (
  `bank_id` varchar(250) DEFAULT NULL,
  `description` text,
  `deposite_id` varchar(250) DEFAULT NULL,
  `date` varchar(250) DEFAULT NULL,
  `ac_type` varchar(50) DEFAULT NULL,
  `dr` float DEFAULT NULL,
  `cr` float DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `bank_summary` (`bank_id`, `description`, `deposite_id`, `date`, `ac_type`, `dr`, `cr`, `ammount`, `status`) VALUES ('LM3YIYOKQ2', '', '3426565', '23-10-2017', 'Debit(+)', '543', NULL, '543', '1');
INSERT INTO `bank_summary` (`bank_id`, `description`, `deposite_id`, `date`, `ac_type`, `dr`, `cr`, `ammount`, `status`) VALUES ('FRUH5553OV', 'dfg', '121', '23-10-2017', 'Credit(-)', NULL, '4500', '4500', '1');
INSERT INTO `bank_summary` (`bank_id`, `description`, `deposite_id`, `date`, `ac_type`, `dr`, `cr`, `ammount`, `status`) VALUES ('U72XGTBMTE', '', '5345324523', '23-10-2017', 'Debit(+)', '45', NULL, '45', '1');
INSERT INTO `bank_summary` (`bank_id`, `description`, `deposite_id`, `date`, `ac_type`, `dr`, `cr`, `ammount`, `status`) VALUES ('DJTQEQH2WR', '', '45646546', '31-10-2017', 'Debit(+)', '7000', NULL, '7000', '1');


#
# TABLE STRUCTURE FOR: cheque_manger
#

DROP TABLE IF EXISTS `cheque_manger`;

CREATE TABLE `cheque_manger` (
  `cheque_id` varchar(100) NOT NULL,
  `transection_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `bank_id` varchar(100) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `date` varchar(250) DEFAULT NULL,
  `transection_type` varchar(100) NOT NULL,
  `cheque_status` int(10) NOT NULL,
  `amount` float NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`cheque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: company_information
#

DROP TABLE IF EXISTS `company_information`;

CREATE TABLE `company_information` (
  `company_id` varchar(250) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `company_information` (`company_id`, `company_name`, `email`, `address`, `mobile`, `website`, `status`) VALUES ('NOILG8EGCRXXBWUEUQBM', 'BDTASK', 'bdtask@gmail.com', '98,Green Road,Dhaka', '0730164623', 'http://www.bdtask.com', '1');


#
# TABLE STRUCTURE FOR: customer_information
#

DROP TABLE IF EXISTS `customer_information`;

CREATE TABLE `customer_information` (
  `customer_id` varchar(250) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_mobile` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1=paid,2=credit',
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('8ZBLA3COJM2NT49', 'Shahidul Islam', 'Mirpur', '01714287187', 'shahidul@gmail.com', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('JMVQJWU1FAEQHI5', 'Universal Electic', '', '', '', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('F34YNOU3TJSAO67', 'S.S Enterprise', 'Sundorban Squre Super Market\r\nFirst Floor ,Shop # A15/16A ', '0235145454', '', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('HS28Q2LCDZHWDS5', 'S.R Enterprise ', 'Sundorban Squre Super Market\r\nFirst Floor ,Shop # A18/19 ', '015646868678', '', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('YWYINLCAIU4Z7YA', 'Hannan Traders', 'Sundorban Squre Super Market First Floor ,Shop # Nai', '', '', '1');
INSERT INTO `customer_information` (`customer_id`, `customer_name`, `customer_address`, `customer_mobile`, `customer_email`, `status`) VALUES ('6UDTC3KDE166G4C', 'Johan Doye', '98 Green Road,Farmgate', '908764566789', 'johan@gmail.com', '2');


#
# TABLE STRUCTURE FOR: customer_ledger
#

DROP TABLE IF EXISTS `customer_ledger`;

CREATE TABLE `customer_ledger` (
  `transaction_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `invoice_no` varchar(100) DEFAULT NULL,
  `receipt_no` varchar(50) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL,
  KEY `receipt_no` (`receipt_no`),
  KEY `receipt_no_2` (`receipt_no`),
  KEY `receipt_no_3` (`receipt_no`),
  KEY `receipt_no_4` (`receipt_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('KZHL6UU4VO', 'JMVQJWU1FAEQHI5', 'NA', NULL, '50000', 'Previous adjustment with software', 'NA', 'NA', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('5TJARPM6IN', 'F34YNOU3TJSAO67', 'NA', NULL, '61250', 'Previous adjustment with software', 'NA', 'NA', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('2ZVLDR3IJ5', 'HS28Q2LCDZHWDS5', 'NA', NULL, '365840', 'Previous adjustment with software', 'NA', 'NA', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('R1C5ETPYMI', 'YWYINLCAIU4Z7YA', 'NA', NULL, '0', 'Previous adjustment with software', 'NA', 'NA', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('PNOBOTZCL9OWBP5', 'YWYINLCAIU4Z7YA', '6678792612', NULL, '111600', 'ITP', '1', '', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('VH112LNS1EJJK75', 'JMVQJWU1FAEQHI5', '123', NULL, '2000', 'Cash', '1', '', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('L2FOE13IDSYADC3', 'HS28Q2LCDZHWDS5', '123', NULL, '3000', 'no des', '1', '', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('FSQ9O99EGHTRE9F', 'F34YNOU3TJSAO67', '123', NULL, '1000', '', '1', '', '25-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('WQVYCRJMN86GI17', 'JMVQJWU1FAEQHI5', '1979956835', NULL, '25800', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('2IXO5N7VJFSJ7W3', 'F34YNOU3TJSAO67', '2191413693', NULL, '45720', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('KTASGDEO2EVT8FP', 'HS28Q2LCDZHWDS5', '6476889255', NULL, '35200', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('FCW4MH999Y3A75X', 'HS28Q2LCDZHWDS5', '1441514161', NULL, '35200', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('C5JJ9CNCRQN6ZQR', 'HS28Q2LCDZHWDS5', '1161734131', NULL, '35200', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('G36CPLKONRDN18L', 'HS28Q2LCDZHWDS5', '4672383343', NULL, '35200', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('T71A2WYSBL1OQFJ', 'F34YNOU3TJSAO67', '9455792915', NULL, '1074140', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('UPV5HNEO3MK8ZOW', 'F34YNOU3TJSAO67', '4981452674', NULL, '1074140', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('GVH6YY7265ISKCI', 'F34YNOU3TJSAO67', '4124575573', NULL, '73080', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('78SO49VW5EWVQLG', 'F34YNOU3TJSAO67', '1824634358', NULL, '73080', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('6WBA2S3PR7B5KOU', 'F34YNOU3TJSAO67', '5866553993', NULL, '58800', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('VNCC412Q9ORNR2F', 'JMVQJWU1FAEQHI5', '2827821423', NULL, '81600', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('8GX996WGH6AH12O', '8ZBLA3COJM2NT49', '5696739753', NULL, '34500', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('CDXCOWXKMR3YAYO', 'JMVQJWU1FAEQHI5', '8771668649', NULL, '71760', 'ITP', '1', '', '26-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('AGVJG2Y23Q8AHZD', 'JMVQJWU1FAEQHI5', '3276699692', NULL, '71960', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('UED29RCG1321ZZO', 'F34YNOU3TJSAO67', '1612663242', NULL, '71960', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('YF8XXXZX1ACGXY3', 'F34YNOU3TJSAO67', '2838558471', NULL, '119400', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('7ZW9G3F6A3ZBAA8', 'F34YNOU3TJSAO67', '8332727433', NULL, '777777', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('5CUCOA9L3HXZTZ3', 'JMVQJWU1FAEQHI5', '8861346923', NULL, '15200', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('P3YOLNTKI1R13YT', '8ZBLA3COJM2NT49', '1315834339', NULL, '7600', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('BM1RD29M3U7VQ1B', '8ZBLA3COJM2NT49', '6812413211', NULL, '33600', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('4BPPVCALP98XOOY', 'JMVQJWU1FAEQHI5', '2841757611', NULL, '151200', 'ITP', '1', '', '27-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('37W1572K5SAS3SK', '8ZBLA3COJM2NT49', NULL, '', '450', 'dfgdsgf', '1', '', '31-10-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('PDPYVAPZXT3ALZF', '8ZBLA3COJM2NT49', '2955339992', NULL, '48960', 'ITP', '1', '', '01-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('3FL6WVVYBJ2IXTG', '8ZBLA3COJM2NT49', '7774413469', NULL, '10000', 'ITP', '1', '', '01-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('KECMDNQWIW9UI7L', '8ZBLA3COJM2NT49', '8829776633', NULL, '8000', 'ITP', '1', '', '01-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('VAH59FVGOXCI2KV', '8ZBLA3COJM2NT49', NULL, '6R7MP8LNFF', '70000', 'ITP', '1', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('VAH59FVGOXCI2KV', '8ZBLA3COJM2NT49', '9928459451', NULL, '70560', '', '', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('QAO1QIY19Q7RKTH', '', NULL, 'CT2U6E74D8', '46000', 'ITP', '1', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('QAO1QIY19Q7RKTH', '', '4991415829', NULL, '46000', '', '', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('DU843BZYE76XUHX', '', NULL, '828U4QGHEK', '46000', 'ITP', '1', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('DU843BZYE76XUHX', '', '6471686685', NULL, '46000', '', '', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('XA89GZE1P5V51DE', '', NULL, '6NJUFLJTAH', '46000', 'ITP', '1', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('XA89GZE1P5V51DE', '', '7579931679', NULL, '46000', '', '', '', '02-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('1MZZRFMMRXQ37VJ', '8ZBLA3COJM2NT49', NULL, 'B63HSVBSXM', '63000', 'ITP', '1', '', '04-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('1MZZRFMMRXQ37VJ', '8ZBLA3COJM2NT49', '8914637431', NULL, '63000', '', '', '', '04-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('YB2DKLKGZPJ5YF2', 'JMVQJWU1FAEQHI5', NULL, 'BHRAJTKKIT', '120920', 'ITP', '1', '', '04-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('43DXTMZASI4BTMN', 'JMVQJWU1FAEQHI5', '3245145265', '5PJS9XM31B', '125000', 'ITP', '1', '', '06-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('OK5UDZV15MSWLLL', 'JMVQJWU1FAEQHI5', NULL, 'G1ETNT5ZWT', '110000', 'ITP', '1', '', '04-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('43DXTMZASI4BTMN', 'JMVQJWU1FAEQHI5', '3245145265', NULL, '125000', '', '', '', '06-11-2017', '1');
INSERT INTO `customer_ledger` (`transaction_id`, `customer_id`, `invoice_no`, `receipt_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('AXLIJM3ZRU', '6UDTC3KDE166G4C', 'NA', NULL, '500', 'Previous adjustment with software', 'NA', 'NA', '06-11-2017', '1');


#
# TABLE STRUCTURE FOR: customer_transection_summary
#

DROP TABLE IF EXISTS `customer_transection_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `customer_transection_summary` AS select `customer_information`.`customer_name` AS `customer_name`,`customer_ledger`.`customer_id` AS `customer_id`,'credit' AS `type`,sum(-(`customer_ledger`.`amount`)) AS `amount` from (`customer_ledger` join `customer_information` on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`))) where (isnull(`customer_ledger`.`receipt_no`) and (`customer_ledger`.`status` = 1)) group by `customer_ledger`.`customer_id` union all select `customer_information`.`customer_name` AS `customer_name`,`customer_ledger`.`customer_id` AS `customer_id`,'debit' AS `type`,sum(`customer_ledger`.`amount`) AS `amount` from (`customer_ledger` join `customer_information` on((`customer_information`.`customer_id` = `customer_ledger`.`customer_id`))) where (isnull(`customer_ledger`.`invoice_no`) and (`customer_ledger`.`status` = 1)) group by `customer_ledger`.`customer_id`;

latin1_swedish_ci;

INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Johan Doye', '6UDTC3KDE166G4C', 'credit', '-500');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Shahidul Islam', '8ZBLA3COJM2NT49', 'credit', '-276220');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('S.S Enterprise', 'F34YNOU3TJSAO67', 'credit', '-3430347');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('S.R Enterprise ', 'HS28Q2LCDZHWDS5', 'credit', '-509640');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Universal Electic', 'JMVQJWU1FAEQHI5', 'credit', '-594520');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Hannan Traders', 'YWYINLCAIU4Z7YA', 'credit', '-111600');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Shahidul Islam', '8ZBLA3COJM2NT49', 'debit', '133450');
INSERT INTO `customer_transection_summary` (`customer_name`, `customer_id`, `type`, `amount`) VALUES ('Universal Electic', 'JMVQJWU1FAEQHI5', 'debit', '230920');


#
# TABLE STRUCTURE FOR: daily_banking_add
#

DROP TABLE IF EXISTS `daily_banking_add`;

CREATE TABLE `daily_banking_add` (
  `banking_id` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `bank_id` varchar(100) NOT NULL,
  `deposit_type` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: daily_closing
#

DROP TABLE IF EXISTS `daily_closing`;

CREATE TABLE `daily_closing` (
  `closing_id` varchar(255) NOT NULL,
  `last_day_closing` float NOT NULL,
  `cash_in` float NOT NULL,
  `cash_out` float NOT NULL,
  `date` varchar(250) NOT NULL,
  `amount` float NOT NULL,
  `adjustment` float NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: head_office_deposit
#

DROP TABLE IF EXISTS `head_office_deposit`;

CREATE TABLE `head_office_deposit` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`transection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: inflow_92mizdldrv
#

DROP TABLE IF EXISTS `inflow_92mizdldrv`;

CREATE TABLE `inflow_92mizdldrv` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `amount` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`transection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('1MZZRFMMRXQ37VJ', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '63000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('2IXO5N7VJFSJ7W3', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '45720', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('3FL6WVVYBJ2IXTG', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '10000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('43DXTMZASI4BTMN', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '125000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('4BPPVCALP98XOOY', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '151200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('5CUCOA9L3HXZTZ3', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '15200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('6WBA2S3PR7B5KOU', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '58800', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('78SO49VW5EWVQLG', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '73080', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('7ZW9G3F6A3ZBAA8', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '777777', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('8GX996WGH6AH12O', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '34500', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('AGVJG2Y23Q8AHZD', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '71960', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('BM1RD29M3U7VQ1B', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '33600', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('C5JJ9CNCRQN6ZQR', 'HS28Q2LCDZHWDS5', '1', '0000-00-00 00:00:00', '35200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('CDXCOWXKMR3YAYO', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '71760', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('DU843BZYE76XUHX', '', '1', '0000-00-00 00:00:00', '46000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('FCW4MH999Y3A75X', 'HS28Q2LCDZHWDS5', '1', '0000-00-00 00:00:00', '35200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('FSQ9O99EGHTRE9F', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '1000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('G36CPLKONRDN18L', 'HS28Q2LCDZHWDS5', '1', '0000-00-00 00:00:00', '35200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('GVH6YY7265ISKCI', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '73080', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('KECMDNQWIW9UI7L', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '8000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('KTASGDEO2EVT8FP', 'HS28Q2LCDZHWDS5', '1', '0000-00-00 00:00:00', '35200', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('L2FOE13IDSYADC3', 'HS28Q2LCDZHWDS5', '1', '0000-00-00 00:00:00', '3000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('OK5UDZV15MSWLLL', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '110000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('P3YOLNTKI1R13YT', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '7600', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('PDPYVAPZXT3ALZF', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '48960', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('PNOBOTZCL9OWBP5', 'YWYINLCAIU4Z7YA', '1', '0000-00-00 00:00:00', '111600', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('QAO1QIY19Q7RKTH', '', '1', '0000-00-00 00:00:00', '46000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('T71A2WYSBL1OQFJ', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '1074140', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('UED29RCG1321ZZO', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '71960', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('UPV5HNEO3MK8ZOW', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '1074140', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('VAH59FVGOXCI2KV', '8ZBLA3COJM2NT49', '1', '0000-00-00 00:00:00', '70000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('VH112LNS1EJJK75', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '2000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('VNCC412Q9ORNR2F', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '81600', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('WQVYCRJMN86GI17', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '25800', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('XA89GZE1P5V51DE', '', '1', '0000-00-00 00:00:00', '46000', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('YB2DKLKGZPJ5YF2', 'JMVQJWU1FAEQHI5', '1', '0000-00-00 00:00:00', '120920', 'ITP', '1');
INSERT INTO `inflow_92mizdldrv` (`transection_id`, `tracing_id`, `payment_type`, `date`, `amount`, `description`, `status`) VALUES ('YF8XXXZX1ACGXY3', 'F34YNOU3TJSAO67', '1', '0000-00-00 00:00:00', '119400', 'ITP', '1');


#
# TABLE STRUCTURE FOR: inflow_yh5i8w9oea
#

DROP TABLE IF EXISTS `inflow_yh5i8w9oea`;

CREATE TABLE `inflow_yh5i8w9oea` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`transection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: invoice
#

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice` (
  `invoice_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `total_amount` float NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `total_discount` float DEFAULT NULL COMMENT 'total invoice discount',
  `status` int(2) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('5352642796', 'JMVQJWU1FAEQHI5', '25-10-2017', '312400', '1000', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2212884554', 'HS28Q2LCDZHWDS5', '25-10-2017', '183860', '1001', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1662246136', 'F34YNOU3TJSAO67', '25-10-2017', '168000', '1002', '3400', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6678792612', 'YWYINLCAIU4Z7YA', '25-10-2017', '111600', '1003', '6000', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1979956835', 'JMVQJWU1FAEQHI5', '26-10-2017', '25800', '1004', '600', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2191413693', 'F34YNOU3TJSAO67', '26-10-2017', '45720', '1005', '3240', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6476889255', 'HS28Q2LCDZHWDS5', '26-10-2017', '35200', '1006', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1441514161', 'HS28Q2LCDZHWDS5', '26-10-2017', '35200', '1007', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1161734131', 'HS28Q2LCDZHWDS5', '26-10-2017', '35200', '1008', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4672383343', 'HS28Q2LCDZHWDS5', '26-10-2017', '35200', '1009', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('9455792915', 'F34YNOU3TJSAO67', '26-10-2017', '1074140', '1010', '37840', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4981452674', 'F34YNOU3TJSAO67', '26-10-2017', '1074140', '1011', '37840', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6391267778', '8ZBLA3COJM2NT49', '26-10-2017', '132000', '1012', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('5717642987', '8ZBLA3COJM2NT49', '26-10-2017', '132000', '1013', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4124575573', 'F34YNOU3TJSAO67', '26-10-2017', '73080', '1014', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1824634358', 'F34YNOU3TJSAO67', '26-10-2017', '73080', '1015', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('5866553993', 'F34YNOU3TJSAO67', '26-10-2017', '58800', '1016', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2827821423', 'JMVQJWU1FAEQHI5', '26-10-2017', '81600', '1017', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1593665589', 'JMVQJWU1FAEQHI5', '26-10-2017', '55440', '1018', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('5696739753', '8ZBLA3COJM2NT49', '26-10-2017', '34500', '1019', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('5577868966', 'F34YNOU3TJSAO67', '26-10-2017', '202440', '1020', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('8771668649', 'JMVQJWU1FAEQHI5', '26-10-2017', '71760', '1021', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('3276699692', 'JMVQJWU1FAEQHI5', '27-10-2017', '71960', '1022', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1612663242', 'F34YNOU3TJSAO67', '27-10-2017', '71960', '1023', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2838558471', 'F34YNOU3TJSAO67', '27-10-2017', '119400', '1024', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('8332727433', 'F34YNOU3TJSAO67', '27-10-2017', '35280', '1025', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('8861346923', 'JMVQJWU1FAEQHI5', '27-10-2017', '15200', '1026', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1315834339', '8ZBLA3COJM2NT49', '27-10-2017', '7600', '1027', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6812413211', '8ZBLA3COJM2NT49', '27-10-2017', '33600', '1028', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2841757611', 'JMVQJWU1FAEQHI5', '27-10-2017', '151200', '1029', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4895264789', '8ZBLA3COJM2NT49', '01-11-2017', '23000', '1030', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6766863919', '8ZBLA3COJM2NT49', '01-11-2017', '23000', '1031', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('3524631422', '8ZBLA3COJM2NT49', '01-11-2017', '32640', '1032', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('2955339992', '8ZBLA3COJM2NT49', '01-11-2017', '48960', '1033', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('7774413469', '8ZBLA3COJM2NT49', '01-11-2017', '48960', '1034', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('8829776633', '8ZBLA3COJM2NT49', '01-11-2017', '23000', '1035', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('9928459451', '8ZBLA3COJM2NT49', '02-11-2017', '70560', '1036', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('7192698317', '8ZBLA3COJM2NT49', '02-11-2017', '46000', '1037', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('7336959223', '', '02-11-2017', '46000', '1038', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4991415829', '', '02-11-2017', '46000', '1039', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('6471686685', '', '02-11-2017', '46000', '1040', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('7579931679', '', '02-11-2017', '46000', '1041', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('1732878644', '8ZBLA3COJM2NT49', '02-11-2017', '81600', '1042', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('4336416796', 'JMVQJWU1FAEQHI5', '02-11-2017', '34500', '1043', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('3517883984', '8ZBLA3COJM2NT49', '02-11-2017', '11500', '1044', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('8914637431', '8ZBLA3COJM2NT49', '04-11-2017', '63000', '1045', '0', '1');
INSERT INTO `invoice` (`invoice_id`, `customer_id`, `date`, `total_amount`, `invoice`, `total_discount`, `status`) VALUES ('3245145265', 'JMVQJWU1FAEQHI5', '06-11-2017', '125000', '1046', '0', '1');


#
# TABLE STRUCTURE FOR: invoice_details
#

DROP TABLE IF EXISTS `invoice_details`;

CREATE TABLE `invoice_details` (
  `invoice_details_id` varchar(100) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `cartoon` float DEFAULT NULL,
  `quantity` float NOT NULL,
  `rate` float NOT NULL,
  `supplier_rate` float DEFAULT NULL,
  `total_price` float NOT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `paid_amount` float DEFAULT '0',
  `due_amount` float NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL,
  PRIMARY KEY (`invoice_details_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('322178286179275', '5352642796', '63853613', '3', '120', '220', '210', '26400', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('461138664737916', '5352642796', '19226752', '2', '120', '210', '200', '25200', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('538746555262178', '5352642796', '63775648', '3', '180', '210', '200', '37800', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('515528485757447', '5352642796', '83517747', '5', '120', '680', '670', '81600', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('191964519925133', '5352642796', '13177442', '10', '500', '230', '220', '115000', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('974425263638473', '5352642796', '97255764', '2', '80', '190', '180', '15200', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('172267628511124', '5352642796', '67197783', '2', '40', '280', '260', '11200', '0', '0', '0', '312400', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('341884428717359', '2212884554', '63853613', '1', '40', '220', '210', '8800', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('828275396474739', '2212884554', '19226752', '1', '60', '210', '200', '12600', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('253232673444278', '2212884554', '83517747', '2', '48', '680', '670', '32640', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('151868497135417', '2212884554', '43238874', '2', '240', '98', '90', '23520', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('323645793137454', '2212884554', '97255764', '2', '80', '190', '180', '15200', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('359346175888428', '2212884554', '19226752', '3', '60', '280', '200', '16800', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('259414983286931', '2212884554', '67197783', '3', '60', '280', '260', '16800', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('355388986574316', '2212884554', '13177442', '5', '250', '230', '220', '57500', '0', '0', '0', '183860', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('958533333455387', '1662246136', '19226752', '10', '600', '210', '200', '126000', '5', '0', '0', '168000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('149154221344846', '1662246136', '63775648', '3', '180', '210', '200', '37800', '2', '0', '0', '168000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('531484717942579', '1662246136', '97255764', '1', '40', '190', '180', '7600', '1', '0', '0', '168000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('636596177883366', '6678792612', '43238874', '10', '1200', '98', '90', '117600', '5', '0', '111600', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('155631728614396', '1979956835', '63853613', '3', '120', '220', '210', '26400', '5', '0', '25800', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('722242451482752', '2191413693', '83517747', '3', '72', '680', '670', '48960', '45', '0', '45720', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('885926554243267', '6476889255', '63853613', '4', '160', '220', '210', '35200', '0', '0', '35200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('444871815965462', '1441514161', '63853613', '4', '160', '220', '210', '35200', '0', '0', '35200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('322374389453755', '1161734131', '63853613', '4', '160', '220', '210', '35200', '0', '0', '35200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('556411868186321', '4672383343', '63853613', '4', '160', '220', '210', '35200', '0', '0', '35200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('826966992472672', '9455792915', '63853613', '88', '3520', '220', '210', '774400', '10', '0', '1074140', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('994156449435622', '6391267778', '13177442', '1', '50', '230', '220', '11500', '0', '0', '0', '132000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('966516411331947', '5717642987', '13177442', '1', '50', '230', '220', '11500', '0', '0', '0', '132000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('338971382639286', '4124575573', '43238874', '3', '360', '98', '90', '35280', '0', '0', '73080', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('855473555817233', '1824634358', '43238874', '3', '360', '98', '90', '35280', '0', '0', '73080', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('854171667212512', '5866553993', '43238874', '3', '360', '98', '90', '35280', '0', '0', '58800', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('861626717588631', '2827821423', '83517747', '2', '48', '680', '670', '32640', '0', '0', '81600', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('773365631369671', '1593665589', '83517747', '2', '48', '680', '670', '32640', '0', '0', '0', '55440', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('273843313886851', '5696739753', '13177442', '3', '150', '230', '220', '34500', '0', '0', '34500', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('795182712765868', '5577868966', '83517747', '3', '72', '680', '670', '48960', '0', '0', '0', '202440', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('478889756713676', '8771668649', '83517747', '3', '72', '680', '670', '48960', '0', '0', '71760', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('693281518267137', '3276699692', '83517747', '3', '72', '680', '670', '48960', '0', '0', '71960', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('238761538477495', '3276699692', '13177442', '2', '100', '230', '220', '23000', '0', '0', '71960', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('927958128274588', '1612663242', '83517747', '3', '72', '680', '670', '48960', '0', '0', '71960', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('649728331918776', '1612663242', '13177442', '2', '100', '230', '220', '23000', '0', '0', '71960', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('149766959794642', '2838558471', '63775648', '3', '180', '210', '200', '37800', '0', '0', '119400', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('713779457157324', '2838558471', '83517747', '5', '120', '680', '670', '81600', '0', '0', '119400', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('454162994166898', '8332727433', '43238874', '3', '360', '98', '90', '35280', '0', '0', '777777', '-742497', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('536964741874475', '8861346923', '97255764', '2', '80', '190', '180', '15200', '0', '0', '15200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('838522543126448', '1315834339', '97255764', '1', '40', '190', '180', '7600', '0', '0', '7600', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('715781472513723', '6812413211', '67197783', '6', '120', '280', '260', '33600', '0', '0', '33600', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('587342536611462', '2841757611', '63775648', '3', '180', '210', '200', '37800', '0', '0', '151200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('442888991481135', '2841757611', '63775648', '5', '300', '210', '200', '63000', '0', '0', '151200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('773417659329356', '2841757611', '63775648', '4', '240', '210', '200', '50400', '0', '0', '151200', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('678866231252864', '4895264789', '13177442', '2', '100', '230', '220', '23000', '0', '0', '0', '23000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('795166525155278', '6766863919', '13177442', '2', '100', '230', '220', '23000', '0', '0', '0', '23000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('631275173539193', '3524631422', '83517747', '2', '48', '680', '670', '32640', '0', '0', '0', '32640', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('445173368791781', '2955339992', '83517747', '3', '72', '680', '670', '48960', '0', '0', '48960', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('811287854294549', '7774413469', '83517747', '3', '72', '680', '670', '48960', '0', '0', '10000', '38960', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('476215996973536', '8829776633', '13177442', '2', '100', '230', '220', '23000', '0', '0', '8000', '15000', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('771221723624248', '9928459451', '43238874', '6', '720', '98', '90', '70560', '0', '0', '70000', '560', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('325134538371951', '4991415829', '', '4', '200', '230', NULL, '46000', '0', '0', '46000', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('718484544434195', '6471686685', '', '4', '200', '230', NULL, '46000', '0', '0', '46000', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('533212811838913', '7579931679', '', '4', '200', '230', NULL, '46000', '0', '0', '46000', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('291532368921455', '8914637431', '19226752', '5', '300', '210', '200', '63000', '0', '0', '63000', '0', '1');
INSERT INTO `invoice_details` (`invoice_details_id`, `invoice_id`, `product_id`, `cartoon`, `quantity`, `rate`, `supplier_rate`, `total_price`, `discount`, `tax`, `paid_amount`, `due_amount`, `status`) VALUES ('427471376619854', '3245145265', '94999792', '5', '250', '500', '480', '125000', '0', NULL, '125000', '0', '1');


#
# TABLE STRUCTURE FOR: language
#

DROP TABLE IF EXISTS `language`;

CREATE TABLE `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` text NOT NULL,
  `english` text,
  `bangla` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=510 DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('1', 'user_profile', 'User Profile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('2', 'setting', 'Setting', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('3', 'language', 'Language', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('4', 'manage_users', 'Manage Users', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('5', 'add_user', 'Add User', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('6', 'manage_company', 'Manage Company', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('7', 'web_settings', 'Software Settings', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('8', 'manage_accounts', 'Manage Accounts', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('9', 'create_accounts', 'Create Office Account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('10', 'manage_bank', 'Manage Bank', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('11', 'add_new_bank', 'Add New Bank', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('12', 'settings', 'Bank', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('13', 'closing_report', 'Closing Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('14', 'closing', 'Closing', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('15', 'cheque_manager', 'Cheque Manager', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('16', 'accounts_summary', 'Accounts Summary', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('17', 'expense', 'Expense', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('18', 'income', 'Income', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('19', 'accounts', 'Accounts', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('20', 'stock_report', 'Stock Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('21', 'stock', 'Stock', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('22', 'pos_invoice', 'POS Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('23', 'manage_invoice', 'Manage Invoice ', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('24', 'new_invoice', 'New Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('25', 'invoice', 'Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('26', 'manage_purchase', 'Manage Purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('27', 'add_purchase', 'Add Purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('28', 'purchase', 'Purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('29', 'paid_customer', 'Paid Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('30', 'manage_customer', 'Manage Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('31', 'add_customer', 'Add Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('32', 'customer', 'Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('33', 'supplier_payment_actual', 'Supplier Payment Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('34', 'supplier_sales_summary', 'Supplier Sales Summary', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('35', 'supplier_sales_details', 'Supplier Sales Details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('36', 'supplier_ledger', 'Supplier Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('37', 'manage_supplier', 'Manage Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('38', 'add_supplier', 'Add Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('39', 'supplier', 'Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('40', 'product_statement', 'Product Statement', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('41', 'manage_product', 'Manage Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('42', 'add_product', 'Add Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('43', 'product', 'Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('44', 'manage_category', 'Manage Category', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('45', 'add_category', 'Add Category', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('46', 'category', 'Category', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('47', 'sales_report_product_wise', 'Sales Report (Product Wise)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('48', 'purchase_report', 'Purchase Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('49', 'sales_report', 'Sales Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('50', 'todays_report', 'Todays Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('51', 'report', 'Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('52', 'dashboard', 'Dashboard', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('53', 'online', 'Online', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('54', 'logout', 'Logout', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('55', 'change_password', 'Change Password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('56', 'total_purchase', 'Total Purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('57', 'total_amount', 'Total Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('58', 'supplier_name', 'Supplier Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('59', 'invoice_no', 'Invoice No', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('60', 'purchase_date', 'Purchase Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('61', 'todays_purchase_report', 'Todays Purchase Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('62', 'total_sales', 'Total Sales', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('63', 'customer_name', 'Customer Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('64', 'sales_date', 'Sales Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('65', 'todays_sales_report', 'Todays Sales Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('66', 'home', 'Home', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('67', 'todays_sales_and_purchase_report', 'Todays sales and purchase report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('68', 'total_ammount', 'Total Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('69', 'rate', 'Rate', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('70', 'product_model', 'Product Model', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('71', 'product_name', 'Product Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('72', 'search', 'Search', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('73', 'end_date', 'End Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('74', 'start_date', 'Start Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('75', 'total_purchase_report', 'Total Purchase Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('76', 'total_sales_report', 'Total Sales Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('77', 'total_seles', 'Total Sales', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('78', 'all_stock_report', 'All Stock Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('79', 'search_by_product', 'Search By Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('80', 'date', 'Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('81', 'print', 'Print', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('82', 'stock_date', 'Stock Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('83', 'print_date', 'Print Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('84', 'sales', 'Sales', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('85', 'price', 'Price', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('86', 'sl', 'SL.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('87', 'add_new_category', 'Add new category', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('88', 'category_name', 'Category Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('89', 'save', 'Save', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('90', 'delete', 'Delete', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('91', 'update', 'Update', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('92', 'action', 'Action', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('93', 'manage_your_category', 'Manage your category ', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('94', 'category_edit', 'Category Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('95', 'status', 'Status', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('96', 'active', 'Active', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('97', 'inactive', 'Inactive', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('98', 'save_changes', 'Save Changes', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('99', 'save_and_add_another', 'Save And Add Another', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('100', 'model', 'Model', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('101', 'supplier_price', 'Supplier Price', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('102', 'sell_price', 'Sell Price', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('103', 'image', 'Image', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('104', 'select_one', 'Select One', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('105', 'details', 'Details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('106', 'new_product', 'New Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('107', 'add_new_product', 'Add new product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('108', 'barcode', 'Barcode', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('109', 'qr_code', 'Qr-Code', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('110', 'product_details', 'Product Details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('111', 'manage_your_product', 'Manage your product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('112', 'product_edit', 'Product Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('113', 'edit_your_product', 'Edit your product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('114', 'cancel', 'Cancel', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('115', 'incl_vat', 'Incl. Vat', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('116', 'money', 'TK', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('117', 'grand_total', 'Grand Total', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('118', 'quantity', 'Quantity', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('119', 'product_report', 'Product Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('120', 'product_sales_and_purchase_report', 'Product sales and purchase report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('121', 'previous_stock', 'Previous Stock', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('122', 'out', 'Out', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('123', 'in', 'In', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('124', 'to', 'To', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('125', 'previous_balance', 'Previous Balance', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('126', 'customer_address', 'Customer Address', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('127', 'customer_mobile', 'Customer Mobile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('128', 'customer_email', 'Customer Email', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('129', 'add_new_customer', 'Add new customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('130', 'balance', 'Balance', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('131', 'mobile', 'Mobile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('132', 'address', 'Address', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('133', 'manage_your_customer', 'Manage your customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('134', 'customer_edit', 'Customer Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('135', 'paid_customer_list', 'Paid Customer List', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('136', 'ammount', 'Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('137', 'customer_ledger', 'Customer Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('138', 'manage_customer_ledger', 'Manage Customer Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('139', 'customer_information', 'Customer Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('140', 'debit_ammount', 'Debit Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('141', 'credit_ammount', 'Credit Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('142', 'balance_ammount', 'Balance Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('143', 'receipt_no', 'Receipt NO', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('144', 'description', 'Description', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('145', 'debit', 'Debit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('146', 'credit', 'Credit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('147', 'item_information', 'Item Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('148', 'total', 'Total', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('149', 'please_select_supplier', 'Please Select Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('150', 'submit', 'Submit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('151', 'submit_and_add_another', 'Submit And Add Another One', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('152', 'add_new_item', 'Add New Item', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('153', 'manage_your_purchase', 'Manage your purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('154', 'purchase_edit', 'Purchase Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('155', 'purchase_ledger', 'Purchase Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('156', 'invoice_information', 'Invoice Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('157', 'paid_ammount', 'Paid Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('158', 'discount', 'Discount/Pcs.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('159', 'save_and_paid', 'Save And Paid', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('160', 'payee_name', 'Payee Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('161', 'manage_your_invoice', 'Manage your invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('162', 'invoice_edit', 'Invoice Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('163', 'new_pos_invoice', 'New POS invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('164', 'add_new_pos_invoice', 'Add new pos invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('165', 'product_id', 'Product ID', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('166', 'paid_amount', 'Paid Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('167', 'authorised_by', 'Authorised By', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('168', 'checked_by', 'Checked By', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('169', 'received_by', 'Received By', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('170', 'prepared_by', 'Prepared By', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('171', 'memo_no', 'Memo No', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('172', 'website', 'Website', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('173', 'email', 'Email', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('174', 'invoice_details', 'Invoice Details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('175', 'reset', 'Reset', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('176', 'payment_account', 'Payment Account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('177', 'bank_name', 'Bank Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('178', 'cheque_or_pay_order_no', 'Cheque/Pay Order No', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('179', 'payment_type', 'Payment Type', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('180', 'payment_from', 'Payment From', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('181', 'payment_date', 'Payment Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('182', 'add_income', 'Add Income', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('183', 'cash', 'Cash', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('184', 'cheque', 'Cheque', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('185', 'pay_order', 'Pay Order', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('186', 'payment_to', 'Payment To', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('187', 'total_outflow_ammount', 'Total Expense Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('188', 'transections', 'Transections', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('189', 'accounts_name', 'Accounts Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('190', 'outflow_report', 'Expense Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('191', 'inflow_report', 'Income Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('192', 'all', 'All', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('193', 'account', 'Account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('194', 'from', 'From', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('195', 'account_summary_report', 'Account Summary Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('196', 'search_by_date', 'Search By Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('197', 'cheque_no', 'Cheque No', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('198', 'name', 'Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('199', 'closing_account', 'Closing Account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('200', 'close_your_account', 'Close your account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('201', 'last_day_closing', 'Last Day Closing', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('202', 'cash_in', 'Cash In', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('203', 'cash_out', 'Cash Out', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('204', 'cash_in_hand', 'Cash In Hand', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('205', 'add_new_bank', 'Add New Bank', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('206', 'day_closing', 'Day Closing', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('207', 'account_closing_report', 'Account Closing Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('208', 'last_day_ammount', 'Last Day Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('209', 'adjustment', 'Adjustment', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('210', 'pay_type', 'Pay Type', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('211', 'customer_or_supplier', 'Customer,Supplier Or Others', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('212', 'transection_id', 'Transections ID', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('213', 'accounts_summary_report', 'Accounts Summary Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('214', 'bank_list', 'Bank List', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('215', 'bank_edit', 'Bank Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('216', 'debit_plus', 'Debit (+)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('217', 'credit_minus', 'Credit (-)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('218', 'account_name', 'Account Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('219', 'account_type', 'Account Type', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('220', 'account_real_name', 'Account Real Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('221', 'manage_account', 'Manage Account', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('222', 'company_name', 'Niha International', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('223', 'edit_your_company_information', 'Edit your company information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('224', 'company_edit', 'Company Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('225', 'admin', 'Admin', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('226', 'user', 'User', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('227', 'password', 'Password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('228', 'last_name', 'Last Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('229', 'first_name', 'First Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('230', 'add_new_user_information', 'Add new user information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('231', 'user_type', 'User Type', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('232', 'user_edit', 'User Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('233', 'rtr', 'RTR', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('234', 'ltr', 'LTR', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('235', 'ltr_or_rtr', 'LTR/RTR', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('236', 'footer_text', 'Footer Text', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('237', 'favicon', 'Favicon', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('238', 'logo', 'Logo', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('239', 'update_setting', 'Update Setting', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('240', 'update_your_web_setting', 'Update your web setting', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('241', 'login', 'Login', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('242', 'your_strong_password', 'Your strong password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('243', 'your_unique_email', 'Your unique email', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('244', 'please_enter_your_login_information', 'Please enter your login information.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('245', 'update_profile', 'Update Profile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('246', 'your_profile', 'Your Profile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('247', 're_type_password', 'Re-Type Password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('248', 'new_password', 'New Password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('249', 'old_password', 'Old Password', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('250', 'new_information', 'New Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('251', 'old_information', 'Old Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('252', 'change_your_information', 'Change your information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('253', 'change_your_profile', 'Change your profile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('254', 'profile', 'Profile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('255', 'wrong_username_or_password', 'Wrong User Name Or Password !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('256', 'successfully_updated', 'Successfully Updated.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('257', 'blank_field_does_not_accept', 'Blank Field Does Not Accept !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('258', 'successfully_changed_password', 'Successfully changed password.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('259', 'you_are_not_authorised_person', 'You are not authorised person !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('260', 'password_and_repassword_does_not_match', 'Passwor and re-password does not match !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('261', 'new_password_at_least_six_character', 'New Password At Least 6 Character.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('262', 'you_put_wrong_email_address', 'You put wrong email address !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('263', 'cheque_ammount_asjusted', 'Cheque amount adjusted.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('264', 'successfully_payment_paid', 'Successfully Payment Paid.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('265', 'successfully_added', 'Successfully Added.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('266', 'successfully_updated_2_closing_ammount_not_changeale', 'Successfully Updated -2. Note: Closing Amount Not Changeable.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('267', 'successfully_payment_received', 'Successfully Payment Received.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('268', 'already_inserted', 'Already Inserted !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('269', 'successfully_delete', 'Successfully Delete.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('270', 'successfully_created', 'Successfully Created.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('271', 'logo_not_uploaded', 'Logo not uploaded !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('272', 'favicon_not_uploaded', 'Favicon not uploaded !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('273', 'supplier_mobile', 'Supplier Mobile', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('274', 'supplier_address', 'Supplier Address', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('275', 'supplier_details', 'Supplier Details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('276', 'add_new_supplier', 'Add New Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('277', 'manage_suppiler', 'Manage Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('278', 'manage_your_supplier', 'Manage your supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('279', 'manage_supplier_ledger', 'Manage supplier ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('280', 'invoice_id', 'Invoice ID', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('281', 'deposite_id', 'Deposite ID', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('282', 'supplier_actual_ledger', 'Supplier Actual Ledger', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('283', 'supplier_information', 'Supplier Information', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('284', 'event', 'Event', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('285', 'add_new_income', 'Add New Income', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('286', 'add_expese', 'Add Expense', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('287', 'add_new_expense', 'Add New Expense', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('288', 'total_inflow_ammount', 'Total Income Amount', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('289', 'create_new_invoice', 'Create New Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('290', 'create_pos_invoice', 'Create POS Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('291', 'total_profit', 'Total Profit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('292', 'monthly_progress_report', 'Monthly Progress Report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('293', 'total_invoice', 'Total Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('294', 'account_summary', 'Account Summary', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('295', 'total_supplier', 'Total Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('296', 'total_product', 'Total Product', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('297', 'total_customer', 'Total Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('298', 'supplier_edit', 'Supplier Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('299', 'add_new_invoice', 'Add New Invoice', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('300', 'add_new_purchase', 'Add new purchase', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('301', 'currency', 'Currency', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('302', 'currency_position', 'Currency Position', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('303', 'left', 'Left', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('304', 'right', 'Right', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('305', 'add_tax', 'Add Tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('306', 'manage_tax', 'Manage Tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('307', 'add_new_tax', 'Add new tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('308', 'enter_tax', 'Enter Tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('309', 'already_exists', 'Already Exists !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('310', 'successfully_inserted', 'Successfully Inserted.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('311', 'tax', 'Tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('312', 'tax_edit', 'Tax Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('313', 'product_not_added', 'Product not added !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('314', 'total_tax', 'Total Tax', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('315', 'manage_your_supplier_details', 'Manage your supplier details.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('316', 'invoice_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s                                       standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('317', 'thank_you_for_choosing_us', 'Thank you very much for choosing us.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('318', 'billing_date', 'Billing Date', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('319', 'billing_to', 'Billing To', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('320', 'billing_from', 'Billing From', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('321', 'you_cant_delete_this_product', 'Sorry !!  You can\'t delete this product.This product already used in calculation system!', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('322', 'old_customer', 'Old Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('323', 'new_customer', 'New Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('324', 'new_supplier', 'New Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('325', 'old_supplier', 'Old Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('326', 'credit_customer', 'Credit Customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('327', 'account_already_exists', 'This Account Already Exists !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('328', 'edit_income', 'Edit Income', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('329', 'you_are_not_access_this_part', 'You are not authorised person !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('330', 'account_edit', 'Account Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('331', 'due', 'Due', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('332', 'expense_edit', 'Expense Edit', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('333', 'please_select_customer', 'Please select customer !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('334', 'profit_report', 'Profit Report (Invoice Wise)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('335', 'total_profit_report', 'Total profit report', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('336', 'please_enter_valid_captcha', 'Please enter valid captcha.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('337', 'category_not_selected', 'Category not selected.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('338', 'supplier_not_selected', 'Supplier not selected.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('339', 'please_select_product', 'Please select product.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('340', 'product_model_already_exist', 'Product model already exist !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('341', 'invoice_logo', 'Invoice Logo', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('342', 'available_ctn', 'Available Ctn.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('343', 'you_can_not_buy_greater_than_available_cartoon', 'You can not select grater than available cartoon !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('344', 'customer_details', 'Customer details', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('345', 'manage_customer_details', 'Manage customer details.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('346', 'site_key', 'Captcha Site Key', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('347', 'secret_key', 'Captcha Secret Key', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('348', 'captcha', 'Captcha', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('349', 'cartoon_quantity', 'Carton Quantity', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('350', 'total_cartoon', 'Total Cartoon', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('351', 'cartoon', 'Carton', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('352', 'item_cartoon', 'Item/Cartoon', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('353', 'product_and_supplier_did_not_match', 'Product and supplier did not match !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('354', 'if_you_update_purchase_first_select_supplier_then_product_and_then_cartoon', 'If you update purchase,first select supplier then product and then update cartoon.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('355', 'item', 'Item', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('356', 'manage_your_credit_customer', 'Manage your credit customer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('357', 'total_quantity', 'Total Quantity', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('358', 'quantity_per_cartoon', 'Quantity per carton', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('359', 'barcode_qrcode_scan_here', 'Barcode or QR-code scan here', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('360', 'synchronizer_setting', 'Synchronizer Setting', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('361', 'data_synchronizer', 'Data Synchronizer', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('362', 'hostname', 'Host name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('363', 'username', 'User Name', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('364', 'ftp_port', 'FTP Port', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('365', 'ftp_debug', 'FTP Debug', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('366', 'project_root', 'Project Root', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('367', 'please_try_again', 'Please try again', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('368', 'save_successfully', 'Save successfully', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('369', 'synchronize', 'Synchronize', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('370', 'internet_connection', 'Internet Connection', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('371', 'outgoing_file', 'Outgoing File', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('372', 'incoming_file', 'Incoming File', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('373', 'ok', 'Ok', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('374', 'not_available', 'Not Available', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('375', 'available', 'Available', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('376', 'download_data_from_server', 'Download data from server', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('377', 'data_import_to_database', 'Data import to database', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('378', 'data_upload_to_server', 'Data uplod to server', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('379', 'please_wait', 'Please Wait', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('380', 'ooops_something_went_wrong', 'Oooops Something went wrong !', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('381', 'upload_successfully', 'Upload successfully', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('382', 'unable_to_upload_file_please_check_configuration', 'Unable to upload file please check configuration', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('383', 'please_configure_synchronizer_settings', 'Please configure synchronizer settings', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('384', 'download_successfully', 'Download successfully', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('385', 'unable_to_download_file_please_check_configuration', 'Unable to download file please check configuration', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('386', 'data_import_first', 'Data import past', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('387', 'data_import_successfully', 'Data import successfully', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('388', 'unable_to_import_data_please_check_config_or_sql_file', 'Unable to import data please check config or sql file', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('389', 'total_sale_ctn', 'Total Sale Ctn', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('390', 'in_ctn', 'In Ctn.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('391', 'out_ctn', 'Out Ctn.', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('392', 'stock_report_supplier_wise', 'Stock Report (Supplier Wise)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('393', 'all_stock_report_supplier_wise', 'Stock Report (Suppler Wise)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('394', 'select_supplier', 'Select Supplier', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('395', 'stock_report_product_wise', 'Stock Report (Product Wise)', '');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('396', 'phone', 'Phone', 'Ã Â¦Â«Ã Â§â€¹Ã Â¦Â¨');
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('397', 'select_product', 'Select Product', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('398', 'in_quantity', 'In Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('399', 'out_quantity', 'Out Qnty.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('400', 'in_taka', 'In TK.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('401', 'out_taka', 'Out TK.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('402', 'commission', 'Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('403', 'generate_commission', 'Generate Commssion', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('404', 'commission_rate', 'Commission Rate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('405', 'total_ctn', 'Total Ctn.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('406', 'per_pcs_commission', 'Per PCS Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('407', 'total_commission', 'Total Commission', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('408', 'enter', 'Enter', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('409', 'please_add_walking_customer_for_default_customer', 'Please add \'Walking Customer\' for default customer.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('410', 'supplier_ammount', 'Supplier Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('411', 'my_sale_ammount', 'My Sale Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('412', 'signature_pic', 'Signature Picture', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('413', 'branch', 'Branch', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('414', 'ac_no', 'A/C Number', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('415', 'ac_name', 'A/C Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('416', 'bank_debit_credit_manage', 'Bank Dr. And Cr. Manage', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('417', 'bank', 'Bank', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('418', 'withdraw_deposite_id', 'Withdraw / Deposite ID', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('419', 'bank_ledger', 'Bank Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('420', 'note_name', 'Note Name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('421', 'pcs', 'Pcs.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('422', '1', '1', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('423', '2', '2', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('424', '5', '5', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('425', '10', '10', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('426', '20', '20', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('427', '50', '50', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('428', '100', '100', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('429', '500', '500', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('430', '1000', '1000', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('431', 'total_discount', 'Total Discount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('432', 'product_not_found', 'Product not found !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('433', 'this_is_not_credit_customer', 'This is not credit customer !', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('434', 'personal_loan', 'Office Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('435', 'add_person', 'Add Person', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('436', 'add_loan', 'Add Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('437', 'add_payment', 'Add Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('438', 'manage_person', 'Manage Person', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('439', 'personal_edit', 'Person Edit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('440', 'person_ledger', 'Person Ledger', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('441', 'backup_restore', 'Backup and restore', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('442', 'database_backup', 'Database backup', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('443', 'file_information', 'File information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('444', 'filename', 'Filename', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('445', 'size', 'Size', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('446', 'backup_date', 'Backup date', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('447', 'backup_now', 'Backup now', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('448', 'restore_now', 'Restore now', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('449', 'are_you_sure', 'Are you sure ?', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('450', 'download', 'Download', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('451', 'backup_and_restore', 'Backup and restore', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('452', 'backup_successfully', 'Backup successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('453', 'delete_successfully', 'Delete successfully', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('454', 'stock_ctn', 'Stock/Qnt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('455', 'unit', 'Unit', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('456', 'meter_m', 'Meter (M)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('457', 'piece_pc', 'Piece (Pc)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('458', 'kilogram_kg', 'Kilogram (Kg)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('459', 'stock_cartoon', 'Stock Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('460', 'add_product_csv', 'Add Product (CSV)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('461', 'import_product_csv', 'Import product (CSV)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('462', 'close', 'Close', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('463', 'download_example_file', 'Download example file.', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('464', 'upload_csv_file', 'Upload CSV File', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('465', 'csv_file_informaion', 'CSV File Information', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('466', 'out_of_stock', 'Out Of Stock', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('467', 'others', 'Others', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('468', 'full_paid', 'Full Paid', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('469', 'successfully_saved', 'Your Data Successfully Saved', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('470', 'manage_loan', 'Manage Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('471', 'receipt', 'Receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('472', 'payment', 'Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('473', 'cashflow', 'Daily Cash Flow', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('474', 'signature', 'Signature', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('475', 'supplier_reports', 'Supplier Reports', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('476', 'generate', 'Generate', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('477', 'save_change', 'Save Change', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('478', 'loan_edit', 'Edit loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('479', 'ac_number', 'A/C Number', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('480', 'bank_transection', 'Bank transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('481', 'total_purch_ctn', 'Total P Cartoon', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('482', 'supplier_actual_saleprice', 'Supplier Actual sales', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('483', 'supplier_payment_ledger', 'Supplier Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('484', 'supplier_actual_ledger_sale', 'Supplier Actual Ledger(sale)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('485', 'supplier_actual_ledger_sup', 'Supplier Actual Ledger(supplier)', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('486', 'supplier_payment', 'Supplier Payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('487', 'supplier_summary', 'Supplier Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('488', 'create_account', 'Create Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('489', 'manage_transaction', 'Manage transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('490', 'daily_summary', 'Daily Summary', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('491', 'daily_cashflow', 'Daily Cashflow', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('492', 'custom_report', 'Cutom report', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('493', 'transaction', 'Transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('494', 'add_new_payment', 'Add new payment', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('495', 'add_receipt', 'Add receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('496', 'add_new_receipt', 'Add new receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('497', 'receipt_amount', 'Receipt amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('498', 'transaction_details', 'Transaction details', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('499', 'choose_transaction', 'Choose transaction', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('500', 'transaction_categry', 'Transaction Category', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('501', 'select_account', 'Select Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('502', 'transaction_mood', 'Transaction Mood', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('503', 'payment_amount', 'Payment Amount', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('504', 'personal_loan1', 'Personal Loan', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('505', 'company_name_label', 'Company name', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('506', 'root_account', 'Root Account', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('507', 'cash_receipt', 'Cash Receipt', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('508', 'customer_copy', 'Customer Copy', NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`) VALUES ('509', 'office_copy', 'Office Copy', NULL);


#
# TABLE STRUCTURE FOR: notes
#

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `cash_date` varchar(20) NOT NULL,
  `1000n` varchar(11) NOT NULL,
  `500n` varchar(11) NOT NULL,
  `100n` varchar(11) NOT NULL,
  `50n` varchar(11) NOT NULL,
  `20n` varchar(11) NOT NULL,
  `10n` varchar(11) NOT NULL,
  `5n` varchar(11) NOT NULL,
  `2n` varchar(11) NOT NULL,
  `1n` varchar(30) NOT NULL,
  `grandtotal` varchar(30) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: outflow_1td1fz8uvv
#

DROP TABLE IF EXISTS `outflow_1td1fz8uvv`;

CREATE TABLE `outflow_1td1fz8uvv` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: outflow_pt3vxiow9x
#

DROP TABLE IF EXISTS `outflow_pt3vxiow9x`;

CREATE TABLE `outflow_pt3vxiow9x` (
  `transection_id` varchar(200) NOT NULL,
  `tracing_id` varchar(200) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`transection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: person_information
#

DROP TABLE IF EXISTS `person_information`;

CREATE TABLE `person_information` (
  `person_id` varchar(50) NOT NULL,
  `person_name` varchar(50) NOT NULL,
  `person_phone` varchar(50) NOT NULL,
  `person_address` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `person_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('ZS9HP78AKG', 'Hannan', '0546546546', 'Sundorban Squre Super Market\r\nFirst Floor ,Shop # A15/16A ', '1');
INSERT INTO `person_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('JGC4153QPL', 'Faruk', '0184646516', 'Sundorban Squre Super Market\r\n', '1');
INSERT INTO `person_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('X396ZOTDXS', 'Test', '8768767657', '', '1');
INSERT INTO `person_information` (`person_id`, `person_name`, `person_phone`, `person_address`, `status`) VALUES ('KU4VAMILU6', 'ahmads', '43535345345', 'dfgdfgd', '1');


#
# TABLE STRUCTURE FOR: person_ledger
#

DROP TABLE IF EXISTS `person_ledger`;

CREATE TABLE `person_ledger` (
  `transaction_id` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `debit` float NOT NULL,
  `credit` float NOT NULL,
  `details` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `person_ledger` (`transaction_id`, `person_id`, `date`, `debit`, `credit`, `details`, `status`) VALUES ('B41QDCC3A2TY5JM', 'JGC4153QPL', '26-10-2017', '0', '12000', '', '2');


#
# TABLE STRUCTURE FOR: personal_loan
#

DROP TABLE IF EXISTS `personal_loan`;

CREATE TABLE `personal_loan` (
  `per_loan_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(30) NOT NULL,
  `person_id` varchar(30) NOT NULL,
  `debit` float NOT NULL,
  `credit` float NOT NULL,
  `date` varchar(30) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=no paid,2=paid',
  PRIMARY KEY (`per_loan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `personal_loan` (`per_loan_id`, `transaction_id`, `person_id`, `debit`, `credit`, `date`, `details`, `status`) VALUES ('1', 'GNQS3SFKNQ', 'L1PMD8G982', '10000', '0', '25-10-2017', 'Cash', '1');


#
# TABLE STRUCTURE FOR: product_category
#

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `category_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('B7DFWBPPJM8X3OG', 'Electronics', '1');
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('NIIYM6HERG6F57O', 'Food', '1');
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('HOTLTE7GVXUDAB9', 'Cloths', '1');
INSERT INTO `product_category` (`category_id`, `category_name`, `status`) VALUES ('JWVIQBI1CIRUWJC', 'Mobile', '1');


#
# TABLE STRUCTURE FOR: product_information
#

DROP TABLE IF EXISTS `product_information`;

CREATE TABLE `product_information` (
  `product_id` varchar(100) NOT NULL,
  `supplier_id` varchar(255) NOT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `supplier_price` float DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `cartoon_quantity` int(11) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `product_model` varchar(100) NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_model` (`product_model`),
  UNIQUE KEY `product_model_2` (`product_model`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('63853613', 'E674MTLPNV55PK67QHT4', '', 'Sunmoon', '220', '210', NULL, '40', '0', 'SM-771', '30 LED', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('83517747', 'E674MTLPNV55PK67QHT4', '', 'Sunmoon', '680', '670', NULL, '24', '0', 'SM-781', '63 LED', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('43238874', 'E674MTLPNV55PK67QHT4', '', 'Sunmoon', '98', '90', NULL, '120', '0', 'SM-8607', 'Torch', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('13177442', 'E674MTLPNV55PK67QHT4', '', 'Sunmoon', '230', '220', NULL, '50', '0', 'SM-378A', 'BAT ', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('19226752', '5I6N5LC8ZXDREA9CC3ZW', '', 'FOCUS', '210', '200', NULL, '60', '0', 'SF-6901', '48 LED ', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('63775648', '5I6N5LC8ZXDREA9CC3ZW', '', 'FOCUS', '210', '200', NULL, '60', '0', 'SF-7602T', '48 LED', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('97255764', '5I6N5LC8ZXDREA9CC3ZW', '', 'FOCUS', '190', '180', NULL, '40', '0', 'SF-6904', '30 LED', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('67197783', '5I6N5LC8ZXDREA9CC3ZW', '', 'FOCUS', '280', '260', NULL, '20', '0', 'SF-6905', '70 LED', 'http://www.farukandbrothers.com/my-assets/image/product.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('94999792', 'V2GZ82OM42GWVKKCMIHN', 'NIIYM6HERG6F57O', 'Apple', '500', '480', NULL, '50', '0', 'DE453', '', 'http://wholesalenew.bdtask.com/my-assets/image/product/600fddeea44a61d533367704e7c66091.jpg', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('86815584', 'PQXZV8ZUXUZPN3N4S2WC', 'B7DFWBPPJM8X3OG', 'light', '500', '460', NULL, '60', '0', 'SED675', '', 'http://wholesalenew.bdtask.com/my-assets/image/product/b776823e01ebcac8d7b945620f6fca4d.jpeg', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('84662895', 'IOYDTFVIFMD8JQ7Z38OO', 'JWVIQBI1CIRUWJC', 'Mobile', '6000', '5600', NULL, '60', '0', 'GTY543', '', 'http://wholesalenew.bdtask.com/my-assets/image/product/b13be8233444ebf4d63f13475192136c.png', '1');
INSERT INTO `product_information` (`product_id`, `supplier_id`, `category_id`, `product_name`, `price`, `supplier_price`, `unit`, `cartoon_quantity`, `tax`, `product_model`, `product_details`, `image`, `status`) VALUES ('67988258', 'E674MTLPNV55PK67QHT4', 'B7DFWBPPJM8X3OG', 'Laptop', '7000', '6000', NULL, '30', '0', 'VFR453', '', 'http://wholesalenew.bdtask.com/my-assets/image/product/34620917a7a18bbbd62ea0a59aba06dd.jpg', '1');


#
# TABLE STRUCTURE FOR: product_purchase
#

DROP TABLE IF EXISTS `product_purchase`;

CREATE TABLE `product_purchase` (
  `purchase_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `grand_total_amount` float NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `purchase_details` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171025135016', '1213', 'E674MTLPNV55PK67QHT4', '8322000', '25-10-2017', 'Dimond Transport', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171025135107', '10212', '5I6N5LC8ZXDREA9CC3ZW', '1560000', '25-10-2017', 'Moon light Transport', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171025135549', '10213', '5I6N5LC8ZXDREA9CC3ZW', '3021200', '25-10-2017', 'moon Light Tranort', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171026123424', '46567', 'E674MTLPNV55PK67QHT4', '108000', '26-10-2017', 'No des', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171106140319', '56756', 'E674MTLPNV55PK67QHT4', '50400000', '06-11-2017', '', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171106141024', '6457', 'V2GZ82OM42GWVKKCMIHN', '12000000', '06-11-2017', '', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171106141503', '6578', 'E674MTLPNV55PK67QHT4', '54000', '06-11-2017', '', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171106141537', '7563', 'PQXZV8ZUXUZPN3N4S2WC', '1932000', '06-11-2017', '', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20171106141736', '6756', 'IOYDTFVIFMD8JQ7Z38OO', '235200000', '06-11-2017', '', '1');
INSERT INTO `product_purchase` (`purchase_id`, `chalan_no`, `supplier_id`, `grand_total_amount`, `purchase_date`, `purchase_details`, `status`) VALUES ('20180403033926', '20002', '5I6N5LC8ZXDREA9CC3ZW', '128000', '03-04-2018', '', '1');


#
# TABLE STRUCTURE FOR: product_purchase_details
#

DROP TABLE IF EXISTS `product_purchase_details`;

CREATE TABLE `product_purchase_details` (
  `purchase_detail_id` varchar(100) NOT NULL,
  `purchase_id` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` float NOT NULL,
  `total_amount` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('BT9MiKFBw9efW6l', '20171025135016', '63853613', '4440', '210', '932400', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('EctpylCsUdsHjvb', '20171025135016', '83517747', '2880', '670', '1929600', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('rxxqBT1GXnF2Jcw', '20171025135016', '43238874', '24000', '90', '2160000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('ugPeLDFOvZrehQQ', '20171025135016', '13177442', '15000', '220', '3300000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('tzqQ0xSYfuzHta7', '20171025135107', '19226752', '7800', '200', '1560000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('WheTkojPqigoex6', '20171025135549', '63775648', '9000', '200', '1800000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('UxN7M3FofIS42fh', '20171025135549', '97255764', '400', '180', '72000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('N2FqNpTv6CVbqyP', '20171025135549', '67197783', '4420', '260', '1149200', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('t1QtO6j65NZO09R', '20171026123424', '43238874', '1200', '90', '108000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('bG7pIeDWHY3zeFu', '20171106140319', '63853613', '240000', '210', '50400000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('8tMJPpR7FH7VcrF', '20171106141024', '94999792', '25000', '480', '12000000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('1cZYAghmI5GJfRa', '20171106141503', '43238874', '600', '90', '54000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('quqnJgDIlyaJoCB', '20171106141537', '86815584', '4200', '460', '1932000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('chIdDo51AO2WA0S', '20171106141736', '84662895', '42000', '5600', '235200000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('hZbwRP9CazU8AkV', '20180403033926', '97255764', '40', '200', '8000', '1');
INSERT INTO `product_purchase_details` (`purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('bbFQjdobvB15KUP', '20180403033926', '63775648', '60', '100', '120000', '1');


#
# TABLE STRUCTURE FOR: product_report
#

DROP TABLE IF EXISTS `product_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `product_report` AS select `purchase_report`.`purchase_date` AS `date`,`purchase_report`.`product_id` AS `product_id`,`purchase_report`.`quantity` AS `quantity`,`purchase_report`.`rate` AS `rate`,`purchase_report`.`total_amount` AS `total_amount`,'a' AS `account` from `purchase_report` union all select `sales_report`.`date` AS `date`,`sales_report`.`product_id` AS `product_id`,-(`sales_report`.`quantity`) AS `-quantity`,`sales_report`.`supplier_rate` AS `rate`,(`sales_report`.`quantity` * `sales_report`.`supplier_rate`) AS `total_amount`,'b' AS `account` from `sales_report`;

latin1_swedish_ci;

INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63853613', '4440', '210', '932400', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '83517747', '2880', '670', '1929600', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '43238874', '24000', '90', '2160000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '13177442', '15000', '220', '3300000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '19226752', '7800', '200', '1560000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63775648', '9000', '200', '1800000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '97255764', '400', '180', '72000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '67197783', '4420', '260', '1149200', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '43238874', '1200', '90', '108000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '63853613', '240000', '210', '50400000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '94999792', '25000', '480', '12000000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '43238874', '600', '90', '54000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '86815584', '4200', '460', '1932000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '84662895', '42000', '5600', '235200000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('03-04-2018', '97255764', '40', '200', '8000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('03-04-2018', '63775648', '60', '100', '120000', 'a');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63853613', '-120', '210', '25200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '19226752', '-120', '200', '24000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63775648', '-180', '200', '36000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '83517747', '-120', '670', '80400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '13177442', '-500', '220', '110000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '97255764', '-80', '180', '14400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '67197783', '-40', '260', '10400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63853613', '-40', '210', '8400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '19226752', '-60', '200', '12000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '83517747', '-48', '670', '32160', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '43238874', '-240', '90', '21600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '97255764', '-80', '180', '14400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '19226752', '-60', '200', '12000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '67197783', '-60', '260', '15600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '13177442', '-250', '220', '55000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '19226752', '-600', '200', '120000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '63775648', '-180', '200', '36000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '97255764', '-40', '180', '7200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('25-10-2017', '43238874', '-1200', '90', '108000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-120', '210', '25200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-160', '210', '33600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-160', '210', '33600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-160', '210', '33600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-160', '210', '33600', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '63853613', '-3520', '210', '739200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '13177442', '-50', '220', '11000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '13177442', '-50', '220', '11000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '43238874', '-360', '90', '32400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '43238874', '-360', '90', '32400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '43238874', '-360', '90', '32400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '83517747', '-48', '670', '32160', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '83517747', '-48', '670', '32160', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '13177442', '-150', '220', '33000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('26-10-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '13177442', '-100', '220', '22000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '13177442', '-100', '220', '22000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '63775648', '-180', '200', '36000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '83517747', '-120', '670', '80400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '43238874', '-360', '90', '32400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '97255764', '-80', '180', '14400', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '97255764', '-40', '180', '7200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '67197783', '-120', '260', '31200', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '63775648', '-180', '200', '36000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '63775648', '-300', '200', '60000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('27-10-2017', '63775648', '-240', '200', '48000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '13177442', '-100', '220', '22000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '13177442', '-100', '220', '22000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '83517747', '-48', '670', '32160', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '83517747', '-72', '670', '48240', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('01-11-2017', '13177442', '-100', '220', '22000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('02-11-2017', '43238874', '-720', '90', '64800', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('04-11-2017', '19226752', '-300', '200', '60000', 'b');
INSERT INTO `product_report` (`date`, `product_id`, `quantity`, `rate`, `total_amount`, `account`) VALUES ('06-11-2017', '94999792', '-250', '480', '120000', 'b');


#
# TABLE STRUCTURE FOR: product_supplier
#

DROP TABLE IF EXISTS `product_supplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `product_supplier` AS select `b`.`product_id` AS `product_id`,`c`.`product_name` AS `product_name`,`c`.`product_model` AS `product_model`,`a`.`supplier_id` AS `supplier_id` from ((`product_purchase` `a` join `product_purchase_details` `b`) join `product_information` `c`) where ((`a`.`purchase_id` = `b`.`purchase_id`) and (`c`.`product_id` = `b`.`product_id`)) group by `b`.`product_id`;

latin1_swedish_ci;

INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('13177442', 'Sunmoon', 'SM-378A', 'E674MTLPNV55PK67QHT4');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('19226752', 'FOCUS', 'SF-6901', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('43238874', 'Sunmoon', 'SM-8607', 'E674MTLPNV55PK67QHT4');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('63775648', 'FOCUS', 'SF-7602T', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('63853613', 'Sunmoon', 'SM-771', 'E674MTLPNV55PK67QHT4');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('67197783', 'FOCUS', 'SF-6905', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('83517747', 'Sunmoon', 'SM-781', 'E674MTLPNV55PK67QHT4');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('84662895', 'Mobile', 'GTY543', 'IOYDTFVIFMD8JQ7Z38OO');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('86815584', 'light', 'SED675', 'PQXZV8ZUXUZPN3N4S2WC');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('94999792', 'Apple', 'DE453', 'V2GZ82OM42GWVKKCMIHN');
INSERT INTO `product_supplier` (`product_id`, `product_name`, `product_model`, `supplier_id`) VALUES ('97255764', 'FOCUS', 'SF-6904', '5I6N5LC8ZXDREA9CC3ZW');


#
# TABLE STRUCTURE FOR: purchase_report
#

DROP TABLE IF EXISTS `purchase_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `purchase_report` AS select `product_purchase`.`purchase_date` AS `purchase_date`,`product_purchase`.`chalan_no` AS `chalan_no`,`product_purchase`.`supplier_id` AS `supplier_id`,`product_purchase_details`.`purchase_detail_id` AS `purchase_detail_id`,`product_purchase_details`.`purchase_id` AS `purchase_id`,`product_purchase_details`.`product_id` AS `product_id`,`product_purchase_details`.`quantity` AS `quantity`,`product_purchase_details`.`rate` AS `rate`,`product_purchase_details`.`total_amount` AS `total_amount`,`product_purchase_details`.`status` AS `status` from (`product_purchase_details` left join `product_purchase` on((`product_purchase_details`.`purchase_id` = `product_purchase`.`purchase_id`)));

latin1_swedish_ci;

INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '1213', 'E674MTLPNV55PK67QHT4', 'BT9MiKFBw9efW6l', '20171025135016', '63853613', '4440', '210', '932400', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '1213', 'E674MTLPNV55PK67QHT4', 'EctpylCsUdsHjvb', '20171025135016', '83517747', '2880', '670', '1929600', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '1213', 'E674MTLPNV55PK67QHT4', 'rxxqBT1GXnF2Jcw', '20171025135016', '43238874', '24000', '90', '2160000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '1213', 'E674MTLPNV55PK67QHT4', 'ugPeLDFOvZrehQQ', '20171025135016', '13177442', '15000', '220', '3300000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '10212', '5I6N5LC8ZXDREA9CC3ZW', 'tzqQ0xSYfuzHta7', '20171025135107', '19226752', '7800', '200', '1560000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '10213', '5I6N5LC8ZXDREA9CC3ZW', 'WheTkojPqigoex6', '20171025135549', '63775648', '9000', '200', '1800000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '10213', '5I6N5LC8ZXDREA9CC3ZW', 'UxN7M3FofIS42fh', '20171025135549', '97255764', '400', '180', '72000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('25-10-2017', '10213', '5I6N5LC8ZXDREA9CC3ZW', 'N2FqNpTv6CVbqyP', '20171025135549', '67197783', '4420', '260', '1149200', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('26-10-2017', '46567', 'E674MTLPNV55PK67QHT4', 't1QtO6j65NZO09R', '20171026123424', '43238874', '1200', '90', '108000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('06-11-2017', '56756', 'E674MTLPNV55PK67QHT4', 'bG7pIeDWHY3zeFu', '20171106140319', '63853613', '240000', '210', '50400000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('06-11-2017', '6457', 'V2GZ82OM42GWVKKCMIHN', '8tMJPpR7FH7VcrF', '20171106141024', '94999792', '25000', '480', '12000000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('06-11-2017', '6578', 'E674MTLPNV55PK67QHT4', '1cZYAghmI5GJfRa', '20171106141503', '43238874', '600', '90', '54000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('06-11-2017', '7563', 'PQXZV8ZUXUZPN3N4S2WC', 'quqnJgDIlyaJoCB', '20171106141537', '86815584', '4200', '460', '1932000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('06-11-2017', '6756', 'IOYDTFVIFMD8JQ7Z38OO', 'chIdDo51AO2WA0S', '20171106141736', '84662895', '42000', '5600', '235200000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('03-04-2018', '20002', '5I6N5LC8ZXDREA9CC3ZW', 'hZbwRP9CazU8AkV', '20180403033926', '97255764', '40', '200', '8000', '1');
INSERT INTO `purchase_report` (`purchase_date`, `chalan_no`, `supplier_id`, `purchase_detail_id`, `purchase_id`, `product_id`, `quantity`, `rate`, `total_amount`, `status`) VALUES ('03-04-2018', '20002', '5I6N5LC8ZXDREA9CC3ZW', 'bbFQjdobvB15KUP', '20180403033926', '63775648', '60', '100', '120000', '1');


#
# TABLE STRUCTURE FOR: sales_actual
#

DROP TABLE IF EXISTS `sales_actual`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `sales_actual` AS select `sales_report`.`date` AS `DATE`,`sales_report`.`supplier_id` AS `supplier_id`,sum((`sales_report`.`quantity` * -(`sales_report`.`supplier_rate`))) AS `sub_total`,sum(`sales_report`.`cartoon`) AS `no_transection` from `sales_report` group by `sales_report`.`date`,`sales_report`.`supplier_id` union all select `supplier_ledger`.`date` AS `date`,`supplier_ledger`.`supplier_id` AS `supplier_id`,`supplier_ledger`.`amount` AS `sub_total`,`supplier_ledger`.`description` AS `no_transection` from `supplier_ledger` where isnull(`supplier_ledger`.`chalan_no`) group by `supplier_ledger`.`date`,`supplier_ledger`.`description`,`supplier_ledger`.`supplier_id`;

latin1_swedish_ci;

INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('01-11-2017', 'E674MTLPNV55PK67QHT4', '-194640', '14');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('02-11-2017', 'E674MTLPNV55PK67QHT4', '-64800', '6');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('04-11-2017', '5I6N5LC8ZXDREA9CC3ZW', '-60000', '5');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('06-11-2017', 'V2GZ82OM42GWVKKCMIHN', '-120000', '5');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('25-10-2017', '5I6N5LC8ZXDREA9CC3ZW', '-302000', '32');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('25-10-2017', 'E674MTLPNV55PK67QHT4', '-440760', '38');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('26-10-2017', 'E674MTLPNV55PK67QHT4', '-1260040', '134');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('27-10-2017', '5I6N5LC8ZXDREA9CC3ZW', '-232800', '24');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('27-10-2017', 'E674MTLPNV55PK67QHT4', '-253280', '18');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('25-10-2017', '5I6N5LC8ZXDREA9CC3ZW', '200', '');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('25-10-2017', 'E674MTLPNV55PK67QHT4', '500', '');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('27-10-2017', '5I6N5LC8ZXDREA9CC3ZW', '2017', '');
INSERT INTO `sales_actual` (`DATE`, `supplier_id`, `sub_total`, `no_transection`) VALUES ('30-10-2017', 'E674MTLPNV55PK67QHT4', '300', 'This is supplier payment test');


#
# TABLE STRUCTURE FOR: sales_report
#

DROP TABLE IF EXISTS `sales_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `sales_report` AS select `b`.`date` AS `date`,`b`.`invoice_id` AS `invoice_id`,`a`.`invoice_details_id` AS `invoice_details_id`,`b`.`customer_id` AS `customer_id`,`c`.`supplier_id` AS `supplier_id`,`a`.`product_id` AS `product_id`,`c`.`product_model` AS `product_model`,`c`.`product_name` AS `product_name`,`a`.`cartoon` AS `cartoon`,`a`.`quantity` AS `quantity`,`a`.`rate` AS `sell_rate`,`a`.`supplier_rate` AS `supplier_rate` from ((`invoice_details` `a` join `invoice` `b`) join `product_supplier` `c`) where ((`a`.`invoice_id` = `b`.`invoice_id`) and (`a`.`product_id` = `c`.`product_id`));

latin1_swedish_ci;

INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '322178286179275', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '3', '120', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '461138664737916', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '19226752', 'SF-6901', 'FOCUS', '2', '120', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '538746555262178', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '3', '180', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '515528485757447', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '5', '120', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '191964519925133', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '10', '500', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '974425263638473', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '97255764', 'SF-6904', 'FOCUS', '2', '80', '190', '180');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '5352642796', '172267628511124', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '67197783', 'SF-6905', 'FOCUS', '2', '40', '280', '260');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '341884428717359', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '1', '40', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '828275396474739', 'HS28Q2LCDZHWDS5', '5I6N5LC8ZXDREA9CC3ZW', '19226752', 'SF-6901', 'FOCUS', '1', '60', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '253232673444278', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '2', '48', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '151868497135417', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '2', '240', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '323645793137454', 'HS28Q2LCDZHWDS5', '5I6N5LC8ZXDREA9CC3ZW', '97255764', 'SF-6904', 'FOCUS', '2', '80', '190', '180');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '359346175888428', 'HS28Q2LCDZHWDS5', '5I6N5LC8ZXDREA9CC3ZW', '19226752', 'SF-6901', 'FOCUS', '3', '60', '280', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '259414983286931', 'HS28Q2LCDZHWDS5', '5I6N5LC8ZXDREA9CC3ZW', '67197783', 'SF-6905', 'FOCUS', '3', '60', '280', '260');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '2212884554', '355388986574316', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '5', '250', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '1662246136', '958533333455387', 'F34YNOU3TJSAO67', '5I6N5LC8ZXDREA9CC3ZW', '19226752', 'SF-6901', 'FOCUS', '10', '600', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '1662246136', '149154221344846', 'F34YNOU3TJSAO67', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '3', '180', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '1662246136', '531484717942579', 'F34YNOU3TJSAO67', '5I6N5LC8ZXDREA9CC3ZW', '97255764', 'SF-6904', 'FOCUS', '1', '40', '190', '180');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('25-10-2017', '6678792612', '636596177883366', 'YWYINLCAIU4Z7YA', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '10', '1200', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '1979956835', '155631728614396', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '3', '120', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '2191413693', '722242451482752', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '6476889255', '885926554243267', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '4', '160', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '1441514161', '444871815965462', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '4', '160', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '1161734131', '322374389453755', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '4', '160', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '4672383343', '556411868186321', 'HS28Q2LCDZHWDS5', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '4', '160', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '9455792915', '826966992472672', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '63853613', 'SM-771', 'Sunmoon', '88', '3520', '220', '210');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '6391267778', '994156449435622', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '1', '50', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '5717642987', '966516411331947', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '1', '50', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '4124575573', '338971382639286', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '3', '360', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '1824634358', '855473555817233', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '3', '360', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '5866553993', '854171667212512', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '3', '360', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '2827821423', '861626717588631', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '2', '48', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '1593665589', '773365631369671', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '2', '48', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '5696739753', '273843313886851', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '3', '150', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '5577868966', '795182712765868', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('26-10-2017', '8771668649', '478889756713676', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '3276699692', '693281518267137', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '3276699692', '238761538477495', 'JMVQJWU1FAEQHI5', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '2', '100', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '1612663242', '927958128274588', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '1612663242', '649728331918776', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '2', '100', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '2838558471', '149766959794642', 'F34YNOU3TJSAO67', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '3', '180', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '2838558471', '713779457157324', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '5', '120', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '8332727433', '454162994166898', 'F34YNOU3TJSAO67', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '3', '360', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '8861346923', '536964741874475', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '97255764', 'SF-6904', 'FOCUS', '2', '80', '190', '180');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '1315834339', '838522543126448', '8ZBLA3COJM2NT49', '5I6N5LC8ZXDREA9CC3ZW', '97255764', 'SF-6904', 'FOCUS', '1', '40', '190', '180');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '6812413211', '715781472513723', '8ZBLA3COJM2NT49', '5I6N5LC8ZXDREA9CC3ZW', '67197783', 'SF-6905', 'FOCUS', '6', '120', '280', '260');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '2841757611', '587342536611462', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '3', '180', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '2841757611', '442888991481135', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '5', '300', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('27-10-2017', '2841757611', '773417659329356', 'JMVQJWU1FAEQHI5', '5I6N5LC8ZXDREA9CC3ZW', '63775648', 'SF-7602T', 'FOCUS', '4', '240', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '4895264789', '678866231252864', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '2', '100', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '6766863919', '795166525155278', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '2', '100', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '3524631422', '631275173539193', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '2', '48', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '2955339992', '445173368791781', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '7774413469', '811287854294549', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '83517747', 'SM-781', 'Sunmoon', '3', '72', '680', '670');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('01-11-2017', '8829776633', '476215996973536', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '13177442', 'SM-378A', 'Sunmoon', '2', '100', '230', '220');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('02-11-2017', '9928459451', '771221723624248', '8ZBLA3COJM2NT49', 'E674MTLPNV55PK67QHT4', '43238874', 'SM-8607', 'Sunmoon', '6', '720', '98', '90');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('04-11-2017', '8914637431', '291532368921455', '8ZBLA3COJM2NT49', '5I6N5LC8ZXDREA9CC3ZW', '19226752', 'SF-6901', 'FOCUS', '5', '300', '210', '200');
INSERT INTO `sales_report` (`date`, `invoice_id`, `invoice_details_id`, `customer_id`, `supplier_id`, `product_id`, `product_model`, `product_name`, `cartoon`, `quantity`, `sell_rate`, `supplier_rate`) VALUES ('06-11-2017', '3245145265', '427471376619854', 'JMVQJWU1FAEQHI5', 'V2GZ82OM42GWVKKCMIHN', '94999792', 'DE453', 'Apple', '5', '250', '500', '480');


#
# TABLE STRUCTURE FOR: stock_history
#

DROP TABLE IF EXISTS `stock_history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `stock_history` AS select `invoice`.`date` AS `vdate`,`invoice_details`.`product_id` AS `product_id`,sum(`invoice_details`.`quantity`) AS `sell`,0 AS `Purchase` from (`invoice_details` join `invoice` on((`invoice_details`.`invoice_id` = `invoice`.`invoice_id`))) group by `invoice_details`.`product_id`,`invoice`.`date` union select `product_purchase`.`purchase_date` AS `purchase_date`,`product_purchase_details`.`product_id` AS `product_id`,0 AS `0`,sum(`product_purchase_details`.`quantity`) AS `purchase` from (`product_purchase_details` join `product_purchase` on((`product_purchase_details`.`purchase_id` = `product_purchase`.`purchase_id`))) group by `product_purchase_details`.`product_id`,`product_purchase`.`purchase_date`;

latin1_swedish_ci;

INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('02-11-2017', '', '600', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('01-11-2017', '13177442', '300', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '13177442', '750', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('26-10-2017', '13177442', '250', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '13177442', '200', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('04-11-2017', '19226752', '300', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '19226752', '840', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('02-11-2017', '43238874', '720', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '43238874', '1440', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('26-10-2017', '43238874', '1080', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '43238874', '360', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '63775648', '360', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '63775648', '900', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '63853613', '160', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('26-10-2017', '63853613', '4280', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '67197783', '100', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '67197783', '120', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('01-11-2017', '83517747', '192', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '83517747', '168', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('26-10-2017', '83517747', '312', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '83517747', '264', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '94999792', '250', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '97255764', '200', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('27-10-2017', '97255764', '120', '0');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '13177442', '0', '15000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '19226752', '0', '7800');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '43238874', '0', '600');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '43238874', '0', '24000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('26-10-2017', '43238874', '0', '1200');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('03-04-2018', '63775648', '0', '60');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '63775648', '0', '9000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '63853613', '0', '240000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '63853613', '0', '4440');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '67197783', '0', '4420');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '83517747', '0', '2880');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '84662895', '0', '42000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '86815584', '0', '4200');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('06-11-2017', '94999792', '0', '25000');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('03-04-2018', '97255764', '0', '40');
INSERT INTO `stock_history` (`vdate`, `product_id`, `sell`, `Purchase`) VALUES ('25-10-2017', '97255764', '0', '400');


#
# TABLE STRUCTURE FOR: supplier_information
#

DROP TABLE IF EXISTS `supplier_information`;

CREATE TABLE `supplier_information` (
  `supplier_id` varchar(100) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  KEY `supplier_id` (`supplier_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('5I6N5LC8ZXDREA9CC3ZW', 'Easy Global Trading Ltd.', 'Uttara,Dhaka\r\nBangladesh', '05114645651', 'Focus', '1');
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('E674MTLPNV55PK67QHT4', 'Al Faisal International', 'Chittagong ', '1352412454', 'Sunmoon', '1');
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('PQXZV8ZUXUZPN3N4S2WC', 'Moral Kemi', '76 Newyork, Denmark', '187654345767', '', '1');
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('IOYDTFVIFMD8JQ7Z38OO', 'Johan Doye', '98 Green Road,Farmgate', '569856784357', '', '1');
INSERT INTO `supplier_information` (`supplier_id`, `supplier_name`, `address`, `mobile`, `details`, `status`) VALUES ('V2GZ82OM42GWVKKCMIHN', 'ibram Kholi', '78 Green Road, Dhaka', '880178965423', '', '1');


#
# TABLE STRUCTURE FOR: supplier_ledger
#

DROP TABLE IF EXISTS `supplier_ledger`;

CREATE TABLE `supplier_ledger` (
  `transaction_id` varchar(100) NOT NULL,
  `supplier_id` varchar(100) NOT NULL,
  `chalan_no` varchar(100) DEFAULT NULL,
  `deposit_no` varchar(50) DEFAULT NULL,
  `amount` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  KEY `receipt_no` (`deposit_no`),
  KEY `receipt_no_2` (`deposit_no`),
  KEY `receipt_no_3` (`deposit_no`),
  KEY `receipt_no_4` (`deposit_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171025135016', 'E674MTLPNV55PK67QHT4', '1213', NULL, '8322000', 'Dimond Transport', '', '', '25-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171025135107', '5I6N5LC8ZXDREA9CC3ZW', '10212', NULL, '0', 'Moon light Transport', '', '', '25-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171025135549', '5I6N5LC8ZXDREA9CC3ZW', '10213', NULL, '1872000', 'moon Light Tranort', '', '', '25-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('4LZA5EQOJKEMMS4', 'E674MTLPNV55PK67QHT4', NULL, 'C7LLC9GMYH', '500', '', '1', '', '25-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('PJP3UHZDMOFPK66', '5I6N5LC8ZXDREA9CC3ZW', NULL, 'VPQCLLSV2L', '200', '', '1', '', '25-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171026123424', 'E674MTLPNV55PK67QHT4', '46567', NULL, '108000', 'No des', '', '', '26-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('D4PDQL36WENO5YE', '5I6N5LC8ZXDREA9CC3ZW', NULL, 'RQUHUDKOSM', '2017', '', '1', '', '27-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('VHLV1CJWVRVNR2J', 'E674MTLPNV55PK67QHT4', NULL, 'B4UPMTBV8T', '300', 'This is supplier payment test', '1', '', '30-10-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171106140319', 'E674MTLPNV55PK67QHT4', '56756', NULL, '50400000', '', '', '', '06-11-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171106141024', 'V2GZ82OM42GWVKKCMIHN', '6457', NULL, '12000000', '', '', '', '06-11-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171106141503', 'E674MTLPNV55PK67QHT4', '6578', NULL, '54000', '', '', '', '06-11-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171106141537', 'PQXZV8ZUXUZPN3N4S2WC', '7563', NULL, '1932000', '', '', '', '06-11-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20171106141736', 'IOYDTFVIFMD8JQ7Z38OO', '6756', NULL, '235200000', '', '', '', '06-11-2017', '1');
INSERT INTO `supplier_ledger` (`transaction_id`, `supplier_id`, `chalan_no`, `deposit_no`, `amount`, `description`, `payment_type`, `cheque_no`, `date`, `status`) VALUES ('20180403033926', '5I6N5LC8ZXDREA9CC3ZW', '20002', NULL, '128000', '', '', '', '03-04-2018', '1');


#
# TABLE STRUCTURE FOR: synchronizer_setting
#

DROP TABLE IF EXISTS `synchronizer_setting`;

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `synchronizer_setting` (`id`, `hostname`, `username`, `password`, `port`, `debug`, `project_root`) VALUES ('8', '70.35.198.244', 'softest3bdtask', 'Ux5O~MBJ#odK', '21', 'true', './public_html/niha/');


#
# TABLE STRUCTURE FOR: tax_information
#

DROP TABLE IF EXISTS `tax_information`;

CREATE TABLE `tax_information` (
  `tax_id` varchar(15) NOT NULL,
  `tax` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: transection
#

DROP TABLE IF EXISTS `transection`;

CREATE TABLE `transection` (
  `transaction_id` varchar(30) NOT NULL,
  `date_of_transection` varchar(30) NOT NULL,
  `transection_type` varchar(30) NOT NULL,
  `transection_category` varchar(30) NOT NULL,
  `transection_mood` varchar(25) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `pay_amount` int(30) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `relation_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '2', '2', '1', '111600', NULL, 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2', '2', '1', '2000', '0', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '2', '2', '1', '3000', '0', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('4LZA5EQOJKEMMS4', '25-10-2017', '1', '1', '1', '', '500', '', 'E674MTLPNV55PK67QHT4');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('PJP3UHZDMOFPK66', '25-10-2017', '1', '1', '1', '', '200', '', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '2', '2', '1', '1000', '0', '', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('9IFRDZW8DBQ262A', '25-10-2017', '1', '3', '1', '', '10', '', 'Office Rent');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('TT176B5VPH76HLF', '25-10-2017', '1', '3', '1', '', '5', '', 'Office Rent');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '2', '2', '1', '25800', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '2', '2', '1', '45720', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '2', '2', '1', '35200', NULL, 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '2', '2', '1', '35200', NULL, 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '2', '2', '1', '35200', NULL, 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '2', '2', '1', '35200', NULL, 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '2', '2', '1', '1074140', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '2', '2', '1', '1074140', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '2', '2', '1', '73080', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '2', '2', '1', '73080', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '2', '2', '1', '58800', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '2', '2', '1', '81600', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '2', '2', '1', '34500', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('B41QDCC3A2TY5JM', '26-10-2017', '1', '4', '1', '', '12000', '', 'JGC4153QPL');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '2', '2', '1', '71760', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '2', '2', '1', '71960', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '2', '2', '1', '71960', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '2', '2', '1', '119400', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '2', '2', '1', '777777', NULL, 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '2', '2', '1', '15200', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '2', '2', '1', '7600', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('D4PDQL36WENO5YE', '27-10-2017', '2', '1', '1', '2017', '0', '', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '2', '2', '1', '33600', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '2', '2', '1', '151200', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('VHLV1CJWVRVNR2J', '30-10-2017', '1', '1', '1', '', '300', 'This is supplier payment test', 'E674MTLPNV55PK67QHT4');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '1', '2', '1', '', '450', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '2', '2', '1', '48960', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '2', '2', '1', '10000', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '2', '2', '1', '8000', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '2', '2', '1', '70000', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '2', '2', '1', '46000', NULL, 'ITP', '');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '2', '2', '1', '46000', NULL, 'ITP', '');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '2', '2', '1', '46000', NULL, 'ITP', '');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '2', '2', '1', '63000', NULL, 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '2', '2', '1', '120920', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '2', '2', '1', '110000', NULL, 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `transection` (`transaction_id`, `date_of_transection`, `transection_type`, `transection_category`, `transection_mood`, `amount`, `pay_amount`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '2', '2', '1', '125000', NULL, 'ITP', 'JMVQJWU1FAEQHI5');


#
# TABLE STRUCTURE FOR: user_login
#

DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login` (
  `user_id` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int(2) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES ('1', 'tanzil4091@gmail.com', '41d99b369894eb1ec3f461135132d8bb', '2', '', '1');
INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES ('oZTpXAmq4itvJmY', 'test@test.com', '41d99b369894eb1ec3f461135132d8bb', '1', '', '1');
INSERT INTO `user_login` (`user_id`, `username`, `password`, `user_type`, `security_code`, `status`) VALUES ('gOzfNyrd023iRRX', 'joys@gmail.com', '82c1ab9f315f15ff53d5bba77c9a1884', '2', '', '1');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `gender` int(2) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `gender`, `date_of_birth`, `logo`, `status`) VALUES ('1', 'doey', 'johan', '1', '', 'http://localhost/inventory_demo/product_sales_erp/demo/assets/dist/img/profile_picture/af89a04654f174d07216b8cacb536483.jpg', '1');
INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `gender`, `date_of_birth`, `logo`, `status`) VALUES ('oZTpXAmq4itvJmY', 'Doye', 'Johan', '0', '', 'http://wholesalenew.bdtask.com/assets/dist/img/profile_picture/517e33d1a803137bbb1d99e2446959b7.jpg', '1');
INSERT INTO `users` (`user_id`, `last_name`, `first_name`, `gender`, `date_of_birth`, `logo`, `status`) VALUES ('gOzfNyrd023iRRX', 'fok', 'joy', '0', '', NULL, '1');


#
# TABLE STRUCTURE FOR: view_customer_transection
#

DROP TABLE IF EXISTS `view_customer_transection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `view_customer_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`customer_name` AS `customer_name`,`q`.`invoice_no` AS `invoice_no`,`q`.`receipt_no` AS `receipt_no` from ((`transection` `i` left join `customer_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`customer_id`))) left join `customer_ledger` `q` on((convert(`i`.`transaction_id` using utf8) = `q`.`transaction_id`))));

latin1_swedish_ci;

INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('PNOBOTZCL9OWBP5', 'Hannan Traders', '6678792612', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('VH112LNS1EJJK75', 'Universal Electic', '123', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('L2FOE13IDSYADC3', 'S.R Enterprise ', '123', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('FSQ9O99EGHTRE9F', 'S.S Enterprise', '123', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('WQVYCRJMN86GI17', 'Universal Electic', '1979956835', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('2IXO5N7VJFSJ7W3', 'S.S Enterprise', '2191413693', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('KTASGDEO2EVT8FP', 'S.R Enterprise ', '6476889255', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('FCW4MH999Y3A75X', 'S.R Enterprise ', '1441514161', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('C5JJ9CNCRQN6ZQR', 'S.R Enterprise ', '1161734131', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('G36CPLKONRDN18L', 'S.R Enterprise ', '4672383343', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('T71A2WYSBL1OQFJ', 'S.S Enterprise', '9455792915', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('UPV5HNEO3MK8ZOW', 'S.S Enterprise', '4981452674', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('GVH6YY7265ISKCI', 'S.S Enterprise', '4124575573', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('78SO49VW5EWVQLG', 'S.S Enterprise', '1824634358', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('6WBA2S3PR7B5KOU', 'S.S Enterprise', '5866553993', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('VNCC412Q9ORNR2F', 'Universal Electic', '2827821423', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('8GX996WGH6AH12O', 'Shahidul Islam', '5696739753', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('CDXCOWXKMR3YAYO', 'Universal Electic', '8771668649', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('AGVJG2Y23Q8AHZD', 'Universal Electic', '3276699692', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('UED29RCG1321ZZO', 'S.S Enterprise', '1612663242', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('YF8XXXZX1ACGXY3', 'S.S Enterprise', '2838558471', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('7ZW9G3F6A3ZBAA8', 'S.S Enterprise', '8332727433', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('5CUCOA9L3HXZTZ3', 'Universal Electic', '8861346923', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('P3YOLNTKI1R13YT', 'Shahidul Islam', '1315834339', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('BM1RD29M3U7VQ1B', 'Shahidul Islam', '6812413211', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('4BPPVCALP98XOOY', 'Universal Electic', '2841757611', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('37W1572K5SAS3SK', 'Shahidul Islam', NULL, '');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('PDPYVAPZXT3ALZF', 'Shahidul Islam', '2955339992', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('3FL6WVVYBJ2IXTG', 'Shahidul Islam', '7774413469', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('KECMDNQWIW9UI7L', 'Shahidul Islam', '8829776633', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('VAH59FVGOXCI2KV', 'Shahidul Islam', NULL, '6R7MP8LNFF');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('VAH59FVGOXCI2KV', 'Shahidul Islam', '9928459451', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('1MZZRFMMRXQ37VJ', 'Shahidul Islam', NULL, 'B63HSVBSXM');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('1MZZRFMMRXQ37VJ', 'Shahidul Islam', '8914637431', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('YB2DKLKGZPJ5YF2', 'Universal Electic', NULL, 'BHRAJTKKIT');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('43DXTMZASI4BTMN', 'Universal Electic', '3245145265', '5PJS9XM31B');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('OK5UDZV15MSWLLL', 'Universal Electic', NULL, 'G1ETNT5ZWT');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('43DXTMZASI4BTMN', 'Universal Electic', '3245145265', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('QAO1QIY19Q7RKTH', NULL, NULL, 'CT2U6E74D8');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('QAO1QIY19Q7RKTH', NULL, '4991415829', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('DU843BZYE76XUHX', NULL, NULL, '828U4QGHEK');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('DU843BZYE76XUHX', NULL, '6471686685', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('XA89GZE1P5V51DE', NULL, NULL, '6NJUFLJTAH');
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('XA89GZE1P5V51DE', NULL, '7579931679', NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('4LZA5EQOJKEMMS4', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('PJP3UHZDMOFPK66', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('9IFRDZW8DBQ262A', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('TT176B5VPH76HLF', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('B41QDCC3A2TY5JM', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('D4PDQL36WENO5YE', NULL, NULL, NULL);
INSERT INTO `view_customer_transection` (`transaction_id`, `customer_name`, `invoice_no`, `receipt_no`) VALUES ('VHLV1CJWVRVNR2J', NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: view_person_transection
#

DROP TABLE IF EXISTS `view_person_transection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `view_person_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`person_name` AS `person_name` from (`transection` `i` left join `person_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`person_id`))));

latin1_swedish_ci;

INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('B41QDCC3A2TY5JM', 'Faruk');
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('PNOBOTZCL9OWBP5', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('VH112LNS1EJJK75', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('L2FOE13IDSYADC3', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('4LZA5EQOJKEMMS4', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('PJP3UHZDMOFPK66', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('FSQ9O99EGHTRE9F', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('9IFRDZW8DBQ262A', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('TT176B5VPH76HLF', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('WQVYCRJMN86GI17', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('2IXO5N7VJFSJ7W3', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('KTASGDEO2EVT8FP', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('FCW4MH999Y3A75X', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('C5JJ9CNCRQN6ZQR', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('G36CPLKONRDN18L', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('T71A2WYSBL1OQFJ', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('UPV5HNEO3MK8ZOW', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('GVH6YY7265ISKCI', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('78SO49VW5EWVQLG', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('6WBA2S3PR7B5KOU', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('VNCC412Q9ORNR2F', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('8GX996WGH6AH12O', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('CDXCOWXKMR3YAYO', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('AGVJG2Y23Q8AHZD', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('UED29RCG1321ZZO', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('YF8XXXZX1ACGXY3', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('7ZW9G3F6A3ZBAA8', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('5CUCOA9L3HXZTZ3', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('P3YOLNTKI1R13YT', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('D4PDQL36WENO5YE', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('BM1RD29M3U7VQ1B', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('4BPPVCALP98XOOY', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('VHLV1CJWVRVNR2J', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('37W1572K5SAS3SK', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('PDPYVAPZXT3ALZF', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('3FL6WVVYBJ2IXTG', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('KECMDNQWIW9UI7L', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('VAH59FVGOXCI2KV', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('QAO1QIY19Q7RKTH', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('DU843BZYE76XUHX', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('XA89GZE1P5V51DE', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('1MZZRFMMRXQ37VJ', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('YB2DKLKGZPJ5YF2', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('OK5UDZV15MSWLLL', NULL);
INSERT INTO `view_person_transection` (`transaction_id`, `person_name`) VALUES ('43DXTMZASI4BTMN', NULL);


#
# TABLE STRUCTURE FOR: view_supplier_transection
#

DROP TABLE IF EXISTS `view_supplier_transection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `view_supplier_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`j`.`supplier_name` AS `supplier_name` from (`transection` `i` left join `supplier_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`supplier_id`))));

latin1_swedish_ci;

INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('PJP3UHZDMOFPK66', 'Easy Global Trading Ltd.');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('D4PDQL36WENO5YE', 'Easy Global Trading Ltd.');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('4LZA5EQOJKEMMS4', 'Al Faisal International');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('VHLV1CJWVRVNR2J', 'Al Faisal International');
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('PNOBOTZCL9OWBP5', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('VH112LNS1EJJK75', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('L2FOE13IDSYADC3', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('FSQ9O99EGHTRE9F', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('9IFRDZW8DBQ262A', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('TT176B5VPH76HLF', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('WQVYCRJMN86GI17', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('2IXO5N7VJFSJ7W3', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('KTASGDEO2EVT8FP', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('FCW4MH999Y3A75X', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('C5JJ9CNCRQN6ZQR', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('G36CPLKONRDN18L', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('T71A2WYSBL1OQFJ', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('UPV5HNEO3MK8ZOW', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('GVH6YY7265ISKCI', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('78SO49VW5EWVQLG', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('6WBA2S3PR7B5KOU', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('VNCC412Q9ORNR2F', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('8GX996WGH6AH12O', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('B41QDCC3A2TY5JM', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('CDXCOWXKMR3YAYO', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('AGVJG2Y23Q8AHZD', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('UED29RCG1321ZZO', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('YF8XXXZX1ACGXY3', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('7ZW9G3F6A3ZBAA8', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('5CUCOA9L3HXZTZ3', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('P3YOLNTKI1R13YT', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('BM1RD29M3U7VQ1B', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('4BPPVCALP98XOOY', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('37W1572K5SAS3SK', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('PDPYVAPZXT3ALZF', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('3FL6WVVYBJ2IXTG', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('KECMDNQWIW9UI7L', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('VAH59FVGOXCI2KV', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('QAO1QIY19Q7RKTH', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('DU843BZYE76XUHX', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('XA89GZE1P5V51DE', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('1MZZRFMMRXQ37VJ', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('YB2DKLKGZPJ5YF2', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('OK5UDZV15MSWLLL', NULL);
INSERT INTO `view_supplier_transection` (`transaction_id`, `supplier_name`) VALUES ('43DXTMZASI4BTMN', NULL);


#
# TABLE STRUCTURE FOR: view_transection
#

DROP TABLE IF EXISTS `view_transection`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wholesal_musv1`@`localhost` SQL SECURITY DEFINER VIEW `view_transection` AS (select `i`.`transaction_id` AS `transaction_id`,`i`.`date_of_transection` AS `date_of_transection`,`i`.`amount` AS `amount`,`i`.`pay_amount` AS `pay_amount`,`f`.`invoice_no` AS `invoice_no`,`g`.`customer_name` AS `customer_name`,`h`.`supplier_name` AS `supplier_name`,`j`.`person_name` AS `person_name`,`i`.`transection_category` AS `transection_category`,`i`.`transection_type` AS `transection_type`,`i`.`transection_mood` AS `transection_mood`,`i`.`description` AS `description`,`i`.`relation_id` AS `relation_id` from ((((`transection` `i` left join `customer_ledger` `f` on((convert(`i`.`transaction_id` using utf8) = `f`.`transaction_id`))) left join `customer_information` `g` on((convert(`i`.`relation_id` using utf8) = `f`.`customer_id`))) left join `supplier_information` `h` on((convert(`i`.`relation_id` using utf8) = `h`.`supplier_id`))) left join `person_information` `j` on((convert(`i`.`relation_id` using utf8) = `j`.`person_id`))));

latin1_swedish_ci;

INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'Shahidul Islam', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'Shahidul Islam', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Shahidul Islam', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'Universal Electic', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'Universal Electic', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'Universal Electic', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'Universal Electic', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Universal Electic', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'S.S Enterprise', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'S.S Enterprise', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'S.S Enterprise', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'S.R Enterprise ', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'S.R Enterprise ', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'Hannan Traders', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'Hannan Traders', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Hannan Traders', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PNOBOTZCL9OWBP5', '25-10-2017', '111600', NULL, '6678792612', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'YWYINLCAIU4Z7YA');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VH112LNS1EJJK75', '25-10-2017', '2000', '0', '123', 'Johan Doye', NULL, NULL, '2', '2', '1', 'Cash', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('L2FOE13IDSYADC3', '25-10-2017', '3000', '0', '123', 'Johan Doye', NULL, NULL, '2', '2', '1', 'no des', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FSQ9O99EGHTRE9F', '25-10-2017', '1000', '0', '123', 'Johan Doye', NULL, NULL, '2', '2', '1', '', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('WQVYCRJMN86GI17', '26-10-2017', '25800', NULL, '1979956835', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('2IXO5N7VJFSJ7W3', '26-10-2017', '45720', NULL, '2191413693', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KTASGDEO2EVT8FP', '26-10-2017', '35200', NULL, '6476889255', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('FCW4MH999Y3A75X', '26-10-2017', '35200', NULL, '1441514161', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('C5JJ9CNCRQN6ZQR', '26-10-2017', '35200', NULL, '1161734131', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('G36CPLKONRDN18L', '26-10-2017', '35200', NULL, '4672383343', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'HS28Q2LCDZHWDS5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('T71A2WYSBL1OQFJ', '26-10-2017', '1074140', NULL, '9455792915', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UPV5HNEO3MK8ZOW', '26-10-2017', '1074140', NULL, '4981452674', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('GVH6YY7265ISKCI', '26-10-2017', '73080', NULL, '4124575573', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('78SO49VW5EWVQLG', '26-10-2017', '73080', NULL, '1824634358', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('6WBA2S3PR7B5KOU', '26-10-2017', '58800', NULL, '5866553993', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VNCC412Q9ORNR2F', '26-10-2017', '81600', NULL, '2827821423', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('8GX996WGH6AH12O', '26-10-2017', '34500', NULL, '5696739753', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('CDXCOWXKMR3YAYO', '26-10-2017', '71760', NULL, '8771668649', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('AGVJG2Y23Q8AHZD', '27-10-2017', '71960', NULL, '3276699692', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('UED29RCG1321ZZO', '27-10-2017', '71960', NULL, '1612663242', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YF8XXXZX1ACGXY3', '27-10-2017', '119400', NULL, '2838558471', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('7ZW9G3F6A3ZBAA8', '27-10-2017', '777777', NULL, '8332727433', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'F34YNOU3TJSAO67');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('5CUCOA9L3HXZTZ3', '27-10-2017', '15200', NULL, '8861346923', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('P3YOLNTKI1R13YT', '27-10-2017', '7600', NULL, '1315834339', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('BM1RD29M3U7VQ1B', '27-10-2017', '33600', NULL, '6812413211', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4BPPVCALP98XOOY', '27-10-2017', '151200', NULL, '2841757611', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('37W1572K5SAS3SK', '31-10-2017', '', '450', NULL, 'Johan Doye', NULL, NULL, '2', '1', '1', 'dfgdsgf', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PDPYVAPZXT3ALZF', '01-11-2017', '48960', NULL, '2955339992', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('3FL6WVVYBJ2IXTG', '01-11-2017', '10000', NULL, '7774413469', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('KECMDNQWIW9UI7L', '01-11-2017', '8000', NULL, '8829776633', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VAH59FVGOXCI2KV', '02-11-2017', '70000', NULL, '9928459451', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('QAO1QIY19Q7RKTH', '02-11-2017', '46000', NULL, '4991415829', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('DU843BZYE76XUHX', '02-11-2017', '46000', NULL, '6471686685', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('XA89GZE1P5V51DE', '02-11-2017', '46000', NULL, '7579931679', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('1MZZRFMMRXQ37VJ', '04-11-2017', '63000', NULL, '8914637431', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', '8ZBLA3COJM2NT49');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('YB2DKLKGZPJ5YF2', '04-11-2017', '120920', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('OK5UDZV15MSWLLL', '04-11-2017', '110000', NULL, NULL, 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('43DXTMZASI4BTMN', '06-11-2017', '125000', NULL, '3245145265', 'Johan Doye', NULL, NULL, '2', '2', '1', 'ITP', 'JMVQJWU1FAEQHI5');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('PJP3UHZDMOFPK66', '25-10-2017', '', '200', NULL, NULL, 'Easy Global Trading Ltd.', NULL, '1', '1', '1', '', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('D4PDQL36WENO5YE', '27-10-2017', '2017', '0', NULL, NULL, 'Easy Global Trading Ltd.', NULL, '1', '2', '1', '', '5I6N5LC8ZXDREA9CC3ZW');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('4LZA5EQOJKEMMS4', '25-10-2017', '', '500', NULL, NULL, 'Al Faisal International', NULL, '1', '1', '1', '', 'E674MTLPNV55PK67QHT4');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('VHLV1CJWVRVNR2J', '30-10-2017', '', '300', NULL, NULL, 'Al Faisal International', NULL, '1', '1', '1', 'This is supplier payment test', 'E674MTLPNV55PK67QHT4');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('B41QDCC3A2TY5JM', '26-10-2017', '', '12000', NULL, NULL, NULL, 'Faruk', '4', '1', '1', '', 'JGC4153QPL');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('9IFRDZW8DBQ262A', '25-10-2017', '', '10', NULL, NULL, NULL, NULL, '3', '1', '1', '', 'Office Rent');
INSERT INTO `view_transection` (`transaction_id`, `date_of_transection`, `amount`, `pay_amount`, `invoice_no`, `customer_name`, `supplier_name`, `person_name`, `transection_category`, `transection_type`, `transection_mood`, `description`, `relation_id`) VALUES ('TT176B5VPH76HLF', '25-10-2017', '', '5', NULL, NULL, NULL, NULL, '3', '1', '1', '', 'Office Rent');


#
# TABLE STRUCTURE FOR: web_setting
#

DROP TABLE IF EXISTS `web_setting`;

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  `invoice_logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `currency_position` varchar(10) DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `rtr` varchar(255) DEFAULT NULL,
  `captcha` int(11) DEFAULT '1' COMMENT '0=active,1=inactive',
  `site_key` varchar(250) DEFAULT NULL,
  `secret_key` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `web_setting` (`setting_id`, `logo`, `invoice_logo`, `favicon`, `currency`, `currency_position`, `footer_text`, `language`, `rtr`, `captcha`, `site_key`, `secret_key`) VALUES ('1', 'http://wholesalenew.bdtask.com/my-assets/image/logo/508c542be44cc99a63c6ce1e3079278e.png', 'http://wholesalenew.bdtask.com/my-assets/image/logo/e3577040b8f900fc6030b9ae11f55699.png', 'http://wholesalenew.bdtask.com/my-assets/image/logo/e8275d14a790c3c7ad46e325486aa51b.jpg', '$', '0', 'Copyright Ã‚Â© 2016-2017 bdtask. All rights reserved.', 'english', '0', '1', '6LdiKhsUAAAAAMV4jQRmNYdZy2kXEuFe1HrdP5tt', '6LdiKhsUAAAAABH4BQCIvBar7Oqe-2LwDKxMSX-t');


