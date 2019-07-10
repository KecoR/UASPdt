@extends('layouts.global')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Kirim Audio Implementasi TCP</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('nomor4.kirim') }}">
                        @csrf
                        <div class="">
                            <label for="name">Pilih Audio</label>
                            <input type="file" name="audio" id="audio" class="form-control" required>
                        </div><br>
                    <button type="submit" class="btn btn-primary">Kirim Gambar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection