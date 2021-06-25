<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PostsResourceTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET','/blog_tail/');
        $this->assertEquals(200, $response->status());
    }

    public function testSelect()
    {
        $response = $this->call('GET','/blog_tail/6/select');
        $this->assertEquals(200, $response->status());
    }

    public function testCreate()
    {
        $this->post('/blog_tail/create',[
            'title'=>'Today is Good',
            'content'=>'The natual description of today...',
            'image'=>'sun.png'
        ])->seeJson(['message'=>'created sucessfuly']);
    }

    public function testUpdatePostFull()
    {
        $this->put('/blog_tail/7/update',[
            'title'=>'Today is Good',
            'content'=>'The natual description of today...',
            'image'=>'sun.png'
        ])->seeJson(['message'=>'updated sucessfuly']);
    }

    public function testDelete()
    {
        $this->delete('/blog_tail/8/delete')->seeJson(['message'=>'deleted sucessfuly']);
    }

    public function TestUpdateAPatch()
    {
        $this->patch('/blog_tail/9/update/title',['title'=>'example'])
        ->seeJson(['message'=>'updated sucessfuly']);
        
        $this->patch('/blog_tail/9/update/content',['content'=>'example'])
        ->seeJson(['message'=>'updated sucessfuly']);

        $this->patch('/blog_tail/9/update/image',['image'=>'example'])
        ->seeJson(['message'=>'updated sucessfuly']);
    }
}
