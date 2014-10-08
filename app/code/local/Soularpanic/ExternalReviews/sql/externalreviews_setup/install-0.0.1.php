<?php

$installer = $this;
$installer->startSetup();

$installer->run("
    CREATE TABLE `{$installer->getTable('externalreviews/review')}` (
      `entity_id` INT PRIMARY KEY AUTO_INCREMENT,
      `nickname` VARCHAR(255),
      `detail` TEXT,
      `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      `source_banner_url` VARCHAR(255),
      `source_image_url` VARCHAR(255),
      `source_icon_url` VARCHAR(255)
    );
");

$installer->endSetup();