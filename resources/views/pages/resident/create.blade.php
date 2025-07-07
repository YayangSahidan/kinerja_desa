@extends('layouts.app')

@section('content')
{{-- page heading --}}
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Penduduk</h1>
    </div>

    {{-- @if ($errors->any())
        @add($errors->all())
    @endif --}}
    <div class="row">
        <div class="col">
            <form action="/resident" method="post">
                @csrf
                @method('POST')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="text" inputmode="numeric" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="16" required>
                            @error('nik')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" id="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control  @error('gender') is-invalid @enderror" >
                                @foreach ([
                                    (object) [
                                        "label" => "Laki-Laki",
                                        "value" => "male",
                                    ],
                                    (object) [
                                        "label" => "Perempuan",
                                        "value" => "female",
                                    ],
                                ] as $item)
                                    <option value="{{ $item->value}}" @selected(old('gender') ==  $item->value)>{{ $item->label }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date" id="birth_date" class="form-control  @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}">
                            @error('birth_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat lahir</label>
                            <input type="text" name="birth_place" id="birth_place" class="form-control  @error('birth_place') is-invalid @enderror" value="{{ old('birth_place') }}">
                            @error('birth_place')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea name="address" id="address" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <input type="text" name="religion" id="religion" class="form-control  @error('religion') is-invalid @enderror" value="{{ old('religion') }}">
                            @error('religion')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status" class="form-control  @error('marital_status') is-invalid @enderror" value="{{ old('marital_status') }}">
                                @foreach ([
                                    (object) [
                                        "label" => "Lajang",
                                        "value" => "Single",
                                    ],
                                    (object) [
                                        "label" => "Menikah",
                                        "value" => "Married",
                                    ],
                                    (object) [
                                        "label" => "Cerai",
                                        "value" => "Divorced",
                                    ],
                                    (object) [
                                        "label" => "Duda/Janda",
                                        "value" => "Widowed",
                                    ],
                                ] as $item)
                                    <option value="{{ $item->value}}" @selected(old('marital_status') ==  $item->value)>{{ $item->label }}</option>
                                @endforeach
                            </select>
                            @error('marital_status')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text" name="occupation" id="occupation" class="form-control  @error('occupation') is-invalid @enderror" value="{{ old('occupation') }}">
                            @error('occupation')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="education">Pendidikan</label>
                            <input type="text" name="education" id="education" class="form-control  @error('education') is-invalid @enderror" value="{{ old('education') }}">
                            @error('education')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone_number">Telepon</label>
                            <input type="text" inputmode="numeric" name="phone_number" id="phone_number" class="form-control  @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" placeholder="81234567890" required oninput="this.value = this.value.replace(/\D/g, '')" maxlength="11">
                            @error('phone_number')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                         <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control  @error('status') is-invalid @enderror" value="{{ old('status') }}">
                                 @foreach ([
                                    (object) [
                                        "label" => "Aktif",
                                        "value" => "active",
                                    ],
                                    (object) [
                                        "label" => "Pindah",
                                        "value" => "moved",
                                    ],
                                    (object) [
                                        "label" => "Almarhum",
                                        "value" => "deceased",
                                    ],
                                ] as $item)
                                    <option value="{{ $item->value}}" @selected(old('status') ==  $item->value)>{{ $item->label }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    <div class="card-fotter">
                        <div class="d-flex justify-content-end" style="gap:10px">
                            <a href="/resident" class="btn btn-outline-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
