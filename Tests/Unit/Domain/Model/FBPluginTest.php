<?php

/*
 * This file is part of the web-tp3/tp3-facebook.
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace Tp3\Tp3Facebook\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Tests for domains model EventModel
 *
 */
class FBPluginTest extends UnitTestCase
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
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        self::markTestIncomplete();
    }
}
