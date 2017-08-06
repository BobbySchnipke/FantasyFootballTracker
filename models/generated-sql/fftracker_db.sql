
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

-- ---------------------------------------------------------------------
-- scores
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `week` INTEGER NOT NULL,
    `team` VARCHAR(255) NOT NULL,
    `opponent` VARCHAR(255) NOT NULL,
    `team_score` INTEGER NOT NULL,
    `opponent_score` INTEGER NOT NULL,
    `outcome` VARCHAR(10) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- teams
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `league_id` INTEGER NOT NULL,
    `team_name` VARCHAR(255) NOT NULL,
    `team_owner` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `league_id` (`league_id`),
    CONSTRAINT `teams_ibfk_1`
        FOREIGN KEY (`league_id`)
        REFERENCES `leagues` (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
