<?php

namespace App\Http\Controllers;
use App\Http\Requests\SaveVervaldagTypeRequest;
use App\VervaldagType;
use Illuminate\Http\Request;

class VervaldagtypesController extends Controller
{
    public function index() {
        $vervaldagtypes = Vervaldagtype::orderBy('type')->paginate(5);
        return view('vervaldagtypes.index', ['vervaldagtypes'=>$vervaldagtypes]);
    }

    public function create() {
        return view('vervaldagtypes.create');
    }

    public function store(SaveVervaldagTypeRequest $request) {
        $this->validate($request, [
            'type' => 'required|unique:vervaldagtypes',
            'dagen' => 'required',
        ]);

        $vervaldagtype = new VervaldagType();
        $vervaldagtype->type = $request->type;
        $vervaldagtype->dagen = $request->dagen;
        $vervaldagtype->save();

        return redirect(route('vervaldagtypes.home'));
    }

    public function edit($id) {
        $vervaldagtype = VervaldagType::findOrFail($id);
        return view('vervaldagtypes.edit', compact('vervaldagtype'));
    }

    public function update(SaveVervaldagTypeRequest $request, $id) {
        $vervaldagtype = Vervaldagtype::findOrFail($id);
        $vervaldagtype->type = $request->type;
        $vervaldagtype->dagen = $request->dagen;
        $vervaldagtype->save();
        return redirect(route('vervaldagtypes.home'));
    }

    public function destroy($id) {
        $vervaldagtype = Vervaldagtype::findOrFail($id);
        $vervaldagtype->delete();
        return redirect(route('vervaldagtypes.home'));
    }
}
