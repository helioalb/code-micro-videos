<?php

namespace Tests\Feature\Models;

use App\Models\Genre;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use DatabaseMigrations;

    public function testList()
    {
        $genre = factory(Genre::class)->create()->first();

        $this->assertCount(1, Genre::all());

        $genreKeys = array_keys($genre->getAttributes());

        $this->assertEqualsCanonicalizing([
            'created_at',
            'deleted_at',
            'id',
            'is_active',
            'name',
            'updated_at'
        ], $genreKeys);
    }

    public function testCreate()
    {
        $genre = Genre::create([
            'name' => 'genre'
        ]);

        $genre->refresh();

        $uuidRegex = '/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i';
        $this->assertTrue((bool)preg_match($uuidRegex, $genre->id));

        $this->assertEquals('genre', $genre->name);
        $this->assertTrue($genre->is_active);

        $genre = Genre::create([
            'name' => 'genre',
            'is_active' => false
        ]);

        $this->assertFalse($genre->is_active);

        $genre = Genre::create([
            'name' => 'genre',
            'is_active' => true
        ]);

        $this->assertTrue($genre->is_active);
    }

    public function testUpdate()
    {
        $genre = factory(Genre::class)->create([
            'name' => 'serei alterado',
            'is_active' => false
        ])->first();

        $data = [
            'name' => 'Fui alterado',
            'is_active' => true
        ];

        $genre->update($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $genre->{$key});
        }
    }

    public function testDelete()
    {
        $genre = factory(Genre::class)->create();

        $this->assertCount(1, Genre::all());

        $genre->delete();

        $this->assertCount(0, Genre::all());
    }
}
