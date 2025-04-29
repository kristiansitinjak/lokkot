<?php

namespace App\Http\Controllers;

use App\Models\Workprogram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkprogramController extends Controller
{
    public function index()
    {
        $user = session('user');
        $workprograms = Workprogram::where('period', $user['period'])->get();
        return view('admin.workprogram.index', compact('workprograms'));
    }

    public function showPublic()
    {
        $maxPeriod = Workprogram::max('period');
        $workprograms = Workprogram::where('period', $maxPeriod)->get();
        return view('workprogram', compact('workprograms'));
    }

    public function create()
    {
        return view('admin.workprogram.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
            'objective' => 'required|string',
            'location' => 'required|string',
            'planned_date' => 'required|date',
            'actual_date' => 'nullable|date',
            'funding_source' => 'required|string',
            'planned_budget' => 'required|integer',
            'actual_budget' => 'nullable|integer',
            'status' => 'required|string',
        ]);

        $user = session('user');

        Workprogram::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'objective' => $request->objective,
            'location' => $request->location,
            'planned_date' => $request->planned_date,
            'actual_date' => $request->actual_date,
            'funding_source' => $request->funding_source,
            'planned_budget' => $request->planned_budget,
            'actual_budget' => $request->actual_budget,
            'status' => $request->status,
            'period' => $user['period'],
        ]);

        return redirect()->route('workprogram.index')->with('success', 'Work Program successfully added.');
    }

    public function edit(Workprogram $workprogram)
    {
        return view('admin.workprogram.edit', compact('workprogram'));
    }

    public function update(Request $request, Workprogram $workprogram)
    {
        $request->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
            'objective' => 'required|string',
            'location' => 'required|string',
            'planned_date' => 'required|date',
            'actual_date' => 'nullable|date',
            'funding_source' => 'required|string',
            'planned_budget' => 'required|integer',
            'actual_budget' => 'nullable|integer',
            'status' => 'required|string',
        ]);

        $workprogram->update($request->all());

        return redirect()->route('workprogram.index')->with('success', 'Work Program successfully updated.');
    }

    public function destroy(Workprogram $workprogram)
    {
        $workprogram->delete();
        return redirect()->route('workprogram.index')->with('success', 'Work Program successfully deleted.');
    }

    public function history(Request $request)
    {
        $periods = \App\Models\LocalUser::whereNotNull('period')->pluck('period')->unique();
        $selectedPeriod = $request->query('period');
        $workprograms = collect();
        if ($selectedPeriod) {
            $workprograms = Workprogram::where('period', $selectedPeriod)->get();
        }
        return view('admin.workprogram.history', compact('workprograms', 'periods'));
    }
}
