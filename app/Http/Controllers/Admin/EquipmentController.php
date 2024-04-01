<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Models\Equipment;
// use Illuminate\Http\Request;

// class EquipmentController extends Controller
// {
//     public function index()
//     {
//         $eqs = Equipment::paginate();
//         return view('pages.admin.equipment.index',[
//             'equipments' => $eqs,
//         ]);
//     }

//     public function create()
//     {
//         $equipment = new Equipment();

//         return view('pages.admin.equipment.form',[
//             'equipment' => $equipment
//         ]);
//     }

//     public function store(Request $request)
//     {
//         $equipment = new Equipment();
//         $equipment->name = $request->input('name');
//         $equipment->desc = $request->input('desc');
//         $equipment->price = $request->input('price');
//         $equipment->save();

//         return redirect()->route('admin::equipment::index');
//     }

//     public function edit(Equipment $equipment)
//     {
//         return view('pages.admin.equipment.form',[
//             'equipment' => $equipment
//         ]);
//     }

//     public function update(Equipment $equipment, Request $request)
//     {
//         $equipment->name = $request->input('name');
//         $equipment->desc = $request->input('desc');
//         $equipment->price = $request->input('price');
//         $equipment->save();

//         return redirect()->route('admin::equipment::index');
//     }

//     public function destroy(Equipment $equipment)
//     {

//     }
// }
