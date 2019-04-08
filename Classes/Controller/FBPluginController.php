<?php

/*
 * This file is part of the web-tp3/tp3-facebook.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Tp3\Tp3Facebook\Controller;

/***
 *
 * This file is part of the "tp3 Facebook Plugins" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Thomas Ruta &lt;email@thomasruta.de&gt;, R&amp;P IT Consulting GmbH
 *
 ***/

/**
 * FBPluginController
 */
class FBPluginController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $cObj = $this->configurationManager->getContentObject();

        $this->conf = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);

        $fbPlugins = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Tp3\Tp3Facebook\Plugin\FBPlugin::class)->main($cObj, $this->conf);
        $this->view->assign('fbPlugins', $fbPlugins);
    }

    /**
     * action show
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $fbPlugin
     * @return void
     */
    public function showAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $fbPlugin)
    {
        $this->view->assign('fbPlugin', $fbPlugin);
    }

    /**
     * action share
     *
     * @return void
     */
    public function shareAction()
    {
    }
}
