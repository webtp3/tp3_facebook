<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "tp3_facebook"
 *
 * Auto generated by Extension Builder 2018-03-07
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'tp3 Facebook Plugins',
    'description' => 'Facebook Social Plugins',
    'category' => 'fe',
    'author' => 'Thomas Ruta',
    'author_email' => 'email@thomasruta.de',
    'state' => 'beta',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.1.11',
    'constraints' =>
        array (
            'depends' =>
                array (
                    'typo3' => '8.7.0-9.9.99',

                ),
            'conflicts' =>
                array (

                ),
            'suggests' =>
                array (
                ),
        ),
    'autoload' =>
        array (
            'psr-4' =>
                array (
                    'Tp3\\Tp3Facebook\\' => 'Classes',
                ),
        ),
    'clearcacheonload' => false,
    'author_company' => 'tp3',
];
