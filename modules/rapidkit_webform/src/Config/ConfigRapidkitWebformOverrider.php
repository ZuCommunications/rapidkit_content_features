<?php

namespace Drupal\rapidkit_webform\Config;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Config\ConfigFactoryOverrideInterface;
use Drupal\Core\Config\StorageInterface;

class ConfigRapidkitWebformOverrider implements ConfigFactoryOverrideInterface {

    /**
     * {@inheritdoc}
     */
    public function loadOverrides($names) {
        $overrides = [];

        if(in_array('webform.settings', $names)) {
            $overrides['webform.settings'] = [
                'third_party_settings' => [
                    'antibot' => ['antibot', true],
                    'honeypot' => ['honeypot', true],
                    'captcha' => ['replace_administration_mode', true]
                ]
            ];
        }

        return $overrides;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheSuffix() {
        return 'ConfigRapidkitWebformOverrider';
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheableMetadata($name) {
        return new CacheableMetadata();
    }

    /**
     * {@inheritdoc}
     */
    public function createConfigObject($name, $collection = StorageInterface::DEFAULT_COLLECTION) {
        return NULL;
    }
}