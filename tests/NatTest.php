<?php

use Bdt\Avetmiss\Tests\TestCase;

use Bdt\Avetmiss\Nat\V7;

class NatTest extends TestCase
{
    public function testFieldsetLengths()
    {
        $this->assertCount(12, new V7\Nat010);
        $this->assertCount(7, new V7\Nat020);
        $this->assertCount(8, new V7\Nat030);
        $this->assertCount(6, new V7\Nat060);
        $this->assertCount(24, new V7\Nat080);
        $this->assertCount(16, new V7\Nat085);
        $this->assertCount(2, new V7\Nat090);
        $this->assertCount(2, new V7\Nat100);
        $this->assertCount(25, new V7\Nat120);
        $this->assertCount(5, new V7\Nat130);
    }
}
