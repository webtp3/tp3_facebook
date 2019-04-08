<?php

/*
 * This file is part of the web-tp3/tp3-facebook.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Tp3\Tp3Facebook\Tests\Unit\Controller;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case.
 *
 */
class FBPluginControllerTest extends UnitTestCase
{
    /**
     * @var \Tp3\Tp3Facebook\Controller\FBPluginController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Tp3\Tp3Facebook\Controller\FBPluginController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

//    /**
//     * @test
//     */

 #todo fix test
//    public function listActionFetchesAllFBPluginsFromRepositoryAndAssignsThemToView()
//    {
//        $allFBPlugins = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
//            ->disableOriginalConstructor()
//            ->getMock();
//
//        $fbPluginRepository = $this->getMockBuilder(\Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository::class)
//            ->setMethods(['findAll'])
//            ->disableOriginalConstructor()
//            ->getMock();
//        $fbPluginRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFBPlugins));
//        $this->inject($this->subject, 'fbPluginRepository', $fbPluginRepository);
//
//        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
//        $view->expects(self::once())->method('assign')->with('fbPlugins', $allFBPlugins);
//        $this->inject($this->subject, 'view', $view);
//
//        $this->subject->listAction();
//    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFBPluginToView()
    {
        $fbPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('fbPlugin', $fbPlugin);

        $this->subject->showAction($fbPlugin);
    }
}
