<?php

namespace Thruster\Component\EventEmitter\Tests;

use Thruster\Component\EventEmitter\Event;

/**
 * Class EventTest
 *
 * @package Thruster\Component\EventEmitter\Tests
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    public function testEvent()
    {
        $given = ['foo', 'bar'];

        $event = new Event($given);

        $this->assertEquals($given, $event->getParams());
        $this->assertFalse($event->isPropagationStopped());
        $event->stopPropagation();
        $this->assertTrue($event->isPropagationStopped());
    }
}
