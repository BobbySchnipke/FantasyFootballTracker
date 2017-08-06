
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- leagues
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `leagues`;

CREATE TABLE `leagues`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `site` VARCHAR(255) NOT NULL,
    `league_name` VARCHAR(255) NOT NULL,
    `league_id` VARCHAR(255),
    PRIMARY KEY (`id`),
    UNIQUE INDEX `id_2` (`id`),
    INDEX `id` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
