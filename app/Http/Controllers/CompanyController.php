<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    

    public function index()
    {
        $companies = Company::all(); 
        return response()->json([
            'status' => 'success',
            'companies' => $companies,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Company created successfully',
            'company' => $company,
        ]);
    }

    public function show($id)
    {
        $company = Company::find($id); 
        return response()->json([
            'status' => 'success',
            'company' => $company,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Company updated successfully',
            'company' => $company,
        ]);
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Company deleted successfully',
            'company' => $company,
        ]);
    }
}
