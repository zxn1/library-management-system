@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('category')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Menyunting Kategori</h5>
    </div>

    @if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Ralat!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif

       <div style="position : relative; top : 30px; margin : auto; background-color : lightgrey; box-shadow : 0 4px 5px rgb(0 0 0 / 50%); width : 550px;">
            <div style="margin : 30px; padding-top : 30px;">
                <form action="{{route('editcate')}}" method="POST">
                    @csrf
                    <h6><strong>Sunting Kategori Buku</strong></h6>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            id
                        </span>
                    </div>
                    <input type="text" readonly="readonly" class="form-control" placeholder="id kategori" aria-label="cateid" name="id" aria-describedby="basic-addon1" value="{{ $cate->id }}">
                    </div>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                            </svg>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama baru Kategori Buku" aria-label="category" name="category_name" aria-describedby="basic-addon1" value="{{ $cate->category_name }}">
                    </div>
                    <button type="submit" class="btn btn-success" style="margin-bottom : 15px;">Menyimpan Suntingan</button>
                </form>
            </div>
       </div>

    </div>
@stop