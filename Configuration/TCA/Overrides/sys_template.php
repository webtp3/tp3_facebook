<?php
defined('TYPO3_MODE') || die();
/*
 * // Add an entry in the static template list found in sys_templates for static TS
 *
 */
/*\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'tp3_facebook',
    'Configuration/TypoScrip/Plugin',
    'Fbplugin'
);*/
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('tp3_facebook', 'Configuration/TypoScript', 'tp3 Facebook');