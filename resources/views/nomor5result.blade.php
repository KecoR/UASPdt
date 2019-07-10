@extends('layouts.global')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Result</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="#">
                        <div class="form-group">
                            <label for="name">Nilai 1</label><br>
                            <span>
                                @php
                                    print_r($nilai1)
                                @endphp
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Nilai 2</label><br>
                            <span>
                                @php
                                    print_r($nilai2)
                                @endphp
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="name">Nilai 3</label><br>
                            <span>
                                @php
                                    print_r($nilai3)
                                @endphp
                            </span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="name">Total Nilai per index</label><br>
                            <span>
                                @php
                                    print_r($totalindex)
                                @endphp
                            </span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="name">Total Semua Nilai</label><br>
                            <span>
                                @php
                                    print_r($totalnilai)
                                @endphp
                            </span>
                        </div>
                    <a href="{{ route('nomor5') }}" class="btn btrn-primary">Hitung lagi</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection