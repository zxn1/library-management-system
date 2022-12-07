@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('stdnts')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Status Pinjam Buku
        </h5>
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

            <div class="row" style="margin-top : 30px;">
                <div class="col-md-1">
                    @if($nama->profile_image != null)
                    <img style="height : 100px; width : 100px; border-radius : 100%;" src="/Image/{{ $nama->profile_image }}"/>
                    @else
                    <img style="height : 100px; width : 100px; border-radius : 100%;" src="/Image/profile.png"/>
                    @endif
                </div>
                <div class="col-md-7" style="margin-left : 30px;">
                    <h2 class="admin-heading" style="margin-top : 20px;">{{ $nama->fullname }}</h2>
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
                        <!--<th scope="col">Nama Pelajar</th>-->
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
                        <!--<td>{{ $loans->students->fullname }}</td>-->
                        <td>{{ $loans->books->title }}</td>
                        <td>{{ $loans->loan_date }}</td>
                        @if( $denda[$index] == 0 )
                        <td><div style="background-color : #64e366; border-radius : 8px;"><center>{{ $loans->return_date }}</center></div></td>
                        @elseif( $denda[$index] == 1 )
                        <td><div style="background-color : #d63658; border-radius : 8px; color : white;"><center>{{ $loans->return_date }} *lewat</center></div></td>
                        @endif
                        <td>

                            @if( $denda[$index] == 0 )
                            <a href="/returnBookComplete/{{ $loans->id }}">
                            <button type="button" class="btn btn-success" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                            </svg>
                            </button>
                            </a>
                            @endif

                            @if( $denda[$index] == 1 )
                            <!--<a href="/deleteBookloan/{{ $loans->id }}">-->
                            <button type="button" class="btn btn-dark" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            </button>
                            <!--</a>-->
                            @endif

                            <a href="/deleteBookloan/{{ $loans->id }}">
                            <button type="button" class="btn btn-danger" style="border-radius : 100%; height : 35px; width : 35px; margin-left : 5px;">
                            <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                            </button>
                            </a>

                            @if( $denda[$index] == 1 )

                            <a href="/penaltyCharge/{{ $loans->id }}">
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
                                <td colspan="4">Tiada pinjaman buku yang dijumpai.</td>
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