<?php
defined('TYPO3_MODE') || die('Access denied.');


    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    fbplugin {
                        iconIdentifier = ext-'.$_EXTKEY.'-wizard-icon
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
    /*
     * Icons
     */
    if (TYPO3_MODE === 'BE') {
        $icons = [
            'ext-'.$_EXTKEY.'-wizard-icon' => 'user_plugin_fbplugin.svg',
        ];
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:'.$_EXTKEY.'/Resources/Public/Icons/' . $path]
            );
        }
    }
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['ext/install']['update'][\Tp3\Tp3Facebook\Updates\Tp3FacebookpluginUpdate::class]
        = \Tp3\Tp3Facebook\Updates\Tp3FacebookpluginUpdate::class;