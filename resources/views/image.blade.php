@extends('layouts.global')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <a href="#" class="btn btn-success ml-auto mb-4" data-toggle="modal" data-target="#addModal">Tambah Baru</a>
              <div class="card-header card-header-primary">
                <h4 class="card-title ">List Image</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>#</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1
                        @endphp
                      @foreach ($imgs as $img)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $img->image_name }}</td>
                            <td><img src="{{ asset('upload/images/'.$img->image_path) }}" width="75px"></td>
                            <td>
                                {{-- <button class="btn btn-sm btn-success editbutton" data-id="{{ $img->id }}"><i class="fa fa-sm fa-edit text-white"> Edit</i></button> --}}
                                <a href="#" class="btn btn-sm btn-success editbutton" data-id="{{ $img->id }}">Edit</a>
                            </td>
                        </tr>
                        @php
                            $no++
                        @endphp
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('modal')
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('nomor1.add') }}" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Gambar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div>
                                <label for="image">Gambar</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="book_id" id="book_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tmabah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('nomor1.update') }}" enctype="multipart/form-data">
                <input type="hidden" value="" id="id" name="id_old">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name_edit"/>
                    </div>
                    <div class="form-group">
                        <label for="current_image">Current Image</label>
                        <br>
                        <div id="image_paid_view">
                            <p id="image_text">No Image</p>
                            <img id="image_edit" src="" width="100px">
                        </div>
                    </div>
                    <div>
                        <input type="file" name="image" id="image" class="form-control">
                        <span style="font-size:10px;">kosongkan jika tidak ingin mengubah gambar</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).on("click",".editbutton",function(){
            let data_id = $(this).attr('data-id');
            $("#image_text").fadeOut();
            $("#image_edit").fadeOut();
            $.get('/nomor1/get/'+data_id,function(data){
                let file_paid = data.image_path;
                if(file_paid == null){
                    $("#image_text").fadeIn();
                }else{
                    $("#image_edit").attr("src",'/upload/images/' + file_paid);

                    $("#image_edit").fadeIn();

                }
                $("#id").val(data.id);
                $("#name_edit").val(data.image_name);
                $("#editModal").modal('show');
            });
        });
    </script>
@endsection