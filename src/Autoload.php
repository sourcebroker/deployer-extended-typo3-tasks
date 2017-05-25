<?php

// run only if called from deployer context
if (PHP_SAPI === 'cli' && defined('DEPLOYER_MODE')) {
    \SourceBroker\DeployerExtended\Utility\FileUtility::requireFilesFromDirectoryReqursively(__DIR__.'/../deployer/task/');
}