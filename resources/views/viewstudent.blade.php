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
            Pelajar</h5>
        </div>

        @if (session('success'))
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        </svg>

        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{ session('success') }}
        </div>
        </div>
        @endif

        <button style="margin-top : 10px; margin-left : 10px;" type="button" onclick="PrintElem('#dPDF')" class="btn btn-dark">
        <svg style="position : relative; top : -1px; margin-right : 2px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
        </svg>
        Print Kad</button>

        <div id="dPDF">
            <div class="row" style="margin : 5px;">
                <div class="col-lg-8" style="margin : auto; margin-top : 15px; width : 500px;">
                <div style="overflow : hidden; height : 220px; margin : auto; padding-bottom : 15px; border-style : solid; border-width : 1px; border-color :#d1d1d1; border-radius : 8px; background-image : url('/Image/cardcover.png'); background-repeat: no-repeat; background-size: cover;">
                
                    <div style="width : 100%; height : 30px; background-color : black; border-radius : 8px 8px 0px 0px; overflow : hidden;">
                        <center>    
                            <p style="color :white; font-size : 14px; position : relative; top : 5px;">Kad Pusat Sumber Sekolah (PSS) Pelajar SK Pengkalan Ara</p>
                        </center>
                    </div>
                            
                        <div style="margin : 15px;">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td>
                                <!--<div class="col-lg-4">-->
                                    <div style="margin-left : 10px;">
                                        <span id="profile" style="margin-left : 2.5px;">
                                        @if($data->profile_image != null)
                                        <img src="/Image/{{$data->profile_image}}" style="border-radius : 100%; width : 150px; height : 150px; filter: drop-shadow(5px 2px 4px #333333);" class="img-fluid" alt="Wild Landscape" />
                                        @else
                                        <img src="/Image/profile.png" style="border-radius : 100%; width : 150px;" class="img-fluid" alt="Wild Landscape" />
                                        @endif
                                        </span>
                                    </div>
                                <!--</div>

                                <div class="col-lg-8">-->
                                    </td>
                                    <td>

                                    <div style="margin-left : 20px;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <p style="font-size : 40px; font-family : Montserrat;"><strong>Kad PSS</strong></p>
                                                </td>
                                                <td>
                                                    <img height="60px" width="60px;" style="margin-left : 70%;" src="{{asset('/src/img/logo_sekolah.png')}}"/>
                                                </td>
                                            </tr>
                                        </table>
                                        <p>PSS ID : <strong>{{ $data->unique_id }}</strong><br>
                                        Nama   : {{ $data->fullname }}<br>
                                        Pelajar <strong>Tahun {{ $data->year }}</strong>
                                        </p>
                                    </div>
                                <!--</div>-->
                                    </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    
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

        <div style="margin-left : 75px; margin-right : 75px;">
            <h4 style="margin-top : 40px; margin-bottom : 23px;">Maklumat Pelajar</h4>

            <div class="form-row">
                <div class="form-group col-md-8">
                <label for="tajuk">Nama Pelajar</label>
                <input type="text" name="studname" class="form-control" id="studname" placeholder="Nama Penuh" value="{{$data->fullname}}" disabled>
                </div>

                <div class="form-group col-md-4">
                <label for="tajuk">Tahun</label>
                <input type="number" max="6" min="1" name="year" class="form-control" id="year" placeholder="Tahun 3" value="{{$data->year}}" disabled>
                </div>
            </div>

            <div class="row" style="margin-left : 10px;">
                <span style="color : #96948d">Didaftarkan pada : {{ $data->created_at }}</span>
            </div>

            <!--<div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-group">
                        <label for="inputAddress2">Nama Jalan</label>
                        <input type="text" class="form-control" name="streetname" id="streetname" placeholder="Jalan No.23" value="{{$data->street}}" disabled>
                    </div>
                </div>

                <div class="form-group col-md-5">
                    <div class="form-group">
                        <label for="poskod">Poskod</label>
                        <input type="number" name="poscode" min="0" max="99999" class="form-control" id="poscode" placeholder="38600" value="{{$data->poscode}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-7">
                    <div class="form-group">
                        <label for="inputAddress2">Nama Bandar</label>
                        <input type="text" class="form-control" name="cityname" id="cityname" placeholder="Kampung Gajah" value="{{$data->city}}" disabled>
                    </div>
                </div>

                <div class="form-group col-md-5">
                <div class="form-group">
                        <label for="inputAddress2">Negeri</label>
                        <input type="text" class="form-control" name="statename" id="statename" placeholder="Perak" value="{{$data->state}}" disabled>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-5">
                    <div class="form-group" style="height : 35px; border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;" >
                        <label for="terbit" style="margin-left : 10px;">Tarikh lahir</label>
                        <input type="date" id="date" name="dobdate" style="height : 35px;" value="{{$data->dob}}" disabled>
                    </div>
                </div>
            </div> -->
            
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script>
    //function printBarcode()
//{
        /*var prtContent = document.getElementById("dPDF");
        var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();*/

        /*var printContent = document.getElementById('dPDF').innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;*/

        /*var print_div = document.getElementById("dPDF");
        var print_area = window.open();
        print_area.document.write(print_div.innerHTML);
        print_area.document.close();
        print_area.focus();
        print_area.print();
        print_area.close();*/

        
    //}

    function PrintElem(elem)
    {
        Popup($('<div/>').append($(elem).clone()).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'KAD PSS', 'height=400,width=600');
        mywindow.document.write('<html><head><title>KAD PSS</title>');
        mywindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
    //  mywindow.close();

        return true;
    }
    </script>
@stop