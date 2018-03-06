<?php
namespace Tp3\Tp3Facebook\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Thomas Ruta <email@thomasruta.de>
 */
class FBPluginControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
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

    /**
     * @test
     */
    public function listActionFetchesAllFBPluginsFromRepositoryAndAssignsThemToView()
    {

        $allFBPlugins = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $fBPluginRepository = $this->getMockBuilder(\Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $fBPluginRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFBPlugins));
        $this->inject($this->subject, 'fBPluginRepository', $fBPluginRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('fBPlugins', $allFBPlugins);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFBPluginToView()
    {
        $fBPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('fBPlugin', $fBPlugin);

        $this->subject->showAction($fBPlugin);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFBPluginToFBPluginRepository()
    {
        $fBPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $fBPluginRepository = $this->getMockBuilder(\Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $fBPluginRepository->expects(self::once())->method('add')->with($fBPlugin);
        $this->inject($this->subject, 'fBPluginRepository', $fBPluginRepository);

        $this->subject->createAction($fBPlugin);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFBPluginToView()
    {
        $fBPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('fBPlugin', $fBPlugin);

        $this->subject->editAction($fBPlugin);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFBPluginInFBPluginRepository()
    {
        $fBPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $fBPluginRepository = $this->getMockBuilder(\Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $fBPluginRepository->expects(self::once())->method('update')->with($fBPlugin);
        $this->inject($this->subject, 'fBPluginRepository', $fBPluginRepository);

        $this->subject->updateAction($fBPlugin);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFBPluginFromFBPluginRepository()
    {
        $fBPlugin = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();

        $fBPluginRepository = $this->getMockBuilder(\Tp3\Tp3Facebook\Domain\Repository\FBPluginRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $fBPluginRepository->expects(self::once())->method('remove')->with($fBPlugin);
        $this->inject($this->subject, 'fBPluginRepository', $fBPluginRepository);

        $this->subject->deleteAction($fBPlugin);
    }
}
