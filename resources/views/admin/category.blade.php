@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <section class="content">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-body">
                                <a class="btn btn-primary" href="javascript:void(0)" id="tambahdata">
                                    Tambah Data
                                </a>
                                <br/>
                                <br/>
                                <table class="table table-bordered data-table" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th width="150px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                </div>
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- {{-- modal mulai --}} -->
<div class="modal fade" id="modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Bagian header modal-->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <img src="{{ asset('assets/images/close.jpeg') }}" style="width:20px; height:20px;">
                </button>
            </div>
            <!-- Akhir Bagian header modal-->
            <!-- Bagian Body Modal-->
            <div class="modal-body">
                <!-- Form-->
                <form id="form" name="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="control-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name Kategori" autocomplete="off" required>
                            <p style="color: red;" id="error_nama"></p>
                        </div>
                </form>
                <!-- Akhir Form-->
            </div>
            <!-- modal footer-->
            <div class="modal-footer">
                <button data-dismiss="modal" type="button" class="btn btn-danger pull-left"
                id="reset">Batal</button>

                <button align="right" type="submit" class="btn btn-primary" id="simpan">Simpan</button>
            </div>
            <!-- Akhir modal footer-->
        </div>
    </div>
</div>
<!-- modal berakhir -->
@endsection

@section('js')
<script type="text/javascript">
    $(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      //INDEX TABEL
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/category') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#tambahdata').click(function () {
        $('#form').trigger("reset");
        $('#category_id').val("");
        $('#modal').modal({backdrop: 'static', keyboard: false});
        $('#modal').modal('show');
    });
    $('body').on('click','.edit',function(){
        var idCategory = $(this).data('id');
        $.get("{{ url('admin/category') }}"+"/"+idCategory+"/edit", function(data){
            // console.log(data);
            $('#modal').modal({backdrop: 'static', keyboard: false});
            $('#modal').modal('show');
            $('#name').val(data.name);
            $('#category_id').val(data.id);
        });
    });
    $('body').on('click','.hapus', function(){
        var idCategory = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/category-destroy') }}"+"/"+idCategory,
            success: function(data){
                table.draw();
            },
            error: function(request, status, error) {
                console.log(error);
            }
        });
    });
    //KETIKA BUTTON SAVE DI KLIK
    $('#simpan').click(function (e) {
        e.preventDefault();
        // $(this).hide();
        var formdata = new FormData($('#form')[0]);
        $.ajax({
            data: formdata,
            url: "{{ url('admin/category-store') }}",
            type: "POST",
            cache:false,
            contentType: false,
            processData: false,
            success: function (data) {
                $('#form').trigger("reset");
                $('#modal').modal('hide');
                table.draw();
                Swal.fire({
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1000
                });
            },
            error: function (request, status, error) {
                console.log(error);
            }
        });
    });

});
</script>
@endsection
