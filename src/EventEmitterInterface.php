<?php

namespace Thruster\Component\EventEmitter;

/**
 * Trait EventEmitterTrait
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
interface EventEmitterInterface
{
    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function on(string $event, callable $listener);

    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function once(string $event, callable $listener);

    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function removeListener(string $event, callable $listener);

    /**
     * @param string $event
     *
     * @return $this
     */
    public function removeListeners(string $event = null);

    /**
     * @param string $event
     *
     * @return array|callable[]
     */
    public function getListeners(string $event) : array;

    /**
     * @param string $event
     * @param array  $arguments
     *
     * @return $this
     */
    public function emit(string $event, array $arguments = []);
}
