<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentRoutesTest extends TestCase
{
    use RefreshDatabase;

    // Test d'accès au tableau de bord étudiant
    public function test_student_dashboard_access()
    {
        $student = User::factory()->create(['role' => User::ROLE_STUDENT]);
        
        $response = $this->actingAs($student)
                         ->get(route('student.dashboard'));
        
        $response->assertStatus(200);
    }

    // Test d'accès à la page des notes
    public function test_student_grades_access()
    {
        $student = User::factory()->create(['role' => User::ROLE_STUDENT]);
        
        $response = $this->actingAs($student)
                         ->get(route('student.grades'));
        
        $response->assertStatus(200);
    }

    // Test de restriction d'accès pour non-étudiants
    public function test_non_student_access_denied()
    {
        $teacher = User::factory()->create(['role' => User::ROLE_TEACHER]);
        
        $response = $this->actingAs($teacher)
                         ->get(route('student.dashboard'));
        
        $response->assertStatus(403);
    }
}