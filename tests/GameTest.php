<?php


namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GameTest extends WebTestCase
{
    public function testSetParamsSuccess()
    {
        $client = self::createClient();
        $client->request('GET', '/?army1=50&army2=34');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testValidationParamsFail()
    {
        $client = self::createClient();
        $client->request('GET', '/');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testValidationWithWrongNameParamsFail()
    {
        $client = self::createClient();
        $client->request('GET', '/?army23=34&army56=56');

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}