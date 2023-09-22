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
        $this->assertSelectorTextContains('h1', 'Characters:');
    }

    // public function testCreate(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/create');
    //     $client->submitForm('submit', [
    //         'character_form[name]' => 'Nico Robin',
    //         'character_form[age]' => 30,
    //         'character_form[description]' => 'A woman',
    //         'character_form[gender]' => 'Female',
    //         'character_form[groupSort]' => 'Pirate',
    //         'character_form[races]' => 1,
    //         'character_form[imagePath]' => dirname(__DIR__, 2).'/public/images/opisreal.jpg',
    //     ]);
    //     $this->assertResponseRedirects();

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorExists('h1:contains("Add Character")');
    // }

    // public function testEdit(): void
    // {
    //     $client = static::createClient();
    //     $crawler = $client->request('GET', '/edit/11');
    //     $client->submitForm('submit', [
    //         'character_form[name]' => 'Ussop',
    //         'character_form[age]' => 20,
    //         'character_form[description]' => 'A man',
    //         'character_form[gender]' => 'Mmale',
    //         'character_form[groupSort]' => 'Pirate',
    //         'character_form[races]' => 1,
    //         'character_form[imagePath]' => dirname(__DIR__, 2).'/public/uploads/opisreal.jpg',
    //     ]);
    //     $this->assertResponseRedirects();

    //     $this->assertResponseIsSuccessful();
    //     $this->assertSelectorTextContains('h1', 'Edit Character');
    // }

    public function testDelete(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/delete/10');

        $this->assertResponseIsSuccessful();
        // $this->assertSelectorTextContains('a', 'Delete Character');
    }
}
