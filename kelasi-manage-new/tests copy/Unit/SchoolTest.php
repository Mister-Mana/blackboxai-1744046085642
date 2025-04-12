<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_school()
    {
        $school = School::factory()->create([
            'name' => 'Ecole Test',
            'email' => 'test@ecole.com'
        ]);

        $this->assertDatabaseHas('schools', [
            'name' => 'Ecole Test',
            'email' => 'test@ecole.com'
        ]);
    }

    /** @test */
    public function it_can_check_school_status()
    {
        $activeSchool = School::factory()->create(['status' => 'active']);
        $inactiveSchool = School::factory()->create(['status' => 'inactive']);

        $this->assertTrue($activeSchool->isActive());
        $this->assertFalse($inactiveSchool->isActive());
    }
}