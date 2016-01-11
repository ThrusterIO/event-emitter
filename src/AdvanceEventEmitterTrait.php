<?php

namespace Thruster\Component\EventEmitter;

/**
 * Trait AdvanceEventEmitterTrait
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
trait AdvanceEventEmitterTrait
{
    /**
     * @var callable[]
     */
    protected $listeners = [];

    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function on(string $eventName, callable $listener) : self
    {
        $this->listeners[$eventName][] = $listener;

        return $this;
    }

    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function once(string $eventName, callable $listener) : self
    {
        $onceListener = function (EventInterface $event) use (&$onceListener, $eventName, $listener) {
            $this->removeListener($eventName, $onceListener);

            call_user_func($listener, $event);
        };

        $this->on($eventName, $onceListener);

        return $this;
    }

    /**
     * @param string   $eventName
     * @param callable $listener
     *
     * @return $this
     */
    public function removeListener(string $eventName, callable $listener) : self
    {
        if (array_key_exists($eventName, $this->listeners)) {
            $index = array_search($listener, $this->listeners[$eventName], true);

            if (false !== $index) {
                unset($this->listeners[$eventName][$index]);
            }
        }

        return $this;
    }

    /**
     * @param string $eventName
     *
     * @return $this
     */
    public function removeListeners(string $eventName = null) : self
    {
        if (null !== $eventName) {
            unset($this->listeners[$eventName]);
        } else {
            $this->listeners = [];
        }

        return $this;
    }

    /**
     * @param string $eventName
     *
     * @return array|callable[]
     */
    public function getListeners(string $eventName) : array
    {
        return isset($this->listeners[$eventName]) ? $this->listeners[$eventName] : [];
    }

    /**
     * @param string         $eventName
     * @param EventInterface $event
     *
     * @return $this
     */
    public function emit(string $eventName, EventInterface $event = null) : self
    {
        $event = $event ?? new Event();

        foreach ($this->getListeners($eventName) as $listener) {
            call_user_func($listener, $event);

            if (true == $event->isPropagationStopped()) {
                break;
            }
        }

        return $this;
    }
}
