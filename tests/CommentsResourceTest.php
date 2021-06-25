<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Models\Comment;

class CommentsResourceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testGetComments(): void
    {
        $response = $this->call('GET','/comments');   
        $this->assertEquals(200, $response->status());
    }

    public function testSetComments(): void
    {
        $this->post('/comments/send',['by'=>'example', 'content'=>'example comment'])
        ->seeJson(['message'=>'comment sended with sucess']);
    }
}
