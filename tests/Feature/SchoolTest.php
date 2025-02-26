<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\School;
use App\Models\User; // Suponiendo que tienes un modelo User para autenticación
use Illuminate\Foundation\Testing\RefreshDatabase;

class SchoolTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos en cada prueba

    /** @test */
    public function test_create_school(): void
    {
        // Creamos un usuario para autenticar
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        // Datos de la escuela que vamos a crear
        $data = [
            'name' => 'Tech Academy',
            'city' => 'TechTown'
        ];

        // Realizamos la petición POST para crear la escuela
        $response = $this->postJson('/api/schools', $data, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Verificamos que la respuesta sea correcta
        $response->assertStatus(201) // 201 = Creado
            ->assertJsonFragment([
                'name' => 'Tech Academy',
                'city' => 'TechTown',
            ]);

        // Comprobamos que los datos estén guardados en la base de datos
        $this->assertDatabaseHas('schools', $data);
    }

    /** @test */
    public function test_show_school(): void
    {
        // Creamos un usuario para autenticar
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        // Creamos una escuela para probar la obtención
        $school = School::create([
            'name' => 'Tech Academy',
            'city' => 'TechTown'
        ]);

        // Realizamos la solicitud GET para obtener los detalles de la escuela
        $response = $this->getJson("/api/schools/{$school->id}", [
            'Authorization' => 'Bearer ' . $token, // Incluimos el token del usuario
        ]);

        // Verificamos que la respuesta sea correcta
        $response->assertStatus(200) // 200 = OK
            ->assertJsonFragment([
                'name' => 'Tech Academy',
                'city' => 'TechTown',
            ]);
    }

    /** @test */
    public function test_update_school(): void
    {
        // Creamos un usuario para autenticar
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        // Creamos una escuela para actualizar
        $school = School::create([
            'name' => 'Old Academy',
            'city' => 'OldTown'
        ]);

        // Datos actualizados para la escuela
        $updatedData = [
            'name' => 'Updated Academy',
            'city' => 'UpdatedTown'
        ];

        // Realizamos la solicitud PUT para actualizar la escuela
        $response = $this->putJson("/api/schools/{$school->id}", $updatedData, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Verificamos que la respuesta sea correcta
        $response->assertStatus(200) // 200 = OK
            ->assertJsonFragment([
                'name' => 'Updated Academy',
                'city' => 'UpdatedTown'
            ]);

        // Comprobamos que los datos están actualizados en la base de datos
        $this->assertDatabaseHas('schools', $updatedData);
    }

    /** @test */
    public function test_delete_school(): void
    {
        // Creamos un usuario para autenticar
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        // Creamos una escuela para eliminar
        $school = School::create([
            'name' => 'Test Academy',
            'city' => 'TestTown'
        ]);

        // Realizamos la solicitud DELETE para eliminar la escuela
        $response = $this->deleteJson("/api/schools/{$school->id}", [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        // Verificamos que la respuesta sea correcta (204 indica que se ha eliminado correctamente)
        $response->assertStatus(205); // 205 = Eliminado correctamente

        // Comprobamos que la escuela ha sido eliminada de la base de datos
        $this->assertDatabaseMissing('schools', ['id' => $school->id]);
    }
}
