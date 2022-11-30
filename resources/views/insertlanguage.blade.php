@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('lang')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Tambah Jenis Bahasa</h5>
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
                <form action="{{route('getlangreg')}}" method="POST">
                    @csrf
                    <h6><strong>Maklumat Bahasa</strong></h6>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                            </svg>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Jenis Bahasa" aria-label="authorname" name="type_lang" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn btn-info" style="margin-bottom : 15px;">Simpan</button>
                </form>
            </div>
       </div>

    </div>
@stop