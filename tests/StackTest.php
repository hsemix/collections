<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Tests\Collections;

use Collections\Stack;
use RuntimeException;

/**
 * @author italo
 */
class StackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Stack
     */
    private $coll;

    protected function setUp()
    {
        $this->coll = new Stack();
    }

    public function testNewInstance()
    {
        $this->assertNotNull($this->coll);
    }

    public function testEnqueueItem()
    {
        $this->coll->push('testing');
        $this->assertTrue(is_string((string)$this->coll));
    }

    public function testEnqueueMultiple()
    {
        $this->coll->pushMultiple(array(1, 2, 3, 4));
        $this->assertTrue(is_string((string)$this->coll));
    }

    /**
     * @expectedException RuntimeException
     */
    public function testDequeueEmptyQueue()
    {
        $this->coll->pop();
    }

    public function testEnqueueToArray()
    {
        $this->coll->push('testing1');
        $this->coll->push('testing2');
        $this->coll->push('testing3');

        $this->assertEquals(array('testing1', 'testing2', 'testing3'), $this->coll->toArray());
    }

    public function testEnqueueAndDequeueToArray()
    {
        $this->coll->push('testing1');
        $this->coll->push('testing2');
        $this->coll->push('testing3');

        $this->coll->pop();

        $this->assertEquals(array('testing1', 'testing2'), $this->coll->toArray());
    }
}