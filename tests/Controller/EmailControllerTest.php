<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EmailControllerTest extends WebTestCase
{
    public function testEmail():void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/send-email');
        $client->submitForm('submit', [
            'send_form[name]' => 'Nico Robin',
            'send_form[description]' => 'A woman',
            'send_form[bounty]' => 30,
            'send_form[imagePath]' => dirname(__DIR__, 2).'/public/images/opisreal.jpg',
        ]);

        $client->followRedirect();
        $this->assertSelectorExists('div:contains("Send Email")');

        file_put_contents('test2.html' , $crawler->html());

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Send Email');
    }
    
}