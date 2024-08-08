<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\web\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class signupController extends Controller
{
    public function randomnumberGenerate()
    {
        $randomString = Str::random(5);
        $allCapsString = strtoupper($randomString);
        $pin = mt_rand(1000000, 9999999) . $allCapsString;

        $string = str_shuffle($pin);

        return $string;
    }

    public function signup(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|unique:customer,email',
                'phone_number' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'gender' => 'required',
                'password' => 'required|string|min:8',
            ]);

            // Generate a unique token
            do {
                $customer_token = $this->randomnumberGenerate();
            } while (customer::where('token', $customer_token)->first() instanceof customer);

            // Create the customer
            $customer = customer::create([
                'token' => $customer_token,
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'phone_number' => $validatedData['phone_number'],
                'address' => $validatedData['address'],
                'gender' => $validatedData['gender'],
                'password' => Hash::make($validatedData['password']),
            ]);

            return response()->json(['message' => 'Success'], 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);

        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while processing your request: ' . $e->getMessage()], 500);
        }
    }
}
