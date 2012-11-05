<?php
    namespace Library\Framework;

    class Loader {
        public function __construct() {
            spl_autoload_register(function($class) {
                $path = explode('\\', $class);

                if (count($path) == 0) {
                    throw new \Exception('Wrong namespace/class path');
                }

                $fileNamePos = count($path) - 1;
                $pos = 0;
                $file = BASE_DIR;

                foreach ($path as $node) {
                    if ($pos++ != $fileNamePos) {
                        $file .= '/' . strtolower($node);
                    } else {
                        $file .= '/' . $node . '.php';
                    }
                }

                if (!is_file($file)) {
                    throw new \Exception('No such class.');
                }

                return require_once $file;
            });
        }
    }
?>