<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CharactersControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', '');
    }

    public function testShow(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertCount(6, $crawler->filter('a'));

        $client->clickLink('Keep Reading')->eq(2);

        $this->assertPageTitleContains('One Piece');
        $this->assertResponseIsSuccessful();

        $this->assertSelectorTextContains('h1', 'Name: Monkey D. Luffy');
        // $this->assertSelectorExists('div:contains("There are 5 characters")');
    }
    

    public function testCreate(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/create');
        $client->submitForm('submit', [
            'character_form[name]' => 'Nico Robin',
            'character_form[age]' => 30,
            'character_form[description]' => 'A woman',
            'character_form[gender]' => 'Female',
            'character_form[groupSort]' => 'Pirate',
            'character_form[races]' => 1,
            'character_form[imagePath]' => dirname(__DIR__, 2).'/public/images/opisreal.jpg',
        ]);

        $client->followRedirect();
        $this->assertSelectorExists('div:contains("There are 3 characters")');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'There are 3 characters');
    }

    public function testEdit(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/edit/2');

        $client->submitForm('submit', [
            'character_form[name]' => 'Ussop',
            'character_form[age]' => 20,
            'character_form[description]' => 'A man',
            'character_form[gender]' => 'Male',
            'character_form[groupSort]' => 'Pirate',
            'character_form[races]' => 1,
            'character_form[imagePath]' => dirname(__DIR__, 2).'/public/uploads/650af7e43c48f.jpg',
        ]);
        $this->assertResponseRedirects();
        $crawler= $client->followRedirect();


        $this->assertResponseIsSuccessful();
        file_put_contents('test.html' , $crawler->html());

        $this->assertSelectorTextContains('h1', 'There are 2 characters');
    }

    public function testDelete(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/delete/2');

        $crawler= $client->followRedirect();

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('a', 'Characters');
    }
}
// 'GET', '/'