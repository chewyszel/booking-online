<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Field;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FieldTest extends TestCase
{
    use RefreshDatabase;

    public function test_field_can_be_created(): void
    {
        $field = Field::create([
            'nama_lapangan' => 'Lapangan A',
            'harga' => 100000
        ]);

        $this->assertDatabaseHas('fields', [
            'nama_lapangan' => 'Lapangan A'
        ]);
    }
}