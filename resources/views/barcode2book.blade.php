@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; padding-bottom : 30px; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('barcode')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Proses Peminjaman</h5>
    </div>

       <div style="position : relative; top : 30px; margin : auto; background-color : lightgrey; box-shadow : 0 4px 5px rgb(0 0 0 / 50%); width : 550px;">
            <form action="{{ route('ProcBar') }}" method="POST">
            @csrf
            <div style="margin : 30px; padding-top : 30px;">
                <div>
                    <h6><strong>Peminjam</strong></h6>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            PSS ID
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Masukkan PSS ID Pelajar" aria-label="pssid" name="pssid" id="pssid" aria-describedby="basic-addon1">
                    <button onclick="checkAvailability()" id="tukarwarna" type="button" class="btn btn-dark">Check</button>
                </div>

                    <input type="text" name="bookid" value="{{ $data->id }}" style="display : none;"/>

                    <h6 style="padding-top : 5px;"><strong>Buku yang dipinjam</strong></h6>
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                @if($data->cover_image != null)
                                    <img style="height : 200px; width : 140px;" src="/Image/{{ $data->cover_image }}"/>
                                @else
                                    <img style="height : 200px; width : 140px;" src="/src/img/no_cover.jpg"/>
                                @endif
                            </div>
                            <center>
                                <span style="font-size : 11px; position : relative; top : -15px;">Tajuk : {{ $data->title }}</span>
                            </center>
                        </div>

                        <div class="col-lg-8" style="margin-bottom : 20px;">
                            <div style="margin-left : 30px;">
                                <span style="color : #5e5e5e;">Tarikh hari ini</span><br>
                                <input type="date" id="date" name="date" style="height : 35px; width : 180px;margin-bottom : 15px;" value="{{ $now }}" readonly="readonly">
                                
                                <br>
                                <span style="color : #5e5e5e;">Tempoh hari pinjam</span><br>
                                <select name="days" class="form-select" aria-label="Default select example" style="width : 180px;">
                                    <option selected disabled>Berapa hari?</option>
                                    <option value="3">3 Hari</option>
                                    <option value="5">5 Hari</option>
                                    <option value="7">7 Hari</option>
                                </select>

                                <br>
                                <button type="submit" style="width : 100%; margin-top : 40px;" type="button" class="btn btn-primary">Pinjamkan
                                    <svg style="margin-left : 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
       </div>
       <script>
        function checkAvailability()
        {
            
            //alert(document.getElementById('pssid').value);
            //ajax request
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 'no data')
                    {
                        //alert('no data found!');
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Tiada pelajar menggunakan PSS ID \'' + document.getElementById('pssid').value + '\'!',
                            footer: '<a href="">Why do I have this issue?</a>'
                            });
                    } else {
                        document.getElementById('tukarwarna').style.backgroundColor = '#4BB543';
                        Swal.fire(
                            'Good job!',
                            'Pelajar dijumpai! Nama : \'' + this.responseText + '\'.',
                            'success'
                            );
                        //alert(this.responseText);
                    }
                //document.getElementById("demo").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "checkAvailability/" + document.getElementById('pssid').value , true);
            xhttp.send();
        }
       </script>
    </div>
@stop