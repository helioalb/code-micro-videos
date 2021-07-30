<?php

namespace Tests\Unit;

use App\Models\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFillableAttribute()
    {
        $fillable = ['name', 'description', 'is_active'];
        $category = new Category();

        $this->assertEquals($fillable, $category->getFillable());
    }

    // public function testIfUseTraits()
    // {
    //     $traits = [SoftDeletes::class, Uuid::class];

    //     $categoryTraits = array_keys(class_uses(Category::class));

    //     $this->assertEquals($traits, $categoryTraits);
    // }

    public function testIncrementingAttribute()
    {
        $category = new Category();

        $this->assertFalse($category->incrementing);
    }

    public function testDatesAttribute()
    {
       $category = new Category();
       
       $this->assertContains('deleted_at', $category->getDates());
    }
}
