@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>CRUD LARAVEL 8</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pekerj.create') }}"> Input Pekerja</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Id_Pekerja</th>
            <th width="280px"class="text-center">Nama Pekerja</th>
            <th width="280px"class="text-center">Alamat Pekerja</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pekerj as $pekerja)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $pekerja->Id_Pekerja }}</td>
            <td>{{ $pekerja->NamaPekerja }}</td>
            <td>{{ $pekerja->AlamatPekerja }}</td>
            <td class="text-center">
                <form action="{{ route('pekerj.destroy',$pekerja->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('pekerj.show',$pekerja->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('pekerj.edit',$pekerja->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $pekerj->links() !!}

@endsection