@extends('layouts.admin')
 
@section('content')

<div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kelola Barang</li>
                </ol>
            </nav>
        </div>
        <div class="card">
                <div class="card-body">
    <div class="row mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Kelola Barang</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('post.create') }}"> Create Post</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif 
            
                    <div class="row">
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Title</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_barang }}</td>
            <td class="text-center">
                <form action="{{ route('post.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('post.show',$post->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('post.edit',$post->id) }}">Edit</a>
 
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

 </div>
 </div>
 </div>
    {!! $posts->links() !!}
 
@endsection