<?php
namespace Tp3\Tp3Facebook\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Thomas Ruta <email@thomasruta.de>
 */
class FBPluginTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Tp3\Tp3Facebook\Domain\Model\FBPlugin
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Tp3\Tp3Facebook\Domain\Model\FBPlugin();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFacebooknameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFacebookname()
        );

    }

    /**
     * @test
     */
    public function setFacebooknameForStringSetsFacebookname()
    {
        $this->subject->setFacebookname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'facebookname',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getFbappidReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFbappid()
        );

    }

    /**
     * @test
     */
    public function setFbappidForStringSetsFbappid()
    {
        $this->subject->setFbappid('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'fbappid',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getOptionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getOptions()
        );

    }

    /**
     * @test
     */
    public function setOptionsForStringSetsOptions()
    {
        $this->subject->setOptions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'options',
            $this->subject
        );

    }
}
