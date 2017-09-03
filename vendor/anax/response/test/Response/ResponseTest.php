<?php
/**
 * Test response module.
 */

namespace Anax\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test.
     * @expectedException \Anax\Response\Exception
     */
    public function testStatusCode()
    {
        $resp = new Response();
        $resp->setStatusCode(-1);
    }



    /**
     * Test.
     * @expectedException \Anax\Response\Exception
     */
    public function testHeadersAlreadySent()
    {
        $resp = new Response();
        $resp->checkIfHeadersAlreadySent();
    }



    /**
     * Test.
     */
    public function testBody()
    {
        $resp = new Response();
        $exp = "body";
        $resp->setBody($exp);
        $res = $resp->getBody();
        $this->assertEquals($exp, $res);
    }
}
