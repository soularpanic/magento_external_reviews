<?php

$installer = $this;
$installer->startSetup();

$installer->run("
    CREATE TABLE `{$installer->getTable('externalreviews/ExternalReview')}` (
      `entity_id` INT PRIMARY AUTO_INCREMENT,
      `nickname`,
      `detail`,
      `created_at`,
      `source_banner_url`,
      `source_image_url`,
      `source_icon_url`
    )
");

$installer->endSetup();