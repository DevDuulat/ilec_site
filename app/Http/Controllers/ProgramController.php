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
    
    public function work(Request $request)
    {
        $query = Program::where('type', 'work');
        $minSalary = (int) $query->min('salary_min') ?: 10;
        $maxSalary = (int) $query->max('salary_max') ?: 50;

        $salary = 10; // дефолтное значение

        if ($request->filled('salary')) {
            $salary = (int) $request->input('salary');
            $query->where('salary_max', '>=', $salary);
        }

        if ($request->filled('type')) {
            $query->where('category', $request->input('type'));
        }

        if ($request->filled('professions')) {
            $query->whereIn('category', $request->input('professions'));
        }

        if ($request->filled('language_level')) {
            $levels = $request->input('language_level');
            if (is_array($levels)) {
                $query->whereIn('language_level', $levels);
            } else {
                $query->where('language_level', $levels);
            }
        }

        $programs = $query->get();

        return view('programs-work', compact('programs', 'minSalary', 'maxSalary', 'salary'));
    }


    public function study(Request $request)
    {
        $query = Program::where('type', 'study');
        $minSalary = (int) $query->min('salary_min') ?: 10;
        $maxSalary = (int) $query->max('salary_max') ?: 50;

        $salary = 10; 

        if ($request->filled('salary')) {
            $salary = (int) $request->input('salary');
            $query->where('salary_max', '>=', $salary);
        }

        if ($request->filled('type')) {
            $query->where('category', $request->input('type'));
        }

        if ($request->filled('professions')) {
            $query->whereIn('category', $request->input('professions'));
        }

        if ($request->filled('language_level')) {
            $levels = $request->input('language_level');
            if (is_array($levels)) {
                $query->whereIn('language_level', $levels);
            } else {
                $query->where('language_level', $levels);
            }
        }

        $programs = $query->get();

        return view('programs-study', compact('programs', 'minSalary', 'maxSalary', 'salary'));
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
        return view('programs-work-show', compact('program'));
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
