<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    public function __construct()
    {
        Gate::authorize('create', Employer::class);
    }

    public function create()
    {
        return view('employer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|min:3|unique:employers,company_name',
        ]);

        auth()->user()->employer()->create($validated);

        return redirect()->route('job.index')
            ->with('success', 'You are now an employer!!!');
    }
}
