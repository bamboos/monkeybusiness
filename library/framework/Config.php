<?php
    namespace Library\Framework;
    class Config {
        private static $_config = null;

        private function __construct() {

        }

        public static  function get($key) {
            if (!self::$_config) {
                self::$_config = json_decode(file_get_contents(BASE_DIR . '/app/config.json'));
            }

            return self::$_config->$key;
        }
    }