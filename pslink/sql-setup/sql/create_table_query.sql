CREATE TABLE `ps_student`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`username` VARCHAR(128),
`password` VARCHAR(128),
`first_name` VARCHAR(128),
`last_name` VARCHAR(128),
`gender_id` INTEGER,
`race` VARCHAR(128),
`nationality` VARCHAR(128),
`address_line1` VARCHAR(128),
`address_line2` VARCHAR(128),
`address_line3` VARCHAR(128),
`address_line4` VARCHAR(128),
`postal` VARCHAR(16),
`country_id` INTEGER,
`province` VARCHAR(128),
`email1` VARCHAR(128),
`email2` VARCHAR(128),
`country_code1` VARCHAR(4),
`country_code2` VARCHAR(4),
`area_code1` VARCHAR(4),
`area_code2` VARCHAR(4),
`phone1` VARCHAR(128),
`phone2` VARCHAR(128),
`gre_score` DOUBLE,
`tofle_score` DOUBLE,
`gpa_score` DOUBLE,
`study_avail_time` DATETIME,
`study_level_id` INTEGER,
`study_type_id` INTEGER,
`education_level_id` INTEGER,
`highest_education_school` VARCHAR(256),
`proposed_research_topic` TEXT,
`universities_applied` TEXT,
`looking_for` TEXT,
`create_time` DATETIME,
`update_time` DATETIME,
`last_login_time` DATETIME
) ENGINE = InnoDB;


CREATE TABLE `ps_professor`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`username` VARCHAR(128),
`password` VARCHAR(128),
`first_name` VARCHAR(128),
`last_name` VARCHAR(128),
`gender_id` INTEGER,
`race` VARCHAR(128),
`nationality` VARCHAR(128),
`address_line1` VARCHAR(128),
`address_line2` VARCHAR(128),
`address_line3` VARCHAR(128),
`address_line4` VARCHAR(128),
`postal` VARCHAR(16),
`country_id` INTEGER,
`province` VARCHAR(128),
`email1` VARCHAR(128),
`email2` VARCHAR(128),
`country_code1` VARCHAR(4),
`country_code2` VARCHAR(4),
`area_code1` VARCHAR(4),
`area_code2` VARCHAR(4),
`phone1` VARCHAR(128),
`phone2` VARCHAR(128),
`create_time` DATETIME,
`update_time` DATETIME,
`last_login_time` DATETIME,
`university` TEXT,
`school` INTEGER,
`division` INTEGER,
`research` TEXT,
`requirements` TEXT,
`looking_for` TEXT
) ENGINE = InnoDB;


CREATE TABLE `ps_country`
(
`id` INTEGER NOT NULL PRIMARY KEY,
`country_name` VARCHAR(128)
) ENGINE = InnoDB;


CREATE TABLE `ps_study_level`
(
`id` INTEGER NOT NULL PRIMARY KEY,
`study_level_name` VARCHAR(128)
) ENGINE = InnoDB;


CREATE TABLE `ps_study_type`
(
`id` INTEGER NOT NULL PRIMARY KEY,
`study_type_name` VARCHAR(128)
) ENGINE = InnoDB;


CREATE TABLE `ps_gender`
(
`id` INTEGER NOT NULL PRIMARY KEY,
`gender_name` VARCHAR(16)
) ENGINE = InnoDB;


CREATE TABLE `ps_education_level`
(
`id` INTEGER NOT NULL PRIMARY KEY,
`education_level_name` VARCHAR(128)
) ENGINE = InnoDB;


CREATE TABLE `ps_education_school`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`institute_name` VARCHAR(255),
`note` TEXT
) ENGINE = InnoDB;



CREATE TABLE `ps_education_division`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`division_name` VARCHAR(255),
`note` TEXT
) ENGINE = InnoDB;



CREATE TABLE `ps_awards`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`student_id` INTEGER,
`award_name` VARCHAR(255),
`note` TEXT
) ENGINE = InnoDB;


CREATE TABLE `ps_research_field`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`research_field_name` VARCHAR(256),
`research_field_category` VARCHAR(128)
) ENGINE = InnoDB;


CREATE TABLE ps_student_research_field
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`student_id` INTEGER,
`research_field_id` INTEGER
) ENGINE = InnoDB;


CREATE TABLE `ps_student_friends`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`student_id` INTEGER,
`friend_id` INTEGER
) ENGINE = InnoDB;


CREATE TABLE ps_professor_research_field
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`professor_id` INTEGER,
`research_field_id` INTEGER
) ENGINE = InnoDB;


CREATE TABLE `ps_professor_friends`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`professor_id` INTEGER,
`friend_id` INTEGER
) ENGINE = InnoDB;


