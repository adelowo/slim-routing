<?php

/*
 * slim-routing (https://github.com/juliangut/slim-routing).
 * Slim framework routing.
 *
 * @license BSD-3-Clause
 * @link https://github.com/juliangut/slim-routing
 * @author Julián Gutiérrez <juliangut@gmail.com>
 */

declare(strict_types=1);

namespace Jgut\Slim\Routing\Annotation;

/**
 * Route annotation.
 *
 * @Annotation
 * @Target({"METHOD"})
 */
class Route extends AbstractAnnotation
{
    use PathTrait;
    use MiddlewareTrait;

    /**
     * Route name.
     *
     * @var string
     */
    protected $name = '';

    /**
     * Route methods.
     *
     * @var array
     */
    protected $methods = ['GET'];

    /**
     * Route load priority.
     *
     * @var int
     */
    protected $priority = 0;

    /**
     * Route annotation constructor.
     *
     * @param array $parameters
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $parameters)
    {
        $this->seedParameters($parameters);
    }

    /**
     * Get route name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set route name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = trim($name);

        return $this;
    }

    /**
     * Get route methods.
     *
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * Set route methods.
     *
     * @param array|string $methods
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setMethods($methods)
    {
        $this->methods = [];

        if (!is_array($methods)) {
            $methods = [$methods];
        }
        /* @var array $methods */

        foreach (array_filter($methods) as $method) {
            if (!is_string($method)) {
                throw new \InvalidArgumentException(
                    sprintf('Route annotation methods must be strings. "%s" given', gettype($method))
                );
            }

            $this->methods[] = strtoupper(trim($method));
        }

        $this->methods = array_unique($this->methods);

        if (!count($this->methods)) {
            throw new \InvalidArgumentException('Route annotation methods can not be empty');
        }

        return $this;
    }

    /**
     * Get route load priority.
     *
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * Set route load priority.
     *
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;

        return $this;
    }
}
