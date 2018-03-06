<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Tp3.Tp3Facebook',
            'Fbplugins',
            [
                'FBPlugin' => 'list, edit, show, create, delete'
            ],
            // non-cacheable actions
            [
                'FBPlugin' => 'create, update, delete, '
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					fbplugins {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_fbplugins.svg
						title = LLL:EXT:tp3_facebook/Resources/Private/Language/locallang_db.xlf:tx_tp3_facebook_domain_model_fbplugins
						description = LLL:EXT:tp3_facebook/Resources/Private/Language/locallang_db.xlf:tx_tp3_facebook_domain_model_fbplugins.description
						tt_content_defValues {
							CType = list
							list_type = tp3facebook_fbplugins
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
