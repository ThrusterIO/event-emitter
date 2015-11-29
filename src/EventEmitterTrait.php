<?php

namespace Thruster\Component\EventEmitter;

/**
 * Trait EventEmitterTrait
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
trait EventEmitterTrait
{
    /**
     * @var callable[]
     */
    protected $listeners = [];

    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function on(string $event, callable $listener) : self
    {
        $this->listeners[$event][] = $listener;

        return $this;
    }

    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function once(string $event, callable $listener) : self
    {
        $onceListener = function () use (&$onceListener, $event, $listener) {
            $this->removeListener($event, $onceListener);

            call_user_func_array($listener, func_get_args());
        };

        $this->on($event, $onceListener);

        return $this;
    }

    /**
     * @param string   $event
     * @param callable $listener
     *
     * @return $this
     */
    public function removeListener(string $event, callable $listener) : self
    {
        if (array_key_exists($event, $this->listeners)) {
            $index = array_search($listener, $this->listeners[$event], true);

            if (false !== $index) {
                unset($this->listeners[$event][$index]);
            }
        }

        return $this;
    }

    /**
     * @param string $event
     *
     * @return $this
     */
    public function removeListeners(string $event = null) : self
    {
        if (null !== $event) {
            unset($this->listeners[$event]);
        } else {
            $this->listeners = [];
        }

        return $this;
    }

    /**
     * @param string $event
     *
     * @return array|callable[]
     */
    public function getListeners(string $event) : array
    {
        return isset($this->listeners[$event]) ? $this->listeners[$event] : [];
    }

    /**
     * @param string $event
     * @param array  $arguments
     *
     * @return $this
     */
    public function emit(string $event, array $arguments = []) : self
    {
        foreach ($this->getListeners($event) as $listener) {
            call_user_func_array($listener, $arguments);
        }

        return $this;
    }
}
