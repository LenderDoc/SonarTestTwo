<?php


use PHPUnit\Framework\TestCase;

class lolTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testNotReturnBuiltinAccount()
    {
        self::assertNull(null);
        self::assertNull('lol');
    }


    public function testNotReturnBuiltinAccount1()
    {
        self::assertNull(null);
        self::assertNull('lol');
    }

    public function testHelper()
    {
        assertHelper('34');
    }

    private function assertHelper($i)
    {
        self::assertEquals('34', $i);
        self::assertEquals('35', $i);
        self::assertEquals('34', $i);
    }
}
