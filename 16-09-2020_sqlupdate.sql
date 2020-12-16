ALTER TABLE `user_subscriptions` ADD `is_active` TINYINT(1) NOT NULL DEFAULT '1' AFTER `auto_renew`;

--02-10-2020
ALTER TABLE `prewritten_contents` CHANGE `type` `type` ENUM('experience','skills','summary','opener','education') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'experience';
--03-10-2020
ALTER TABLE `templates` ADD `required_image` TINYINT(1) NOT NULL DEFAULT '0' AFTER `type`, ADD `tag` VARCHAR(50) NOT NULL DEFAULT 'simple' AFTER `required_image`;

--05-10-2020
ALTER TABLE `prewritten_contents` CHANGE `type` `type` ENUM('experience','skills','summary','opener','education','Community Service','Language','Affiliations','Awards','Additional Information','Publication','Accomplishments') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'experience';

--06-10-200
ALTER TABLE `user_resumes` ADD `style_section` TEXT NULL AFTER `extra_section`;

--08-10-2020
ALTER TABLE `user_letters` ADD `title` VARCHAR(200) NOT NULL AFTER `user_id`;

--09-10-2020
ALTER TABLE `user_resumes` ADD `upload_file` VARCHAR(250) NULL AFTER `complete_step`;

--12-10-2020
ALTER TABLE `prewritten_contents` CHANGE `type` `type` VARCHAR(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'experience';

--19-10-2020
ALTER TABLE `payments` ADD `payment_type` VARCHAR(20) NULL AFTER `payment_status`, ADD `action` VARCHAR(50) NULL AFTER `payment_type`;

--20-10-2020
ALTER TABLE `user_resumes` ADD `sortable` VARCHAR(200) NULL AFTER `upload_file`;
ALTER TABLE `user_resumes` CHANGE `sortable` `sortable` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `user_letters` CHANGE `opener` `opener` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `user_letters` ADD `sortable` TEXT NULL AFTER `style_section`;
