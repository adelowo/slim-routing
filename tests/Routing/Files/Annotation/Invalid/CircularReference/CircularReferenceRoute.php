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

namespace Jgut\Slim\Routing\Tests\Files\Annotation\Invalid\CircularReference;

use Jgut\Slim\Routing\Annotation as JSR;

/**
 * Example circular reference route.
 *
 * @JSR\Router()
 * @JSR\Group(
 *     name="circular",
 *     group="circular"
 * )
 */
class CircularReferenceRoute
{
    /**
     * @JSR\Route(
     *     pattern="/circular"
     * )
     */
    public function actionCircular()
    {
    }
}
