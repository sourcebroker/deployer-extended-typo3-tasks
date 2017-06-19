deployer-extended-typo3-tasks
=============================

.. image:: http://img.shields.io/packagist/v/sourcebroker/deployer-extended-typo3-tasks.svg?style=flat
   :target: https://packagist.org/packages/sourcebroker/deployer-extended-typo3-tasks

.. image:: https://img.shields.io/badge/license-MIT-blue.svg?style=flat
   :target: https://packagist.org/packages/sourcebroker/deployer-extended-typo3-tasks

|

.. contents:: :local:

What does it do?
----------------

This package takes TYPO3 cli commands (since TYPO3 8.7) and typo3_console commands and make them available as
deployer tasks. The mapping of commands is made automatically which means all commands of currently loaded
TYPO3 extensions are available also (by typo3_console mapping).

How this can be useful for me?
------------------------------

The most useful is "dep media:pull [target]" task which allows you to pull media from target instance with rsync.
Having possibility to fast synchronise media can speed up instance dependent development.

Installation
------------

1) Install package with composer:
   ::

      composer require sourcebroker/deployer-extended-typo3-tasks

2) If you are using deployer as composer package then just put following line in your deploy.php:
   ::

      new \SourceBroker\DeployerExtendedTypo3Tasks\Loader();

3) If you are using deployer as phar then put following lines in your deploy.php:
   ::

      require __DIR__ . '/vendor/autoload.php';
      new \SourceBroker\DeployerExtendedTypo3Tasks\Loader();

4) Check the list of new tasks with:
   ::

      dep list


Commands usage
--------------

After installation you can use all TYPO3 and typo3_console commands like in following example:
::

   dep typo3cms:database:updateschema live

or for TYPO3 commands (since TYPO3 8.7):
::

   dep typo3:cleanup:deletedrecords live

If you want to see the output of command then use -vvv switch. Example:
::

   dep typo3:cleanup:deletedrecords live -vvv

If you want to add some option then use "option" option and put whole option inside. Example:
::

   dep typo3cms:database:updateschema live --option="--schema-update-types=\"*.add\""



Commands index
--------------

List of TYPO3 8.7 commands available as deployer tasks:
::

    typo3:backend:lock                                            Lock the TYPO3 Backend
    typo3:backend:unlock                                          Unlock the TYPO3 Backend
    typo3:cleanup:deletedrecords                                  Permanently deletes all records marked as "deleted" in the database.
    typo3:cleanup:flexforms                                       Updates all database records which have a FlexForm field and the XML data does not match the chosen datastructure.
    typo3:cleanup:lostfiles                                       Looking for files in the uploads/ folder which does not have a reference in TYPO3 managed records.
    typo3:cleanup:missingfiles                                    Find all file references from records pointing to a missing (non-existing) file.
    typo3:cleanup:missingrelations                                Find all record references pointing to a non-existing record
    typo3:cleanup:multiplereferencedfiles                         Looking for files from TYPO3 managed records which are referenced more than once
    typo3:cleanup:orphanrecords                                   Find and delete records that have lost their connection with the page tree.
    typo3:cleanup:rteimages                                       Looking up all occurrences of RTEmagic images in the database and check existence of parent and copy files on the file system plus report possibly lost RTE files.
    typo3:cleanup:versions                                        Find all versioned records and possibly cleans up invalid records in the database.
    typo3:extbase:help:help                                       The help command displays help for a given command: ./typo3/sysext/core/bin/typo3 extbase:help
    typo3:extensionmanager:extension:dumpclassloadinginformation  This command is only needed during development. The extension manager takes care creating or updating this info properly during extension (de-)activation.
    typo3:extensionmanager:extension:install                      The extension files must be present in one of the recognised extension folder paths in TYPO3.
    typo3:extensionmanager:extension:uninstall                    The extension files must be present in one of the recognised extension folder paths in TYPO3.
    typo3:help                                                    Displays help for a command
    typo3:impexp:import                                           Imports a T3D / XML file with content into a page tree
    typo3:list                                                    Lists commands
    typo3:referenceindex:update                                   Update the reference index of TYPO3
    typo3:scheduler:run                                           Start the TYPO3 Scheduler from the command line.
    typo3:syslog:list                                             Show entries from the sys_log database table of the last 24 hours.

List of ext:typo3_console 4.6 commands available as deployer tasks:
::

    typo3cms:autocomplete                       Generate shell auto complete script
    typo3cms:backend:lock                       Lock backend
    typo3cms:backend:lockforeditors             Lock backend for editors
    typo3cms:backend:unlock                     Unlock backend
    typo3cms:backend:unlockforeditors           Unlock backend for editors
    typo3cms:cache:flush                        Flush all caches
    typo3cms:cache:flushgroups                  Flush all caches in specified groups
    typo3cms:cache:flushtags                    Flush cache by tags
    typo3cms:cache:listgroups                   List cache groups
    typo3cms:cleanup:updatereferenceindex       Update reference index
    typo3cms:configuration:remove               Remove configuration option
    typo3cms:configuration:set                  Set configuration value
    typo3cms:configuration:show                 Show configuration value
    typo3cms:configuration:showactive           Show active configuration value
    typo3cms:configuration:showlocal            Show local configuration value
    typo3cms:database:export                    Export database to stdout
    typo3cms:database:import                    Import mysql from stdin
    typo3cms:database:updateschema              Update database schema
    typo3cms:documentation:generatexsd          Generate Fluid ViewHelper XSD Schema
    typo3cms:extension:activate                 Activate extension(s)
    typo3cms:extension:deactivate               Deactivate extension(s)
    typo3cms:extension:dumpautoload             Dump class auto-load
    typo3cms:extension:list                     List extensions that are available in the system
    typo3cms:extension:removeinactive           Removes all extensions that are not marked as active
    typo3cms:extension:setup                    Set up extension(s)
    typo3cms:extension:setupactive              Set up all active extensions
    typo3cms:frontend:request                   Submit frontend request
    typo3cms:help                               Help
    typo3cms:install:extensionsetupifpossible   Setup TYPO3 with extensions if possible
    typo3cms:install:fixfolderstructure         Fix folder structure
    typo3cms:install:generatepackagestates      Generate PackageStates.php file
    typo3cms:install:setup                      TYPO3 Setup
    typo3cms:language:update                    Update language file for each extension
    typo3cms:scheduler:run                      Run scheduler
    typo3cms:upgrade:all                        Execute all upgrade wizards that are scheduled for execution
    typo3cms:upgrade:checkextensionconstraints  Check TYPO3 version constraints of extensions
    typo3cms:upgrade:list                       List upgrade wizards
    typo3cms:upgrade:wizard                     Execute a single upgrade wizard


Known problems
--------------

None.


To-Do list
----------

None.