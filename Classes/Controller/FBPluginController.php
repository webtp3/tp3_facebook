<?php
namespace Tp3\Tp3Facebook\Controller;

/***
 *
 * This file is part of the "tp3 Facebook" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Thomas Ruta &lt;email@thomasruta.de>, R&amp;P IT Consulting GmbH
 *
 ***/

/**
 * FBPluginController
 */
class FBPluginController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * fBPluginRepository
     *
     * @var \Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository
     * @inject
     */
    protected $fBPluginRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $fBPlugins = $this->fBPluginRepository->findAll();
        $this->view->assign('fBPlugins', $fBPlugins);
    }

    /**
     * action show
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin
     * @return void
     */
    public function showAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin)
    {
        $this->view->assign('fBPlugin', $fBPlugin);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $newFBPlugin
     * @return void
     */
    public function createAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $newFBPlugin)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->fBPluginRepository->add($newFBPlugin);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin
     * @ignorevalidation $fBPlugin
     * @return void
     */
    public function editAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin)
    {
        $this->view->assign('fBPlugin', $fBPlugin);
    }

    /**
     * action update
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin
     * @return void
     */
    public function updateAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->fBPluginRepository->update($fBPlugin);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin
     * @return void
     */
    public function deleteAction(\Tp3\Tp3Facebook\Domain\Model\FBPlugin $fBPlugin)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->fBPluginRepository->remove($fBPlugin);
        $this->redirect('list');
    }

    /**
     * action
     *
     * @return void
     */
    public function Action()
    {

    }
}
