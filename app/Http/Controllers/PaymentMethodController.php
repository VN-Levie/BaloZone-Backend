<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of all payment methods.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();

        return response()->json([
            'success' => true,
            'data' => $paymentMethods,
            'message' => 'Payment methods retrieved successfully'
        ]);
    }

    /**
     * Display a listing of active payment methods.
     */
    public function getActive()
    {
        $paymentMethods = PaymentMethod::where('status', 'active')->get();

        return response()->json([
            'success' => true,
            'data' => $paymentMethods,
            'message' => 'Active payment methods retrieved successfully'
        ]);
    }

    /**
     * Display the specified payment method.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        return response()->json([
            'success' => true,
            'data' => $paymentMethod,
            'message' => 'Payment method retrieved successfully'
        ]);
    }

    /**
     * Store a newly created payment method in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:payment_methods',
            'display_name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $paymentMethod = PaymentMethod::create($request->all());

        return response()->json([
            'success' => true,
            'data' => $paymentMethod,
            'message' => 'Payment method created successfully'
        ], 201);
    }

    /**
     * Update the specified payment method in storage.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:payment_methods,name,' . $paymentMethod->id,
            'display_name' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required|in:active,inactive',
        ]);

        $paymentMethod->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $paymentMethod,
            'message' => 'Payment method updated successfully'
        ]);
    }

    /**
     * Remove the specified payment method from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        // Check if payment method is being used in any orders
        if ($paymentMethod->orders()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete payment method that is being used in orders'
            ], 400);
        }

        $paymentMethod->delete();

        return response()->json([
            'success' => true,
            'message' => 'Payment method deleted successfully'
        ]);
    }
}