CREATE TABLE `ps_article`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`title` VARCHAR(256),
`journal` VARCHAR(256),
`pages` VARCHAR(16),
`publish_year` INTEGER,
`note` TEXT,
`author` TEXT
) ENGINE = InnoDB;


CREATE TABLE `ps_student_article`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`student_id` INTEGER,
`article_id` INTEGER
) ENGINE = InnoDB;


CREATE TABLE `ps_professor_article`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`professor_id` INTEGER,
`article_id` INTEGER
) ENGINE = InnoDB;

CREATE TABLE `ps_messages`
(
`id` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
`from_id` INTEGER,
`from_type` INTEGER,
`to_id` INTEGER,
`to_type` INTEGER,
`text_message` TEXT,
`text_date` DATETIME,
`note` TEXT,
`field1` VARCHAR(256),
`field2` VARCHAR(256),
`text_type` INTEGER
) ENGINE = InnoDB;

CREATE TABLE SourceMessage
(
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(32),
    message TEXT
) ENGINE = InnoDB;

CREATE TABLE Message
(
    id INTEGER,
    language VARCHAR(16),
    translation TEXT,
    PRIMARY KEY (id, language),
    CONSTRAINT FK_Message_SourceMessage FOREIGN KEY (id)
         REFERENCES SourceMessage (id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB;

ALTER TABLE `ps_student`
ADD CONSTRAINT `IRFK_student_country` FOREIGN KEY (country_id)
REFERENCES `ps_country` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student`
ADD CONSTRAINT `IRFK_student_study_level` FOREIGN KEY (study_level_id)
REFERENCES `ps_study_level` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student`
ADD CONSTRAINT `IRFK_student_study_type` FOREIGN KEY (study_type_id)
REFERENCES `ps_study_type` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student`
ADD CONSTRAINT `IRFK_student_gender` FOREIGN KEY (gender_id)
REFERENCES `ps_gender` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student`
ADD CONSTRAINT `IRFK_student_education_level` FOREIGN KEY (education_level_id)
REFERENCES `ps_education_level` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_awards`
ADD CONSTRAINT `IRFK_awards_student` FOREIGN KEY (student_id)
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_research_field`
ADD CONSTRAINT `IRFK_student_research_field_one` FOREIGN KEY (student_id) 
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_research_field` 
ADD CONSTRAINT `IRFK_student_research_field_two` FOREIGN KEY (research_field_id) 
REFERENCES `ps_research_field` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_friends` 
ADD CONSTRAINT `IRFK_student_friends_one` FOREIGN KEY (student_id) 
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_friends` 
ADD CONSTRAINT `IRFK_student_friends_two` FOREIGN KEY (friend_id) 
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_article` 
ADD CONSTRAINT `IRFK_student_article_one` FOREIGN KEY (student_id) 
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_student_article` 
ADD CONSTRAINT `IRFK_student_article_two` FOREIGN KEY (article_id) 
REFERENCES `ps_article` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_awards` 
ADD CONSTRAINT `IRFK_awards` FOREIGN KEY (student_id) 
REFERENCES `ps_student` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_research_field`
ADD CONSTRAINT `IRFK_professor_research_field_one` FOREIGN KEY (professor_id) 
REFERENCES `ps_professor` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_research_field` 
ADD CONSTRAINT `IRFK_professor_research_field_two` FOREIGN KEY (research_field_id) 
REFERENCES `ps_research_field` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_friends` 
ADD CONSTRAINT `IRFK_professor_friends_one` FOREIGN KEY (professor_id) 
REFERENCES `ps_professor` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_friends` 
ADD CONSTRAINT `IRFK_professor_friends_two` FOREIGN KEY (friend_id) 
REFERENCES `ps_professor` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_article` 
ADD CONSTRAINT `IRFK_professor_article_one` FOREIGN KEY (professor_id) 
REFERENCES `ps_professor` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE `ps_professor_article` 
ADD CONSTRAINT `IRFK_professor_article_two` FOREIGN KEY (article_id) 
REFERENCES `ps_article` (id) ON DELETE CASCADE ON UPDATE RESTRICT;# MySQL returned an empty result set (i.e. zero rows).


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS pcounter_save ( save_name varchar(10) NOT NULL, save_value int(10) unsigned NOT NULL ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO pcounter_save (save_name, save_value) VALUES ('day_time', 2455527), ('max_count', 0), ('counter', 0), ('yesterday', 0);

CREATE TABLE IF NOT EXISTS pcounter_users ( user_ip varchar(39) NOT NULL, user_time int(10) unsigned NOT NULL, UNIQUE KEY user_ip (user_ip) ) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO pcounter_users (user_ip, user_time) VALUES ('''127.0.0.1''', 1290821670);
