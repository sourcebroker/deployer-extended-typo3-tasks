<?php

namespace Deployer;

$tasks = [];
exec("typo3cms help --raw", $output);
foreach ($output as $record) {
    $tasks[substr($record, 0, strpos($record, ' '))] = trim(substr($record, strpos($record, ' '), strlen($record)));
}

foreach ($tasks as $taskKey => $taskDescription) {
    task('typo3console:'.$taskKey, function () use ($taskKey){
        if (run('if [ -L {{deploy_path}}/release ] ; then echo true; fi')->toBool()) {
            set('active_dir', get('deploy_path') . '/release');
        } else {
            set('active_dir', get('deploy_path') . '/current');
        }

        output()->writeln(run("cd {{active_dir}} && {{bin/php}} {{bin/typo3cms}} ".$taskKey));
    })->desc($taskDescription);
}
