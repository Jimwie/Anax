<?php

namespace Anax\DI;

/**
 * Testing the Dependency Injector service container.
 */
class DIFactoryConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Check the default services created.
     */
    public function testDefaultServices()
    {
        $di = new DIFactoryConfig("di.php");
        $services = $di->getServices();
        $defaultServices = [
            "request",
            "response",
            "url",
            "router",
            "view",
            "viewRenderFile",
            "session",
            "textfilter",
        ];

        foreach ($services as $service) {
            $this->assertContains($service, $defaultServices);
        }
    }



    /**
     * Use set to overwrite a service that was previously created.
     */
    public function testOverwritePreviousDefinedService()
    {
        $di = new DIFactoryConfig("di.php");
        $service = 'session';

        $di->set($service, function () {
            $session = new \stdClass();
            return $session;
        });

        $session = $di->get($service);
        $this->assertInstanceOf('\stdClass', $session);
    }
}
