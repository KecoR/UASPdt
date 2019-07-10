@extends('layouts.global')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Hitung Array</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('nomor5.hitung') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nilai 1</label>
                            <input type="text" name="nilai1" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="name">Nilai 2</label>
                            <input type="text" name="nilai2" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label for="name">Nilai 3</label>
                            <input type="text" name="nilai3" class="form-control" required/>
                        </div>
                        <span style="font-size:10px;">masukan angka menggunakan 6 nilai dengan menggunakan koma untuk pemisah setiap nilai</span><br>
                    <button type="submit" class="btn btn-primary">Hitung</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection