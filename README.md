## What does it do?

This package takes TYPO3 cli commands provided by typo3_console and other extensions and make them as 
deployer tasks. The mapping of commands is made automatically which means all commands of currently 
loaded TYPO3 extensions are available.

## Installation

    composer require sourcebroker/deployer-extended-typo3-console

## Commands

After installation you can use all TYPO3 commands like in following example:

    dep typo3console:database:updateschema live

Here is the full list of typo3_console v 4.6 commands:

    typo3console:autocomplete                       Generate shell auto complete script
    typo3console:backend:lock                       Lock backend
    typo3console:backend:lockforeditors             Lock backend for editors
    typo3console:backend:unlock                     Unlock backend
    typo3console:backend:unlockforeditors           Unlock backend for editors
    typo3console:cache:flush                        Flush all caches
    typo3console:cache:flushgroups                  Flush all caches in specified groups
    typo3console:cache:flushtags                    Flush cache by tags
    typo3console:cache:listgroups                   List cache groups
    typo3console:cleanup:updatereferenceindex       Update reference index
    typo3console:configuration:remove               Remove configuration option
    typo3console:configuration:set                  Set configuration value
    typo3console:configuration:show                 Show configuration value
    typo3console:configuration:showactive           Show active configuration value
    typo3console:configuration:showlocal            Show local configuration value
    typo3console:database:export                    Export database to stdout
    typo3console:database:import                    Import mysql from stdin
    typo3console:database:updateschema              Update database schema
    typo3console:documentation:generatexsd          Generate Fluid ViewHelper XSD Schema
    typo3console:extension:activate                 Activate extension(s)
    typo3console:extension:deactivate               Deactivate extension(s)
    typo3console:extension:dumpautoload             Dump class auto-load
    typo3console:extension:list                     List extensions that are available in the system
    typo3console:extension:removeinactive           Removes all extensions that are not marked as active
    typo3console:extension:setup                    Set up extension(s)
    typo3console:extension:setupactive              Set up all active extensions
    typo3console:frontend:request                   Submit frontend request
    typo3console:help                               Help
    typo3console:install:extensionsetupifpossible   Setup TYPO3 with extensions if possible
    typo3console:install:fixfolderstructure         Fix folder structure
    typo3console:install:generatepackagestates      Generate PackageStates.php file
    typo3console:install:setup                      TYPO3 Setup
    typo3console:language:update                    Update language file for each extension
    typo3console:scheduler:run                      Run scheduler
    typo3console:upgrade:all                        Execute all upgrade wizards that are scheduled for execution
    typo3console:upgrade:checkextensionconstraints  Check TYPO3 version constraints of extensions
    typo3console:upgrade:list                       List upgrade wizards
    typo3console:upgrade:wizard                     Execute a single upgrade wizard


## Known problems
None.

## To-Do list
None.