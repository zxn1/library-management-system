@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">Senarai Bahasa</h5>
    </div>
        <div class="container">

        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top : 15px;">
        <strong>Berjaya!</strong> {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

        @if (session('fails'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top : 15px;">
        <strong>Gagal!</strong> {{ session('fails') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

        <form action="{{route('langsrch')}}" id="form1" method="POST" style="display : block; margin-top : 15px;">
        @csrf
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
            </svg>
            </span>
        </div>
        <input type="text" class="form-control" placeholder="Tulis jenis bahasa" name="search" aria-label="searchlang" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Mencari
            <svg style="margin-left : 3px; position : relative; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
            </svg>
            </button>
        </div>
        </div>
        </form>

            <div class="row" style="margin-top : 30px;">
                <div class="col-md-4">
                    <h2 class="admin-heading">Bahasa</h2>
                </div>
                <div class="offset-md-5 col-md-2">
                    <a class="add-new" href="{{route('langreg')}}">
                        <button type="button" class="btn btn-danger">
                        Tambah Jenis Bahasa
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286H4.545zm1.634-.736L5.5 3.956h-.049l-.679 2.022H6.18z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2zm7.138 9.995c.193.301.402.583.63.846-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6.066 6.066 0 0 1-.415-.492 1.988 1.988 0 0 1-.94.31z"/>
                        </svg>
                    </button></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    
                    <!-- table -->
                    <table class="table" style="margin-top : 15px;">
                    <thead class="lighten-2" style="background-color :#428bca; color : white; border-radius: 3px;">
                        <tr>
                        <th scope="col">Bil</th>
                        <th scope="col" style="width : 60%;">Jenis Bahasa</th>
                        <th scope="col">Jumlah Buku</th>
                        <th scope="col">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1; ?>
                        @forelse ($data as $index => $lang)
                        <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>{{ $lang->type_lang }}</td>
                        <td><span style="margin-left : 20%;">{{ $count[$index] }}</span></td>
                        <td>
                            <a href="/modifyLanguage/{{ $lang->id }}">
                            <button type="button" class="btn btn-success" style="border-radius : 100%; height : 35px; width : 35px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                            </button>
                            </a>

                            <a href="/deleteLanguage/{{ $lang->id }}">
                            <button type="button" class="btn btn-danger" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            </button>
                            </a>
                        </td>
                        </tr>
                        @empty
                            <tr>
                            <center>
                                <td></td>
                                <td colspan="4">Tiada jenis bahasa dijumpai.</td>
                            </center>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
                    <!-- end table -->

                    <div style="margin-left : 40%; position : relative; top : 15px;">
                    {{ $data->links() }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop