CREATE TABLE IF NOT EXISTS `cms`.`categories` ( `cate_id` INT(3) NOT NULL AUTO_INCREMENT , `cate_title` VARCHAR(255) NOT NULL , PRIMARY KEY (`cate_id`)) ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `cms`.`posts` ( `id` INT(3) NOT NULL AUTO_INCREMENT , `post_category_id` INT(3) NOT NULL , `post_title` VARCHAR(255) NOT NULL , `post_autor` VARCHAR(255) NOT NULL , `post_date` DATE NOT NULL , `post_image` TEXT NOT NULL , `post_content` TEXT NOT NULL , `post_tags` VARCHAR(255) NOT NULL , `post_comment_count` VARCHAR(255) NOT NULL , `post_status` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;