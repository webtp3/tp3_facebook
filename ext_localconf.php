<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Tp3.Tp3Facebook',
            'Fbplugin',
            [
                'FbPlugin' => 'list, show'
            ],
            // non-cacheable actions
            [
                'FbPlugin' => 'share'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					fbplugin {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_fbplugin.svg
						title = LLL:EXT:tp3_facebook/Resources/Private/Language/locallang_db.xlf:tx_tp3_facebook_domain_model_fbplugin
						description = LLL:EXT:tp3_facebook/Resources/Private/Language/locallang_db.xlf:tx_tp3_facebook_domain_model_fbplugin.description
						tt_content_defValues {
							CType = list
							list_type = tp3facebook_fbplugin
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
