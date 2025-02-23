<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller
{
    // Registro de usuario
    public function register(Request $request)
    {
        try {
            // Validar los datos de entrada
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            // Crear el usuario
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Respuesta exitosa
            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'user' => $user
            ], 201);

        } catch (ValidationException $e) {
            // Manejo de errores de validación
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);

        } catch (Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Inicio de sesión
    public function login(Request $request)
    {
        try {
            // Validar los datos de entrada
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Buscar al usuario por email
            $user = User::where('email', $request->email)->first();

            // Verificar credenciales
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            // Generar token de autenticación
            $token = $user->createToken('auth_token')->plainTextToken;

            // Respuesta exitosa
            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully',
                'token' => $token,
                'user' => $user
            ], 200);

        } catch (ValidationException $e) {
            // Manejo de errores de validación
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);

        } catch (Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Login failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        try {
            // Verificar si el usuario está autenticado
            if (!$request->user()) {
                return response()->json([
                    'status' => false,
                    'message' => 'No authenticated user'
                ], 401);
            }

            // Eliminar todos los tokens del usuario
            $request->user()->tokens()->delete();

            // Respuesta exitosa
            return response()->json([
                'status' => true,
                'message' => 'Logged out successfully'
            ], 200);

        } catch (Exception $e) {
            // Manejo de errores generales
            return response()->json([
                'status' => false,
                'message' => 'Logout failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}