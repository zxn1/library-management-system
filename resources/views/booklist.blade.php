@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">Senarai Buku</h5>
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
                <div class="col-md-4">
                    <h2 class="admin-heading">Buku</h2>
                </div>
                <div class="offset-md-5 col-md-2">
                    <a class="add-new" href="{{route('bkreg')}}">
                        <button type="button" class="btn btn-danger">
                        Tambah Buku Baru
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
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
                        <th scope="col">Kulit Buku</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Bahasa</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Tahun Perolehan</th>
                        <th scope="col">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1; ?>
                        @forelse ($data as $books)
                        <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>
                            @if($books->cover_image != null)
                            <img class="img-fluid" width="100px" src="./Image/{{ $books->cover_image }}"/>
                            @else
                            <img class="img-fluid" width="100px" src="./src/img/no_cover.jpg"/>
                            @endif
                        </td>
                        <td>{{ $books->title }}</td>
                        <td>{{ $books->authors->name }}</td>
                        <td>{{ $books->publisher }}</td>
                        <td>{{ $books->languages->type_lang }}</td>
                        <td>{{ $books->year_publish }}</td>
                        <td>{{ $books->year_acquisition }}</td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <a href="/viewBooks/{{ $books->id }}">
                                        <button type="button" class="btn btn-primary" style="border-radius : 100%; height : 35px; width : 35px;">
                                        <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/modifybooks/{{ $books->id }}">
                                        <button type="button" class="btn btn-success" style="border-radius : 100%; height : 35px; width : 35px;">
                                        <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/removeBook/{{ $books->id }}">
                                        <button type="button" class="btn btn-danger" style="border-radius : 100%; height : 35px; width : 35px;">
                                        <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                        </svg>
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            
                        </td>
                        </tr>
                        @empty
                            <tr>
                            <center>
                                <td></td>
                                <td></td>
                                <td colspan="4">No Books Found</td>
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
    <script>
        /*function generatebarcode()
        {
            let input = document.getElementById('perolehan').value;
            //console.log(input);
            document.getElementById('genbarcode').innerHTML = "{!! DNS1D::getBarcodeSVG(" + input + " , 'C39') !!}";
        } */
    </script>
@stop