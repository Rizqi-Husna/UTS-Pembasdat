@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Pekerja</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pekerj.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pekerj.update',$pekerj->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Id_Pekerja:</strong>
                <input type="text" name="Id_Pekerja" class="form-control" placeholder="Id_Pekerja" value="{{ $pekerj->Id_Pekerj }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pekerja:</strong>
                <input type="text" name="NamaPekerja" value="{{ $pekerj->NamaPekerja }}" class="form-control" placeholder="Nama Pekerja">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat Pekerja:</strong>
                <textarea class="form-control" style="height:150px" name="AlamatPekerja" placeholder="Content">{{ $pekerj->AlamatPekerja }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
@endsection