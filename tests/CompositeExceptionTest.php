<?php
namespace Mouf\Utils;

class CompositeExceptionTest extends \PHPUnit_Framework_TestCase
{

    public function testCompositeException() {
        $e1 = new \Exception("foo");
        $e2 = new \Exception("baz");

        $compositeException = new CompositeException();
        $this->assertEquals(true, $compositeException->isEmpty());
        $compositeException->add($e1);
        $compositeException->add($e2);

        $this->assertContains("2 exception(s) have been thrown:", $compositeException->getMessage());
        $this->assertContains("foo", $compositeException->getMessage());
        $this->assertContains("baz", $compositeException->getMessage());
        $this->assertEquals(false, $compositeException->isEmpty());
    }
}
