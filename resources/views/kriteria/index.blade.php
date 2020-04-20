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
                                                <th>Bobot</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kriterias as $kriteria)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="text-left">{{ $kriteria->nama }}</td>
                                                    <td>{{ $kriteria->bobot }}</td>
                                                    <td>
                                                        @if(count($kriteria->kategori) > 0)
                                                        <span class="badge badge-success">
                                                            <i class="fas fa-check"></i>
                                                        </span>
                                                        @else
                                                        <span class="badge badge-danger">
                                                            <i class="fas fa-exclamation-triangle"></i>
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm lihatKategori" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}">
                                                            <i class="fas fa-eye" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}"></i>
                                                        </button>
                                                        <button class="btn btn-warning btn-sm editKriteria" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}" data-jenis="{{ $kriteria->jenis }}" data-bobot="{{ $kriteria->bobot }}">
                                                            <i class="fas fa-edit" data-id="{{ $kriteria->id }}" data-nama="{{ $kriteria->nama }}" data-jenis="{{ $kriteria->jenis }}" data-bobot="{{ $kriteria->bobot }}"></i>
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
<!-- Modal Kriteria -->
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
                    <div id="inputKriteria">
                        <div class="form-group">
                            <label for="nama">Nama Kriteria</label>
                            <input type="hidden" name="id_edit" id="id_edit">
                            <input type="text" name="nama" id="nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Kriteria</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="1">Keuntungan</option>
                                <option value="0">Biaya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bobot">Bobot Kriteria</label>
                            <input type="number" name="bobot" id="bobot" class="form-control" required>
                        </div>
                    </div>
                    <div id="inputKategori">
                        
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
        $("#nama").prop('required',true);
        $("#bobot").prop('required',true);
        $("#jenis").prop('required',true);
        $("#inputKriteria").show();
        $("#inputKategori").html('');
        $("#modalKriteria").modal();
    });
    $(".editKriteria").click(function(e){
        let id = $(e.target).data('id');
        let nama = $(e.target).data('nama');
        let bobot = $(e.target).data('bobot');
        let jenis = $(e.target).data('jenis');
        $("#modalKriteriaLabel").html('Edit '+nama);
        $("#formKriteria").attr('action', "{{ route('kriteria.update') }}")
        $("#nama").val(nama);
        $("#bobot").val(bobot);
        $("#jenis").val(jenis);
        $("#id_edit").val(id);
        $("#nama").prop('required',true);
        $("#bobot").prop('required',true);
        $("#jenis").prop('required',true);
        $("#inputKriteria").show();
        $("#inputKategori").html('');
        $("#modalKriteria").modal();
    });
    $(".lihatKategori").click(function(e){
        let id = $(e.target).data('id');
        let nama = $(e.target).data('nama');
        $("#id_edit").val(id);
        $("#nama").prop('required',false);
        $("#bobot").prop('required',false);
        $("#modalKriteriaLabel").html('Kategori '+nama);
        $("#formKriteria").attr('action', "{{ route('kategori.update') }}")
        $("#inputKriteria").hide();
        $.ajax({
            type: 'GET',
            url: "{{ route('kategori.index') }}"+"/"+id,
            success: function(data) {
                $("#inputKategori").html(data);
                $("#modalKriteria").modal();
            }
        });
    });
    function tambahKategori(e){
        e.preventDefault;
        if($("#none")){
            $("#none").remove();
        }
        let content = 
        "<tr>"+
            "<td width='75%'>"+
                "<input placeholder='Nama Kategori' type='text' name='kategori[]' class='form-control' required>"+
            "</td>"+
            "<td width='25%'>"+
                "<input placeholder='Nilai' type='number' name='nilai[]' class='form-control' required>"+
            "</td>"+
        "</tr>";
        $("#tabelKategori").append(content);
    }
</script>
@endsection