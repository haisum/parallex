ALTER TABLE  `comment` ADD  `status` INT NOT NULL DEFAULT  '1' COMMENT  '0 = pending approval, 1 = approved, 2 = spam';

ALTER TABLE  `image` CHANGE  `position`  `position` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  'we could sort using this attribute';

ALTER TABLE  `image` CHANGE  `type`  `type` INT( 4 ) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  '1 = slider, 2= background, 3=other, 4= thumbnail';
