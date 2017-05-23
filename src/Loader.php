<?php

namespace SourceBroker\DeployerExtendedTypo3Console;

class Loader
{
    public function __construct()
    {
        $absolutePath = __DIR__ . '/../deployer/task';
        if (is_dir($absolutePath)) {
            $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($absolutePath), \RecursiveIteratorIterator::SELF_FIRST);
            foreach ($iterator as $file) {
                /** @var $file \SplFileInfo */
                if ($file->isFile()) {
                    if ($file->getExtension() == 'php') {
                        require_once $file->getRealPath();
                    }
                }
            }
        }
    }
}


