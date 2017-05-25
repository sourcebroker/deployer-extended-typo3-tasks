<?php

namespace Deployer;

if (defined('DEPLOYER') && PHP_SAPI === 'cli') {
    exec("typo3cms help --raw", $output);
    foreach ((array)$output as $outputLine) {
        $taskKey = substr($outputLine, 0, strpos($outputLine, ' '));
        $taskDescription = trim(substr($outputLine, strpos($outputLine, ' '), strlen($outputLine)));
        task('typo3console:' . $taskKey, function () use ($taskKey) {
            if (run('if [ -L {{deploy_path}}/release ] ; then echo true; fi')->toBool()) {
                set('active_dir', get('deploy_path') . '/release');
            } else {
                set('active_dir', get('deploy_path') . '/current');
            }
            output()->writeln(run("cd {{active_dir}} && {{bin/php}} {{bin/typo3cms}} " . $taskKey));
        })->desc($taskDescription);
    }
}