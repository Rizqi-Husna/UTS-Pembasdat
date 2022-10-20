@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Pekerja</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pekerj.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id_Pekerja:</strong>
                {{ $pekerj->Id_Pekerja }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pekerja:</strong>
                {{ $pekerj->NamaPekerja }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Pekerja:</strong>
                {{ $pekerj->AlamatPekerja }}
            </div>
        </div>
    </div>
@endsection