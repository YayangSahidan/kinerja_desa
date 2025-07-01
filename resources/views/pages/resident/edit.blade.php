@extends('layouts.app')

@section('content')
{{-- page heading --}}
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="/resident/{{ $resident->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" inputmode="numeric" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $resident->nik) }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="16" required>
                            @error('nik')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" inputmode="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name',$resident->name) }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                           <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('name',$resident->gender) }}">
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <option value="gender"></option>
                                <option value="male">Laki-Laki</option>
                                <option value="female">Perempuan</option>
                           </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" inputmode="numeric" name="birth_place" id="birth_place" class="form-control " value="{{ old('birth_place',$resident->birth_place) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal lahir</label>
                            <input type="date" inputmode="numeric" name="birth_date" id="birth_date" class="form-control @error('birth_date', $resident->birth_date) is-invalid @enderror" value="{{ old('birth_date',$resident->birth_date) }}">
                              @error('birth_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Alamat lengkap</label>
                            <textarea name="address" id="address" cols="30" row="10" class="form-control @error('address') is-invalid @enderror">{{ old('address', $resident->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <select name="religion" id="religion" class="form-control" value="{{ old('religion',$resident->religion ) }}">
                                <option value=""disabled></option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="hindu">Hindu</option>
                                <option value="budha">Budha</option>
                           </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="marital_status">Status Pernikahan</label>
                            <select name="marital_status" id="marital_status" class="form-control" value="{{ old('marital_status',$resident->marital_status) }}">
                                <option value="marital_status"disabled selected></option>
                                <option value="Single">Belum Menikah</option>
                                <option value="married">Sudah Menikah</option>
                                <option value="Divorced">Cerai</option>
                                <option value="Widowed">Duda/Janda</option>
                           </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" inputmode="numeric" name="occupation" id="occupation" class="form-control" value="{{ old('occupation', $resident->occupation) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="education">Tamat Sekolah</label>
                           <select name="education" id="education" class="form-control" value="{{ old('education',$resident->education) }}">
                                <option value="education"disabled selected></option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK/SEDERAJAT">SMA/SMK/Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                           </select>
                        </div>
                    <div class="form-group mb-3">
                        <label for="phone_number" class="form-label">Nomor HP/Telepon</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <select class="form-select select-in-input" name="country_code" required>
                                    <option value="+62" selected>🇮🇩 +62</option>
                                </select>
                            </span> 
                            <input 
                                type="text" 
                                class="form-control @error('phone_number') is-invalid @enderror" 
                                value="{{ old('phone_number', $resident->phone_number) }}"
                                id="phone_number" 
                                name="phone_number" 
                                placeholder="81234567890" 
                                required
                                inputmode="numeric"
                                maxlength="15"
                                oninput="this.value = this.value.replace(/\D/g, '')">
                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-text mb-3">
                            Masukkan nomor tanpa angka 0 di depan. Contoh: <strong>81234567890</strong>
                        </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status Kependudukan</label>
                            <select name="status" id="status" class="form-control" value="{{ old('education',$resident->status) }}">
                                <option value=""disabled selected></option>
                                <option value="active">Aktif</option>
                                <option value="moved">Pindah</option>
                                <option value="deceased">Almarhum</option>
                           </select>
                        </div>
                    </div>
                    <div class="card-fotter">
                        <div class="d-flex justify-content-end" style="gap:10px">
                            <a href="/resident" class="btn btn-outline-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
