@extends('dashboard')
@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<head>
<style>
* {
  box-sizing: border-box;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: white;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
</style>
</head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin-left : 150px;margin-right : 150px; margin-top : 20px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
            <a href="{{route('stdnts')}}">
            <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
            </a>
            Menyunting maklumat pelajar</h5>
        </div>

        <div class="row">
            <div class="col-lg-6" style="margin : auto; margin-top : 15px;">
            <div style="margin : auto; padding-bottom : 15px; border-style : solid; border-width : 1px; border-color :#d1d1d1; border-radius : 8px;">
                <div style="margin : 10px;">
                    <p style="color :dimgray; font-size : 14px;">Gambar pelajar :</p>
                    <center>
                        <span id="profile">
                            @if($data->profile_image != null)
                            <img src="/Image/{{$data->profile_image}}" style="border-radius : 100%; width : 150px; height : 150px;" class="img-fluid" alt="Wild Landscape" />
                            @else
                            <img src="/Image/profile.png" style="border-radius : 100%; width : 150px;" class="img-fluid" alt="Wild Landscape" />
                            @endif
                        </span>
                    </center>
                </div>
            </div>
            </div>
        </div>

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top : 15px; margin-left : 30px; margin-right : 30px;">
        <strong>Gagal!</strong> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

        <form style="margin : 50px;" action="{{route('modifStud')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 style="margin-top : 40px; margin-bottom : 23px;">Maklumat Pelajar</h4>

            <div class="col-lg-4 mb-6" style="position : relative; left : -10px;">
                <label for="formFileSm" class="form-label">Gambar Pelajar (*optional)</label>
                <input class="form-control form-control-sm" id="formFileSm" name="image" type="file">
            </div>

            <span style="color : #8a8888;">&nbsp;&nbsp;Unique ID</span>
            <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $data->unique_id }}"  readonly="readonly" style="width : 100px; margin-bottom : 40px;">

            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="tajuk">Nama Pelajar</label>
                <input type="text" name="studname" class="form-control" id="studname" placeholder="Nama Penuh" value="{{$data->fullname}}">
                </div>

                <div class="form-group col-md-4">
                <label for="tajuk">Tahun</label>
                <input type="number" max="6" min="1" name="year" class="form-control" id="year" placeholder="Tahun 3" value="{{$data->year}}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-group">
                        <label for="inputAddress2">Nama Jalan</label>
                        <input type="text" class="form-control" name="streetname" id="streetname" placeholder="Jalan No.23" value="{{$data->street}}">
                    </div>
                </div>

                <div class="form-group col-md-5">
                    <div class="form-group">
                        <label for="poskod">Poskod</label>
                        <input type="number" name="poscode" min="0" max="99999" class="form-control" id="poscode" placeholder="38600" value="{{$data->poscode}}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-group">
                        <label for="inputAddress2">Nama Bandar</label>
                        <input type="text" class="form-control" name="cityname" id="cityname" placeholder="Kampung Gajah" value="{{$data->city}}">
                    </div>
                </div>

                <div class="form-group col-md-5">
                <div class="form-group">
                        <label for="inputAddress2">Negeri</label>
                        <input type="text" class="form-control" name="statename" id="statename" placeholder="Perak" value="{{$data->state}}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <div class="form-group" style="height : 35px; border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Tarikh lahir</label>
                        <input type="date" id="date" name="dobdate" style="height : 35px;" value="{{$data->dob}}">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Suntingan</button>
        </form>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
@stop