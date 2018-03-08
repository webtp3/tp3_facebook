<?php
defined('TYPO3_MODE') || die();
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['tp3facebook_fbplugin']='layout,select_key,pages,recursive';

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['tp3facebook_fbplugin']='pi_flexform';

/* Add the plugins */
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(Array('LLL:EXT:tp3facebook/Resources/Private/Languages/locallang_csh_tx_tp3facebook_domain_model_fbplugin.xlf:tt_content.tp3facebook_fbplugin', 'tp3facebook_fbplugin'),'list_type', 'tp3facebook_fbplugin');

/* Add the flexforms to the TCA */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('tp3facebook_fbplugin', 'FILE:EXT:tp3_facebook/Configuration/FlexForms/flexform.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tp3facebook_fbplugin', 'EXT:tp3_facebook/Resources/Private/Language/locallang_csh_tx_tp3facebook_domain_model_fbplugin.xlf');
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_tp3facebook_domain_model_fbplugin');
