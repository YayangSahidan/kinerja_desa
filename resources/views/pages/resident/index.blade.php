 @extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
            <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>
    {{-- tabel --}}
    <div class="row"></div>
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <td>NIK</td>
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Tempat Tanggal Lahir</td>
                                <td>Alamat</td>
                                <td>Agama</td>
                                <td>Status Perkawinan</td>
                                <td>Pekerjaan</td>
                                <td>Education</td>
                                <td>Telepon</td>
                                <td>Status Penduduk</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                      
                        @if (count($residents) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">Tidak Ada Data</p>
                                    </td>
                                </tr>
                            </tbody>
                        @else  
                            <tbody>
                                @foreach ($residents as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <th>{{ $item->nik }}</th>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->gender}}</td>
                                    <td>{{ $item->birth_place}}, {{ $item->birth_date}}</td>
                                    <td>{{ $item->address}}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->marital_status}}</td>
                                    <td>{{ $item->occupation}}</td>
                                    <td>{{ $item->education}}</td>
                                    <td>{{ $item->phone_number}}</td>
                                    <td>{{ $item->status}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/resident/{{ $item->id }}" class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                 <i class="fas fa-eraser"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>  
                                @include('pages.resident.confirmation-delete', ['item' => $item])
                                @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
