<?php

/*
 * This file is part of the web-tp3/tp3-facebook.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

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
    'version' => '1.1.14',
    'constraints' =>
        [
            'depends' =>
                [
                    'typo3' => '8.7.0-9.9.99',

                ],
            'conflicts' =>
                [

                ],
            'suggests' =>
                [
                ],
        ],
    'autoload' =>
        [
            'psr-4' =>
                [
                    'Tp3\\Tp3Facebook\\' => 'Classes',
                ],
        ],
    'clearcacheonload' => false,
    'author_company' => 'tp3',
];
