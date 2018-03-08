<?php
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
 * FbPluginController
 */
class FbPluginController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
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

        $fbPlugins = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\Tp3\Tp3Facebook\Plugin\FBPlugins::class)->main($cObj,$this->conf);
        $this->view->assign('fbPlugins', $fbPlugins );
    }

    /**
     * action show
     * 
     * @param \Tp3\Tp3Facebook\Domain\Model\FbPlugin $fbPlugin
     * @return void
     */
    public function showAction(\Tp3\Tp3Facebook\Domain\Model\FbPlugin $fbPlugin)
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

    /**
     * This method assigns some default variables to the view
     */
    private function setDefaultViewVars() {
        if (\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getExtensionVersion('extbase')) >= 1003000) {
            $cObjData = $this->configurationManager->getContentObject()->data;
        } else {
            $cObjData = $this->request->getContentObjectData();
        }
        $this->extKey = "tp3ratings";
        //   $this->conf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']["tx_".strtolower($this->extKey)]);
        //	$this->layout = $this->settings["layout"] ? $this->settings["layout"] : "style05";
        $this->cObjRenderer = new \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer();
        //$configurationManager = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManager');
        $this->conf = $this->configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
        $this->pageRenderer = $this->objectManager->get('TYPO3\\CMS\\Core\\Page\\PageRenderer');
        $this->view->assign('cObjData', $cObjData);
        $this->view->assign('debugMode', false);


    }
}
