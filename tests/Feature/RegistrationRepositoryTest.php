<?php

namespace Tests\Feature;

use App\Events\PendingRegistration;
use App\Events\ValidRegistration;
use App\Models\RegistrationStudent;
use App\Models\Religion;
use App\Repositories\RegistrationStudentRepository;
use Database\Seeders\EducationSeeder;
use Database\Seeders\ReligionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RegistrationRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        
        $this->seed(ReligionSeeder::class);
        $this->seed(EducationSeeder::class);
    }

    /**
     * A basic feature test example.
     */
    public function test_create_registration(): void
    {
        $repo = app(RegistrationStudentRepository::class);

        $data = RegistrationStudent::factory()->pending()->make([
            'religion_id' => Religion::first()->id,
        ])->toArray();

        Event::fake();
        $registration = $repo->createStudent($data);

        Event::assertDispatched(PendingRegistration::class, function ($event) use ($registration) {
            return $event->registration_student->id  == $registration->id;
        });

        $this->assertEquals($data['name'] , $registration->name);
        $this->assertEquals('pending' , $registration->status);
    }

    public function test_update_registration()
    {
        $this->test_create_registration();
        $repo = app(RegistrationStudentRepository::class);

        $data = RegistrationStudent::factory()->valid()->make([
            'religion_id' => Religion::first()->id,
        ])->toArray();

        $regis_old = RegistrationStudent::first();

        Event::fake();
        $registration = $repo->updateStudent($regis_old , $data);
        Event::assertDispatched(ValidRegistration::class, function ($event) use ($registration) {
            return $event->registration_student->id  == $registration->id;
        });

        

        $this->assertEquals($data['name'], $registration->name);
        $this->assertEquals('valid', $registration->status);

    }

    public function test_create_registration_upload(): void
    {
        Storage::fake('local');

        $repo = app(RegistrationStudentRepository::class);

        $data = RegistrationStudent::factory()->pending()->make([
            'religion_id' => Religion::first()->id,
            'kk_image' => UploadedFile::fake()->image('kk_image.jpg'),
            'akta_image' => UploadedFile::fake()->image('akta_image.jpg'),
        ])->toArray();

        $registration = $repo->createStudent($data);

        $this->assertEquals($data['name'], $registration->name);
        $this->assertEquals('pending', $registration->status);
        $this->assertNotNull($registration->akta_image);
        $this->assertNotNull($registration->kk_image);

        $this->assertTrue(Storage::disk('images_local')->exists($registration->kk_image));
        $this->assertTrue(Storage::disk('images_local')->exists($registration->akta_image));
    }

    public function test_update_registration_upload(): void
    {
        $this->test_create_registration();

        Storage::fake('local');

        $repo = app(RegistrationStudentRepository::class);

        $data = RegistrationStudent::factory()->valid()->make([
            'religion_id' => Religion::first()->id,
            'kk_image' => UploadedFile::fake()->image('kk_image.jpg'),
            'akta_image' => UploadedFile::fake()->image('akta_image.jpg'),
        ])->toArray();

        $regis_old = RegistrationStudent::first();

        $registration = $repo->updateStudent($regis_old, $data);

        $this->assertEquals($data['name'], $registration->name);
        $this->assertEquals('valid', $registration->status);

        $this->assertTrue(Storage::disk('images_local')->exists($registration->kk_image));
        $this->assertTrue(Storage::disk('images_local')->exists($registration->akta_image));
    }
}
