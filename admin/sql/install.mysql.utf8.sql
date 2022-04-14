DROP TABLE IF EXISTS `#__osce_quesbanks`;
CREATE TABLE `#__osce_quesbanks` (
	`id` INT(11) NOT NULL AUTO_INCREMENT ,
	'published' tinyint(4) NOT NULL,
    'ques' text(255) NOT NULL,
    'opt1' text(255) NOT NULL,
    'opt2' text(255) NOT NULL,
    'opt3' text(255) NOT NULL,
    'opt4' text(255) NOT NULL,
    'tag_id' json NOT NULL,
    'correct_ans' text(255) NOT NULL,
    `modified_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `created_on` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;

DROP TABLE IF EXISTS `#__osce_tags`;
CREATE TABLE `#__osce_tags` (
	`id` INT(11) NOT NULL AUTO_INCREMENT ,
	'title' text(255) NOT NULL,
    'created_by' varchar(255) NOT NULL,
    'modified_by' varchar(255) NOT NULL,
    `modified_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    `created_on` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;

DROP TABLE IF EXISTS `#__osce_quesbank_tags`;
CREATE TABLE `#__osce_quesbank_tags` (
	`id` INT(11) NOT NULL AUTO_INCREMENT ,
	`quesbank_id` INT(11) NOT NULL ,
	`tag_id` INT(11) NOT NULL ,
    PRIMARY KEY (`id`)) ENGINE = InnoDB;