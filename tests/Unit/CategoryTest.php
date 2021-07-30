<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
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
