@extends('../layout/app')

@section('contentheader')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kriteria</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Kriteria</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list mr-1"></i>
                        Daftar Kriteria
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" id="tambahKriteria">Tambah Kriteria</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover text-center" id="tabelKriteria">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-left">Nama Kriteria</th>
                                                <th class="text-left">Bobot</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kriterias as $kriteria)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-left">{{ $kriteria->nama }}</td>
                                                    <td class="text-left">{{ $kriteria->bobot }}</td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm editKriteria" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}" data-bobot="{{ $kriteria->bobot }}">
                                                            <i class="fas fa-edit" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}" data-bobot="{{ $kriteria->bobot }}"></i>
                                                        </button>
                                                        <form action="{{ route('kriteria.destroy', $kriteria) }}" method="post" style="display: inline-block">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin menghapus data ini?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('modal')
<!-- Modal Tambah -->
<div class="modal fade" id="modalKriteria" tabindex="-1" role="dialog" aria-labelledby="modalKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kriteria.store') }}" method="post" id="formKriteria">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKriteriaLabel">Tambah Kriteria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="hidden" name="id_edit" id="id_edit">
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="bobot">Bobot Kriteria</label>
                        <input type="number" name="bobot" id="bobot" class="form-control">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $("#tabelKriteria").DataTable();
    $("#tambahKriteria").click(function(){
        $("#modalKriteriaLabel").html('Tambah Kriteria');
        $("#formKriteria").attr('action', "{{ route('kriteria.store') }}")
        $("#nama").val('');
        $("#bobot").val('');
        $("#modalKriteria").modal();
    });
    $(".editKriteria").click(function(e){
        let id = $(e.target).data('id');
        let nama = $(e.target).data('nama');
        let bobot = $(e.target).data('bobot');
        $("#modalKriteriaLabel").html('Edit '+nama);
        $("#formKriteria").attr('action', "{{ route('kriteria.update') }}")
        $("#nama").val(nama);
        $("#bobot").val(bobot);
        $("#id_edit").val(id);
        $("#modalKriteria").modal();
    });
</script>
@endsection