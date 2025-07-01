<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('pages.resident.index', [
            'residents' => $residents,
        ]);
    }
    
    public function create()
    {
        return view('pages.resident.create');
    }
    public function store(Request $request)
    {
            $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:255'],
            'religion' => ['required', Rule::in(['islam', 'kristen', 'hindu', 'budha'])],
            'marital_status' => ['required', Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])],
            'occupation'  => ['nullable', 'max:100'],
            'education' => ['required', Rule::in(['SD', 'SMP', 'SMA/SMK/SEDERAJAT', 'D3', 'S1', 'S2','S3'])],
            'phone_number' => ['nullable', 'max:15'],
            'country_code' => ['required'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        $validatedData['phone_number'] = $validatedData['country_code'] . $validatedData['phone_number'];
        // unset($validatedData['country_code']);

        $insertData = Resident::create($validatedData);

        if($insertData){

            return redirect('/resident')->with('success', 'Berhasil menambahkan data');
        } else {
            
        }
    }    



    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('pages.resident.edit', [
            'resident' => $resident,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:255'],
            'religion' => ['nullable', 'max:50'],
            'marital_status' => ['required', Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])],
            'occupation' => ['nullable', 'max:100'],
            'education' => ['nullable', 'max:100'],
            'phone_number' => ['nullable', 'max:15'],
            'country_code' => ['required'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
            
        ]);
        $validatedData['phone_number'] = $validatedData['country_code'] . $validatedData['phone_number'];
        // unset($validatedData['country_code']);

        Resident::findOrFail($id)->update($validatedData);

        return redirect('/resident')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('resident.index')->with('success', 'Berhasil menghapus data');
    }


}


