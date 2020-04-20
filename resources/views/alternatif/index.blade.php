@extends('../layout/app')

@section('contentheader')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Alternatif</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Alternatif</li>
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
                        Daftar Alternatif
                    </h3>
                    <div class="card-tools">
                        <button class="btn btn-primary" id="tambahAlternatif">Tambah Alternatif</button>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-hover text-center" id="tabelAlternatif">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th class="text-left">Nama Alternatif</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($alternatifs as $alternatif)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-left">{{ $alternatif->nama }}</td>
                                                    <td>
                                                        <span class="badge badge-success">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        <span class="badge badge-warning">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        <span class="badge badge-danger">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm editAlternatif" data-id="{{ $alternatif->id }}" data-nama="{{ $alternatif->nama }}">
                                                            <i class="fas fa-edit" data-id="{{ $alternatif->id }}" data-nama="{{ $alternatif->nama }}"></i>
                                                        </button>
                                                        <form action="{{ route('alternatif.destroy', $alternatif) }}" method="post" style="display: inline-block">
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
<div class="modal fade" id="modalAlternatif" tabindex="-1" role="dialog" aria-labelledby="modalAlternatifLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('alternatif.store') }}" method="post" id="formAlternatif">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAlternatifLabel">Tambah Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <label for="nama">Nama Alternatif</label>
                    <input type="hidden" name="id_edit" id="id_edit">
                    <input type="text" name="nama" id="nama" class="form-control">
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
    $("#tabelAlternatif").DataTable();
    $("#tambahAlternatif").click(function(){
        $("#modalAlternatifLabel").html('Tambah Alternatif');
        $("#formAlternatif").attr('action', "{{ route('alternatif.store') }}")
        $("#nama").val('');
        $("#modalAlternatif").modal();
    });
    $(".editAlternatif").click(function(e){
        let id = $(e.target).data('id');
        let nama = $(e.target).data('nama');
        $("#modalAlternatifLabel").html('Edit '+nama);
        $("#formAlternatif").attr('action', "{{ route('alternatif.update') }}")
        $("#nama").val(nama);
        $("#id_edit").val(id);
        $("#modalAlternatif").modal();
    });
</script>
@endsection