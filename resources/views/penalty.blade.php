@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<div style="border-style : solid; padding-bottom : 30px; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('bkloan')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Maklumat Denda</h5>
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
                <div>
                    <h6><strong>Peminjam</strong></h6>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            PSS ID
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="PSS ID Pelajar" aria-label="pssid" name="pssid" aria-describedby="basic-addon1" readonly="readonly" value="{{ $loan->unique_stud_id }}">
                    </div>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                            </svg>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama Pelajar" aria-label="studname" aria-describedby="basic-addon1" readonly="readonly" value="{{ $loan->students->fullname }}">
                    </div>

                    <h6 style="padding-top : 5px;"><strong>Buku yang dipinjam</strong></h6>
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="input-group mb-3">
                                @if($loan->books->cover_image != null)
                                    <img style="height : 200px; width : 140px;" src="/Image/{{ $loan->books->cover_image }}"/>
                                @else
                                    <img style="height : 200px; width : 140px;" src="/src/img/no_cover.jpg"/>
                                @endif
                            </div>
                            <center>
                                <span style="font-size : 11px; position : relative; top : -15px;">Tajuk : {{ $loan->books->title }}</span>
                            </center>
                        </div>

                        <div class="col-lg-8">
                            <!-- hutang details over here! -->
                            <div style="margin-left : 20px; position : relative; top : -10px;">
                                <h4>Denda</h4>
                                <div class="col-md-12">
                                    <div class="form-group" style="height : 35px; border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                                        <label for="terbit" style="margin-left : 0px; font-size : 14px;">Tarikh Perlu Pulang</label>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="date" id="date" name="dobdate" style="height : 35px; width : 180px;" value="{{ $loan->return_date }}" disabled>
                                                </td>
                                                <td>
                                                    <div style="background-color : #525252; width : 35px; height : 35px; position : relative; left : -2px; color : white; border-radius : 0px 8px 8px 0px;">
                                                        <svg style="position : relative; left : 8px; top : 3px; opacity : 0.75;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                                        </svg>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="form-group" style="padding-top : 25px; height : 35px; border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                                        <label for="terbit" style="margin-left : 0px; font-size : 14px;">Tarikh Sekarang</label>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="date" id="date" name="dobdate" style="height : 35px; width : 180px;" value="{{ $date }}" disabled>
                                                </td>
                                                <td>
                                                    <div style="background-color : #525252; width : 35px; height : 35px; position : relative; left : -2px; color : white; border-radius : 0px 8px 8px 0px;">
                                                        <svg style="position : relative; left : 8px; top : 3px; opacity : 0.75;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-check-fill" viewBox="0 0 16 16">
                                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                                                        </svg>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <span style="position : relative; top : 50px; left : 2px;">Lewat : {{ $diffInDays }} hari<br>
                                    Kadar bayaran : RM{{ $charge }}/hari
                                    </span>
                                    <h5 style="position : relative; top : 65px;">Perlu bayar <strong>RM {{ $fee }}</strong></h5>
                                </div>
                            </div>
                            <!-- end kira hutang -->
                        </div>
                    </div>

                    <a href="/payPenalty/{{ $loan->id }}">
                        <button type="submit" class="btn btn-info" style="margin-bottom : 15px;">Bayar Hutang</button>
                    </a>
                </div>
            </div>
       </div>

    </div>
@stop