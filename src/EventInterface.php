<?php

namespace Thruster\Component\EventEmitter;

/**
 * Interface EventInterface
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface EventInterface
{
    /**
     * Returns whether further event listeners should be triggered.
     *
     * @see Event::stopPropagation()
     *
     * @return bool Whether propagation was already stopped for this event.
     */
    public function isPropagationStopped() : bool;

    /**
     * Stops the propagation of the event to further event listeners.
     *
     * If multiple event listeners are connected to the same event, no
     * further event listener will be triggered once any trigger calls
     * stopPropagation().
     */
    public function stopPropagation();

    /**
     * Returns parameters passed to event
     *
     * @return array
     */
    public function getParams() : array;
}
