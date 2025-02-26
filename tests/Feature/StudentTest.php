<?php

namespace Tests\Feature;

use App\Models\School;
use Tests\TestCase;
use App\Models\User; // Importar el modelo User
use App\Models\Student;
use Laravel\Sanctum\Sanctum; // Importar Sanctum para autenticación
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba

    /** @test */
    public function test_create_student(): void
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Crear una escuela
        $school = School::factory()->create();
    
        $data = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'school_id' => $school->id, // Pasar un school_id válido
        ];
    
        $response = $this->postJson('/api/students', $data);
    
        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ]);
    }

    /** @test */
    public function test_show_student(): void
    {
        // Autenticar un usuario
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Crear un estudiante
        $student = Student::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);

        // Realizar la petición GET para obtener un estudiante
        $response = $this->getJson("/api/students/{$student->id}");

        $response->assertStatus(200) // Código 200 = OK
            ->assertJsonFragment([
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
            ]);
    }

    /** @test */
// En test_update_student()
public function test_update_student(): void
{
    // Crear usuario autenticado
    $user = User::factory()->create();
    $this->actingAs($user);

    // Crear escuela y estudiante
    $school = School::factory()->create();
    $student = Student::factory()->create([
        'school_id' => $school->id,
    ]);

    $updatedData = [
        'name' => 'Updated Name',
        'email' => 'updated@example.com',
        'school_id' => $school->id, // Asegurarse de enviar un school_id válido
    ];

    $response = $this->putJson("/api/students/{$student->id}", $updatedData);

    $response->assertStatus(200)
        ->assertJsonFragment([
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
}

    /** @test */
    public function test_delete_student(): void
    {
        // Autenticar un usuario
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Crear un estudiante
        $student = Student::factory()->create();

        // Realizar la petición DELETE para eliminar un estudiante
        $response = $this->deleteJson("/api/students/{$student->id}");

        $response->assertStatus(205); // Código 205 = Content Reset

        // Verificar que el estudiante ha sido eliminado
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
