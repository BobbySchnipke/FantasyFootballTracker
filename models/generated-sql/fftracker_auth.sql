
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- api_user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `api_user`;

CREATE TABLE `api_user`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(64) NOT NULL,
    `api_key` VARCHAR(64) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `restrict_ip` TINYINT(1) DEFAULT 0 NOT NULL,
    `restrict_route` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `username` (`username`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
