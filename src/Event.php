<?php

namespace Thruster\Component\EventEmitter;

/**
 * Class Event
 *
 * @package Thruster\Component\EventEmitter
 * @author  Aurimas Niekis <aurimas@niekis.lt>
 */
class Event implements EventInterface
{
    /**
     * @var bool Whether no further event listeners should be triggered
     */
    protected $propagationStopped;

    /**
     * @var array
     */
    protected $params;

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->propagationStopped = false;

        $this->params = $params;
    }

    /**
     * {@inheritdoc}
     */
    public function isPropagationStopped() : bool
    {
        return $this->propagationStopped;
    }

    /**
     * {@inheritdoc}
     */
    public function stopPropagation()
    {
        $this->propagationStopped = true;
    }

    /**
     * {@inheritdoc}
     */
    public function getParams() : array
    {
        return $this->params;
    }
}
