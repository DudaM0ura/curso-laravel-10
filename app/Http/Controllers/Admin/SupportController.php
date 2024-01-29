<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin.supports.index', compact('supports'));
    }

    public function create()
    {
        return view('admin.supports.form-create');
    }

    public function store(Support $support, Request $request)
    {
        $data = $request->all(); 
        $data['status'] = 'ativo';
    
        $support->create($data);
        return redirect()->route('support.index');
    }

    public function show(Support $support, $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function edit(Support $support, $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        return view('admin.supports.form-edit', compact('support'));
    }

    public function update(Support $support, Request $request, $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        $support->update($request->only([
                    'subject', 
                    'body'
                ]));

        return redirect()->route('support.index');
    }

    public function destroy(Support $support, $id)
    {
        if(!$support = $support->find($id)){
            return back();
        }

        $support->delete();

        return redirect()->route('support.index');
    }
}
