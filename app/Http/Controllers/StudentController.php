<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'last_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'municipality' => 'required',
            'barangay' => 'required',
            'date_of_birth' => 'required',
            'department' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, redirect back to the '/home' route
            // with errors and the input data from the request
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated data from the validator
        $validated = $validator->validated();

        // Create a new Student record in the database using the validated data
        Student::create($validated);

        // Redirect to the '/home' route after successful data creation
        return redirect()->route('home')->with('message', 'Student created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'last_name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            // 'municipality' => 'required',
            // 'barangay' => 'required',
            'date_of_birth' => 'required',
            'department' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, redirect back to the '/home' route
            // with errors and the input data from the request
            return redirect()->route('home')
                ->withErrors($validator)
                ->withInput();
        }

        // Retrieve the validated data from the validator
        $validated = $validator->validated();

        // Create a new Student record in the database using the validated data
        $student->update($validated);

        // Redirect to the '/home' route after successful data creation
        return redirect()->route('home')->with('message', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
