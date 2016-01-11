<?php

namespace Thruster\Component\EventEmitter;

/**
 * Trait AdvanceEventEmitterInterface
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface AdvanceEventEmitterInterface
{
    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function on(string $eventName, callable $listener);

    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function once(string $eventName, callable $listener);

    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function removeListener(string $eventName, callable $listener);

    /**
     * @param string $eventName
     *
     * @return $this
     */
    public function removeListeners(string $eventName = null);

    /**
     * @param string $eventName
     *
     * @return array|callable[]
     */
    public function getListeners(string $eventName) : array;

    /**
     * @param string         $eventName
     * @param EventInterface $event
     *
     * @return $this
     */
    public function emit(string $eventName, EventInterface $event = null);
}
