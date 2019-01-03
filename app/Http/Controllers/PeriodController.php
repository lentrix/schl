<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period;

class PeriodController extends Controller
{
    public function index() {
        $periods = null;

        if(isset($_GET['search'])) {
            $periods = Period::where('accronym','like',"%{$_GET['search']}%")
                    ->orWhere('name','like',"%{$_GET['search']}%")
                    ->get();
        }

        return view('admin.periods.index', compact('periods'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'accronym' => 'required|max:30',
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'type' => 'required',
        ]);

        $period = Period::create($request->all());

        return redirect("/periods/$period->id");
    }

    public function show(Period $period) {
        return view('admin.periods.view', compact('period'));
    }

    public function update(Request $request, Period $period) {
        $this->validate($request, [
            'accronym' => 'required|max:30',
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'type' => 'required',
        ]);

        $period->update($request->all());

        session()->flash('info', "$period->accronym has beed updated.");

        return redirect("/periods/$period->id");
    }
}
