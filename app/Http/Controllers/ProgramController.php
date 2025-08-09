<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Enums\Country;
use App\Enums\StudyMode;
use App\Enums\Degree;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $programs = Program::query()
            ->when($request->country, fn($q) => $q->where('country', $request->country))
            ->when($request->degree, fn($q) => $q->where('degree', $request->degree))
            ->when($request->mode, fn($q) => $q->where('mode', $request->mode))
            ->paginate(10);

        return view('programs', [
            'programs' => $programs,
            'countries' => Country::cases(),
            'degrees' => Degree::cases(),
            'modes' => StudyMode::cases(),
        ]);
    }
    
    public function work()
    {
        $programs = Program::where('type', 'work')->get();
        return view('programs-work', compact('programs'));
    }

    public function study()
    {
        $programs = Program::where('type', 'study')->get(); // Пример фильтра
        return view('programs-study', compact('programs'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        //
    }
}
