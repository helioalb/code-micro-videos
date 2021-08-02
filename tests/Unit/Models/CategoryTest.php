<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    private $category;

    public static function setUpBeforeClass(): void
    {
        // parent::setUpBeforeClass();
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = new Category();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public static function tearDownAfterClass(): void
    {
        // parent::tearDownAfterClass();
    }

    public function testFillableAttribute()
    {
        $fillable = ['name', 'description', 'is_active'];

        $this->assertEquals($fillable, $this->category->getFillable());
    }

    // public function testIfUseTraits()
    // {
    //     $traits = [SoftDeletes::class, Uuid::class];

    //     $categoryTraits = array_keys(class_uses(Category::class));

    //     $this->assertEquals($traits, $categoryTraits);
    // }

    public function testIncrementingAttribute()
    {
        $this->assertFalse($this->category->incrementing);
    }

    public function testDatesAttribute()
    {
       $this->assertContains('deleted_at', $this->category->getDates());
    }
}
