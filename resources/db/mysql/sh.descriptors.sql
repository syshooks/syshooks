CREATE TABLE IF NOT EXISTS `syshooks`.`descriptors` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT NOW(),
    `type` INT(11) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,
    UNIQUE  INDEX `uname` (`name`, `type`),
    PRIMARY KEY (`id`) 
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci` AUTO_INCREMENT=1;