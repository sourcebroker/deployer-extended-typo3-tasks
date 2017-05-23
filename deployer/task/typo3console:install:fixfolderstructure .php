<?php

namespace Deployer;

task('typo3console:install:fixfolderstructure', function(){

    // Set active_dir so the task can be used before or after "symlink" task and after deploy.
    if (run('if [ -L {{deploy_path}}/release ] ; then echo true; fi')->toBool()) {
        set('active_dir', get('deploy_path') . '/release');
    } else {
        set('active_dir', get('deploy_path') . '/current');
    }

    run('cd {{active_dir}} && {{bin/php}} {{bin/typo3cms}} install:fixfolderstructure');

})->desc('ext:typo3_console command "install:fixfolderstructure"');