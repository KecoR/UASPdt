@extends('layouts.global')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Kirim Gambar Implementasi TCP</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('nomor3.kirim') }}">
                        @csrf
                        <div class="">
                            <label for="name">Pilih gambar</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div><br>
                    <button type="submit" class="btn btn-primary">Kirim Gambar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection