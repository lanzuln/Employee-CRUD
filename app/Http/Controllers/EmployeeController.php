<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\skill;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {

        $employee = Employee::all();

        return view('employee.index', compact('employee'));
    }
    public function create()
    {

        return view('employee.create');
    }
    public function store(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
        ]);

        $skillsArray = $request->skills;

        $skillsString = implode(', ', $skillsArray);

        Skill::create([
            'employee_id' => $employee->id,
            'skill' => $skillsString,
        ]);
        return response()->json(['success' => true]);
    }
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $skill = Skill::where('employee_id', $employee->id)->get();
        return view('employee.edit', compact('employee', 'skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('index');
    }

}
