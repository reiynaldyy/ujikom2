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
                              <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary" id="tambahdata" href="javascript:void(0);">
                Tambah Data
               </button>
                <br/>
                <table class="table table-bordered data-table" width="100%">
                <thead class="thead-dark">
                    <tr>
                                    <tr>
                                        <th width="10px">No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Slug</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
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
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <!-- Akhir Bagian header modal-->
            <!-- Bagian Body Modal-->
            <div class="modal-body">
                <!-- Form-->
                <form id="form" name="form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="produk_id" id="produk_id">
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="name" class="control-label">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Produk">
                        </div>
                         <div class="col-sm-12">
                            <label for="name" class="control-label">Nama Kategori</label>
                            <select name="category_id" id="category_id" class="form-control"></select>
                        </div>
                         <div class="col-sm-12">
                            <label for="name" class="control-label">Foto</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                         <div class="col-sm-12">
                            <label for="name" class="control-label">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control">
                        </div>
                         <div class="col-sm-12">
                            <label for="name" class="control-label">Stok</label>
                            <input type="text" name="stok" id="stok" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <label for="name" class="control-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
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
        ajax: "{{ url('admin/product') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'gambar', name: 'gambar'},
            {data: 'nama', name: 'nama'},
            {data: 'slug', name: 'slug'},
            {data: 'category.nama', name: 'category_id'},
            {data: 'harga', name: 'harga'},
            {data: 'stok', name: 'stok'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#tambahdata').click(function () {
        $('#form').trigger("reset");
        $('#category_id').trigger("reset");
        $('#product_id').val('');
        $('#modal').modal({backdrop: 'static', keyboard: false});
        $('#modal').modal('show');
    });
    $('body').on('click','.edit',function(){
        var idProduk = $(this).data('id');
        $.get("{{ url('admin/product') }}"+"/"+idProduk+"/edit", function(data){
            // console.log(data);
            // $('#modal').modal({backdrop: 'static', keyboard: false});
            $('#modal').modal('show');
            $('#product_id').val(data.produk.id);
            $('#nama').val(data.produk.nama);
            $('#category_id').html(data.category.id);
            $('#category_id').html(data.category.nama);
            $('#harga').val(data.product.harga);
            $('#stok').val(data.product.stok);
            // $('#foto').html(data.produk.foto);
            $('#description').val(data.product.deskripsi);
        });
    });
    $('body').on('click','.hapus', function(){
        var idProduk = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "{{ url('admin/product-destroy') }}"+"/"+idProduk,
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
            url: "{{ url('admin/product-store') }}",
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
    $.ajax({
        url: "{{ url('admin/category') }}",
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            $.each(berhasil.data, function (key, value) {
                $('#category_id').append(
                    `
                    <option value="${value.id}">
                        ${value.nama}
                    </option>
                    `
                )
            })
        },
        error: function () {
            console.log('data tidak ada');
        }
    });
});
</script>
@endsection
