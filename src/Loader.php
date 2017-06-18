<?php

namespace SourceBroker\DeployerExtendedTypo3Tasks;
use Deployer\Deployer;

class Loader
{
    public function __construct()
    {
        option('option', null, 4, 'Options for typo3cms or typo3 commands');

        // We looking for available command on local instance. This assume of course that local and remote instances have
        // the same version of TYPO3 and extensions which should be true for most cases.
        $deployerTasksGroups = [];

        if (file_exists('./vendor/bin/typo3cms')) {
            exec("./vendor/bin/typo3cms help --raw", $typo3cms, $exitStatus);
            $deployerTasksGroups[] = [
                'deployerPrefix' => 'typo3cms',
                'binary' => 'typo3cms',
                'commands' => $typo3cms,
                'exitCode' => $exitStatus
            ];
        }

        // Since TYPO3 8 there is ability to call TYPO3 commands directly by using "typo3" in cli
        if (file_exists('./vendor/bin/typo3')) {
            exec("./vendor/bin/typo3 list --raw", $typo3, $exitStatus);
            $deployerTasksGroups[] = [
                'deployerPrefix' => 'typo3',
                'binary' => 'typo3',
                'commands' => $typo3,
                'exitCode' => $exitStatus
            ];
        }

        foreach ($deployerTasksGroups as $deployerTasksGroup) {
            if ($deployerTasksGroup['exitCode'] === 0) {
                foreach ($deployerTasksGroup['commands'] as $commandRawLine) {
                    preg_match('/^([a-zA-Z:]+)\\s(.*)$/', $commandRawLine, $match);
                    if(is_array($match) && isset($match[1]) && isset($match[2])) {
                        $taskKey = $match[1];
                        $taskDescription = trim($match[2]);
                        if (preg_match('/^[a-zA-Z:]+$/', $taskKey)) {
                            $deployerTasksGroupBinary = $deployerTasksGroup['binary'];
                            task($deployerTasksGroup['deployerPrefix'] . ':' . $taskKey, function () use ($taskKey, $deployerTasksGroupBinary) {
                                if (test('[ -L {{deploy_path}}/release ]')) {
                                    set('active_dir', get('deploy_path') . '/release');
                                } else {
                                    set('active_dir', get('deploy_path') . '/current');
                                }
                                $option = '';
                                if (input()->hasOption('option')) {
                                    $option = input()->getOption('option');
                                }
                                if (get('bin/' . $deployerTasksGroupBinary, false) === false) {
                                    $command = run('which ' . $deployerTasksGroupBinary)->toString();
                                } else {
                                    $command = '{{bin/' . $deployerTasksGroupBinary . '}}';
                                }
                                run('cd {{active_dir}} && {{bin/php}} ' . $command . ' ' . $taskKey . ' ' . $option);
                            })->desc($taskDescription);
                        }
                    }
                }
            }
        }
    }
}
