@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
            <a href="{{route('bklst')}}">
            <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
            </a>
            Lihat Maklumat Buku</h5>
        </div>

        <div class="container">

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top : 15px;">
        <strong>Berjaya!</strong> {{ session('success') }}
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

        <center>
        <div style="margin-top : 30px; border-style : solid; border-width : 1px; border-color : #b5b5b5; width : 480px; border-radius : 8px; padding-bottom : 15px;">
            <div style="padding-bottom : 15px; margin-top : 15px;">
                <p style="margin-left : -290px; color : #706e6e;">Barkod Buku</p>
                {!! DNS1D::getBarcodeSVG($data->acquisition, 'C39', 1.4, 33) !!}
            </div>

            
                <span id="kulit-buku">
                    @if( $data->cover_image != null)
                    <img src="/Image/{{$data->cover_image}}" width="180px" class="img-fluid" alt="Wild Landscape" />
                    @else
                    <img src="/src/img/no_cover.jpg" class="img-fluid" alt="Wild Landscape" />
                    @endif
                </span>

                <p style="font-size : 12px; color : #706e6e;">Kulit buku</p>
            
        </div>
        <h4 style="margin-top : 15px;">{{$data->title}}</h4>
        </center>

        </div>

        <div style="margin-left : 100px; margin-right : 100px; border-style : solid; border-color : #bab8b8; border-width : 1px; border-radius : 8px;">
            <div style="margin : 20px;">
            <h4 style="margin-top : 40px; margin-bottom : 23px;">Maklumat Buku</h4>

            <!--<input type="text" name="id" value="{{ $data->id }}" readonly="readonly"/>-->
            <span style="color : #8a8888;">&nbsp;&nbsp;id</span>
            <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $data->id }}"  readonly="readonly" style="width : 100px; margin-bottom : 40px;">

            <div class="form-row">

                <div class="form-group col-md-4">
                <label for="identiti">Identiti Buku</label>
                <input type="text" class="form-control" id="identiti" name="identiti" placeholder="Nombor Identity Buku" value="{{$data->acquisition}}" readonly="readonly">
                </div>
                <div class="form-group col-md-8">
                <label for="tajuk">Tajuk buku</label>
                <input type="text" name="booktitle" class="form-control" id="tajukbuku" value="{{$data->title}}" placeholder="Tajuk buku" readonly="readonly">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="form-group">
                        <label for="rack">Nombor Rak Buku</label>
                        <input type="number" name="rack" min="0" max="9999" class="form-control" value="{{$data->rack_number}}" id="rack" placeholder="500" readonly="readonly">
                    </div>
                </div>

                <div class="form-group col-md-8">
                    <div class="form-group">
                        <label for="inputAddress2">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit" value="{{$data->publisher}}" placeholder="Pusat Penerbit" readonly="readonly">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Kategori</label>
                    <input id="myInput2" type="text" value="{{$data->languages->type_lang}}" name="pengarang" placeholder="Sila isikan nama pengarang" class="form-control" readonly="readonly">

                    <!--<div class="autocomplete" style="width: 100%;">
                        <input id="myInput1" type="text" onchange="keeptrackKategori()" name="kategori" placeholder="Sila isikan kategori" class="form-control">
                    </div> -->
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Bahasa</label>
                    <input id="myInput2" type="text" value="{{$data->languages->type_lang}}" name="pengarang" placeholder="Sila isikan nama pengarang" class="form-control" readonly="readonly">

                    <!--<div class="autocomplete" style="width: 100%;">
                        <input id="myInput3" type="text" onchange="keeptrackLanguage()" name="bahasa" placeholder="Sila isikan bahasa" class="form-control">
                    </div>-->
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Pengarang</label>
                    <div class="autocomplete" style="width: 100%;">
                        <input id="myInput2" type="text" value="{{$data->authors->name}}" name="pengarang" placeholder="Sila isikan nama pengarang" class="form-control" readonly="readonly">
                    </div>
                    </div>
                </div>

            </div>

            <div class="form-row" style="margin-top : 40px;">
                <div class="form-group col-md-4">
                    <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Tahun Terbit</label>
                        <input type="date" id="date" name="year_publish" value="{{$data->year_publish}}" readonly="readonly">
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                    <label for="perolehan" style="margin-left : 10px; font-size : 12px;">Tahun Perolehan</label>
                        <input type="date" id="date" name="year_acquisition" value="{{$data->year_acquisition}}" readonly="readonly">
                    </div>
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