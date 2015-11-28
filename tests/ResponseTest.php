<?php

class ResponseTest extends TestCase
{
    /**
     * Test that we get a 404 from /
     */
    public function testRootResponse()
    {
        $this->get('/')->assertResponseStatus(404);;
    }

    /**
     * Test that we get a 200 OK from the /pastes route
     */
    public function testPastesRootResponse()
    {
        $this->get('/pastes')->assertResponseStatus(200);;
    }

    /**
     * Test that garbage routes will 404
     */
    public function testFakeRouteResponse()
    {
        $rand = rand(3457348, 12483957398745);
        $this->get($rand)->assertResponseStatus(404);;
    }
}
