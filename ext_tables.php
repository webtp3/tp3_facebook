<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Tp3.Tp3Facebook',
            'Fbplugin',
            'Facebook Plugin'
        );

       // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'tp3 Facebook Plugins');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_tp3facebook_domain_model_fbplugin', 'EXT:tp3_facebook/Resources/Private/Language/locallang_csh_tx_tp3facebook_domain_model_fbplugin.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tp3facebook_domain_model_fbplugin');
       // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tp3facebook_fbplugin', 'EXT:tp3_facebook/Resources/Private/Language/locallang_csh_tx_tp3facebook_domain_model_fbplugin.xlf');

    },
    $_EXTKEY
);
