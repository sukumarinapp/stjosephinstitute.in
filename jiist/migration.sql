ALTER TABLE `jiier_student` ADD `photo` VARCHAR(50) NULL AFTER `centre_id`;
ALTER TABLE `jiier_student` ADD `reg_no` VARCHAR(50) NULL AFTER `photo`, ADD `acdemic_year` VARCHAR(20) NULL AFTER `reg_no`;
ALTER TABLE `jiier_student` CHANGE `centre_id` `centre_id` INT(11) NOT NULL;
ALTER TABLE `jiier_student` CHANGE `course` `course` INT NOT NULL;
ALTER TABLE `jiier_student` ADD `idcard` VARCHAR(50) NULL AFTER `acdemic_year`;	
update jiier_student set course=5,centre_id=15,photo='1.jpg',reg_no='9080740586',acdemic_year='2015-2019',phone='8778193926',blood='B+',dob='1999-06-14',address='Panamthanam, Thirunakkar,Kottayam, Kerala' where id=1