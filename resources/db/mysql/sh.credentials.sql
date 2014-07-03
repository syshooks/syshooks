CREATE TABLE IF NOT EXISTS `syshooks`.`credentials` (
    `id` INT(11) NOT NULL AUTO_INCREMENT, 
    `created` TIMESTAMP NOT NULL DEFAULT 0,
    `account_id` INT(11) NOT NULL,
    `hook_id` INT(11) NOT NULL,
    `method` ENUM("oauth1", "oauth2", "basic") NOT NULL DEFAULT "oauth1", 
    `api_key` VARCHAR(255) NOT NULL,
    `api_secret` VARCHAR(255) NOT NULL,
    `api_signature` VARCHAR(255) NOT NULL,
    `api_nonce` VARCHAR(255) NOT NULL,
    `last_active` TIMESTAMP NOT NULL DEFAULT 0,
    `last_activated` TIMESTAMP NOT NULL DEFAULT 0,
    `last_modified` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP,
    `activated` BOOLEAN NOT NULL DEFAULT 0,
    `suspended` BOOLEAN NOT NULL DEFAULT 0,
    `banned` BOOLEAN NOT NULL DEFAULT 0,
    `deleted` BOOLEAN NOT NULL DEFAULT 0,

    FOREIGN KEY (`creator_id`) REFERENCES `accounts`(`id`),
    FOREIGN KEY (`creator_id`) REFERENCES `hooks`(`id`),

    PRIMARY KEY (`id`) 
) ENGINE=`InnoDB` DEFAULT CHARSET=`utf8` COLLATE=`utf8_unicode_ci` AUTO_INCREMENT=1;