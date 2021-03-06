<?php
/*
 * This file is part of the prooph/service-bus.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Date: 09/13/15 -7:47 PM
 */

namespace ProophTest\ServiceBus\Container\Plugin\Guard;

use Interop\Container\ContainerInterface;
use PHPUnit_Framework_TestCase as TestCase;
use Prooph\ServiceBus\Container\Plugin\Guard\FinalizeGuardFactory;
use Prooph\ServiceBus\Plugin\Guard\AuthorizationService;
use Prooph\ServiceBus\Plugin\Guard\FinalizeGuard;

/**
 * Class FinalizeGuardFactoryTest
 * @package ProophTest\ServiceBus\Container\Plugin\Guard
 */
final class FinalizeGuardFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_route_guard()
    {
        $authorizationService = $this->prophesize(AuthorizationService::class);

        $container = $this->prophesize(ContainerInterface::class);
        $container->get(AuthorizationService::class)->willReturn($authorizationService->reveal());

        $factory = new FinalizeGuardFactory();

        $guard = $factory($container->reveal());

        $this->assertInstanceOf(FinalizeGuard::class, $guard);
    }
}
