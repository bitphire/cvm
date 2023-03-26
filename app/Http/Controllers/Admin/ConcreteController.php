<?php

namespace App\Http\Controllers\Admin;

use App\Models\Concrete;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConcreteController extends Controller
{
    public function index() {
        $concrete = Concrete::all()->groupBy('task');
        return view('admin.concrete.index', compact('concrete'));
    }

    public function create() {
        // Get most recent task number used and default task field?
        $recent_task = Concrete::latest('task')->first();
        return view('admin.concrete.create', compact('recent_task'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'task' => 'required',
            'sign' => 'required',
            'leg_size' => 'required|gt:0',
            'offset_1' => 'required',
            'offset_2' => 'nullable',
            'sign_size' => 'nullable',
            'leg_length_1' => 'nullable',
            'leg_length_2' => 'nullable',
        ]);

        $concrete = new Concrete();
        $concrete->task = $validated['task'];
        $concrete->sign = $validated['sign'];
        $concrete->leg_size = $validated['leg_size'];
        $concrete->offset_1 = $validated['offset_1'];
        if ($validated['offset_2'] == null) {
            $concrete->offset_2 = -1;
        } else {
            $concrete->offset_2 = $validated['offset_2'];
        }
        $concrete->sign_size = $validated['sign_size'];
        if ($validated['leg_length_1'] == null) {
            $concrete->leg_length_1 = -1;
        } else {
            $concrete->leg_length_1 = $validated['leg_length_1'];
        }
        if ($validated['leg_length_2'] == null) {
            $concrete->leg_length_2 = -1;
        } else {
            $concrete->leg_length_2 = $validated['leg_length_2'];
        }

        $concrete->save();

        return redirect('admin/concrete')->with('message', 'Success!');
    }

    public function edit(Concrete $concrete) {
        return view('admin.concrete.edit', compact('concrete'));
    }

    public function update(Request $request, $concrete) {
        $validated = $request->validate([
            'task' => 'required',
            'sign' => 'required',
            'leg_size' => 'required|gt:0',
            'offset_1' => 'required',
            'offset_2' => 'nullable',
            'sign_size' => 'nullable',
            'leg_length_1' => 'nullable',
            'leg_length_2' => 'nullable',
        ]);

        $concrete = Concrete::findOrFail($concrete);
        $concrete->task = $validated['task'];
        $concrete->sign = $validated['sign'];
        $concrete->leg_size = $validated['leg_size'];
        $concrete->offset_1 = $validated['offset_1'];
        if ($validated['offset_2'] != null || $validated['offset_2'] != -1) {
            $concrete->offset_2 = $validated['offset_2'];
        }
        $concrete->sign_size = $validated['sign_size'];
        if ($validated['leg_length_1'] == null || $validated['leg_length_1'] != -1) {
            $concrete->leg_length_1 = $validated['leg_length_1'];
        }
        if ($validated['leg_length_2'] == null || $validated['leg_length_2'] != -1) {
            $concrete->leg_length_2 = $validated['leg_length_2'];
        }
        $concrete->update();

        return redirect('admin/concrete')->with('message', 'Success!');
    }

    public function destroy($concrete) {
        Concrete::findOrFail($concrete)->delete();

        return redirect('admin/concrete')->with('message', 'Success!');
    }

    public function restore($concrete) {
        Concrete::onlyTrashed()->findOrFail($concrete)->restore();
        return redirect('admin/concrete/completed');
    }

    public function completed() {
        $concrete = Concrete::onlyTrashed()->get();
        return view('admin.concrete.completed', compact('concrete'));
    }
}
