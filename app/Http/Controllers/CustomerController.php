<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function addCustomer(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:customers,email',
                'dob' => 'required|date',
            ]);

            $customer = Customer::create($validated);

            return response()->json([
                'message' => 'Customer created successfully',
                'customer' => $customer,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'There is an error creating the customer.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function viewCustomer($id)
    {
        try {
            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }

            return response()->json($customer, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'There is an error loading customer.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function viewAllCustomers(Request $request)
    {
        try {
            $page = $request->get('page', 1); 
            $limit = $request->get('limit', 10); 

            $page = is_numeric($page) ? (int)$page : 1;
            $limit = is_numeric($limit) ? (int)$limit : 10;

            $customers = Customer::paginate($limit, ['*'], 'page', $page);

            return response()->json($customers, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'There is an error retrieving customers.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateCustomer(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'sometimes|string|max:255',
                'last_name' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|unique:customers,email,' . $id,
                'dob' => 'sometimes|date',
            ]);

            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }

            $customer->update($validated);

            return response()->json([
                'message' => 'Customer updated successfully',
                'customer' => $customer,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'There is an error updating the customer.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteCustomer($id)
    {
        try {
            $customer = Customer::find($id);

            if (!$customer) {
                return response()->json(['message' => 'Customer not found'], 404);
            }

            $customer->delete();

            return response()->json([
                'message' => 'Customer deleted successfully',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'There is an error deleting the customer.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


}
