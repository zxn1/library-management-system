@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">Senarai Peminjam</h5>
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
                    <h2 class="admin-heading">Peminjam</h2>
                </div>
                <div class="offset-md-5 col-md-2">
                    <a class="add-new" href="{{route('addbkloan')}}">
                        <button type="button" class="btn btn-danger">
                        Tambah Peminjam
                        <svg style="position : relative; top : -2px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
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
                        <th scope="col">Nama Pelajar</th>
                        <th scope="col">Pinjam Buku</th>
                        <th scope="col">Tarikh Pinjam</th>
                        <th scope="col">Tarikh Pulang</th>
                        <th scope="col">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1; ?>
                        @forelse ($data as $index => $loans)
                        <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>{{ $loans->students->fullname }}</td>
                        <td>{{ $loans->books->title }}</td>
                        <td>{{ $loans->loan_date }}</td>
                        @if( $denda[$index] == 0 )
                        <td><div style="background-color : #64e366; border-radius : 8px;"><center>{{ $loans->return_date }}</center></div></td>
                        @elseif( $denda[$index] == 1 )
                        <td><div style="background-color : #d63658; border-radius : 8px; color : white;"><center>{{ $loans->return_date }} *lewat</center></div></td>
                        @endif
                        <td>
                            <a href="/deleteBookloan/{{ $loans->id }}">
                            <button type="button" class="btn btn-danger" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            </button>
                            </a>

                            @if( $denda[$index] == 1 )

                            <a href="/sadasda/{{ $loans->id }}">
                            <button type="button" class="btn btn-warning" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                            </button>
                            </a>

                            @endif

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