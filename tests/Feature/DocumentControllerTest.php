<?php

namespace Tests\Feature;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class DocumentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_store_method()
    {
        Storage::fake('documents');

        $address = Address::factory()->create();
        $file = UploadedFile::fake()->image('doc.jpg')->size(150);

        $this->actingAs($this->user)->post(route('address.document.store', $address), [
            'file' => $file
        ])->assertRedirect();

        $this->assertDatabaseHas('documents', [
            'name' => $file->hashName(),
        ]);
    }
}
