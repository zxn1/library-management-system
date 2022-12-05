@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">Senarai Pelajar</h5>
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

        <div class="input-group mb-3" style="width : 350px; margin-top : 15px;">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/>
            </svg>
            </span>
        </div>
            <select onchange="perubahanfilter()" class="form-select" aria-label="Default select example" style="height : 35px;" id="pilihanfilter">
                <option value="1" selected>Carian mengikut tajuk</option>
                <option value="2">Carian mengikut nama penerbit</option>
                <option value="3">Carian mengikut nama pengarang</option>
                <option value="4">Carian mengikut tahun terbit</option>
                <option value="5">Carian mengikut tahun perolehan</option>
            </select>
        </div>

        <!-- search type 1 -->
        <form action="{{route('searchbooktitle')}}" id="form1" method="POST" style="display : block;">
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
        <input type="text" class="form-control" placeholder="Tulis tajuk buku" name="booktitle" aria-label="titlebook" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Mencari
            <svg style="margin-left : 3px; position : relative; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
            </svg>
            </button>
        </div>
        </div>
        </form>

        <!-- search type 2 -->
        <form action="{{route('searchbookpublish')}}" id="form2" method="POST" style="display : none;">
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
        <input type="text" class="form-control" placeholder="Tulis nama penerbit buku" name="publisher" aria-label="publisher" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Mencari
            <svg style="margin-left : 3px; position : relative; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
            </svg>
            </button>
        </div>
        </div>
        </form>

        <!-- search type 3 -->
        <form action="{{route('searchbookauth')}}" id="form3" method="POST" style="display : none;">
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
        <input type="text" class="form-control" placeholder="Tulis nama pengarang buku" name="author" aria-label="author" aria-describedby="basic-addon1">
        <div class="input-group-append">
            <button type="submit" class="btn btn-dark" type="button">Mencari
            <svg style="margin-left : 3px; position : relative; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
            </svg>
            </button>
        </div>
        </div>
        </form>

        <!-- search type 4 -->
        <form action="{{route('srchbookbypublished')}}" id="form4" method="POST" style="display : none;">
        @csrf
        <div class="form-row" style="margin-top : 40px;">
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                            <label for="terbit" style="margin-left : 10px;">Mula pada</label>
                            <input type="date" id="date" name="start_year_publish">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Akhir pada</label>
                        <input type="date" id="date" name="end_year_publish">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-dark" type="button">Mencari
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                            <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- search type 5 -->
        <form action="{{route('srchbookbyacquisition')}}" id="form5" method="POST" style="display : none;">
        @csrf
        <div class="form-row" style="margin-top : 40px;">
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                            <label for="terbit" style="margin-left : 10px;">Mula pada</label>
                            <input type="date" id="date" name="start_year_acquisition">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Akhir pada</label>
                        <input type="date" id="date" name="end_year_acquisition">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-dark" type="button">Mencari
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                            <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                            <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- end search form -->

            <div class="row" style="margin-top : 30px;">
                <div class="col-md-4">
                    <h2 class="admin-heading">Pelajar</h2>
                </div>
                <div class="offset-md-5 col-md-2">
                    <a class="add-new" href="{{route('regStud')}}">
                        <button type="button" class="btn btn-danger">
                        Tambah Pelajar Baru
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
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
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Pelajar</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Modify</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1; ?>
                        @forelse ($data as $stud)
                        <tr>
                        <th scope="row">{{ $key++ }}</th>
                        <td>
                            @if($stud->profile_image != null)
                            <img class="img-fluid" width="70px" src="./Image/{{ $stud->profile_image }}"/>
                            @else
                            <img class="img-fluid" width="70px" src="./Image/profile.png"/>
                            @endif
                        </td>
                        <td>{{ $stud->fullname }}</td>
                        <td><span style="margin-left : 20px;">{{ $stud->year }}</span></td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <a href="/viewBooks/{{ $stud->unique_id }}">
                                        <button type="button" class="btn btn-primary" style="border-radius : 100%; height : 35px; width : 35px;">
                                        <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                        </svg>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/modifybooks/{{ $stud->unique_id }}">
                                        <button type="button" class="btn btn-success" style="border-radius : 100%; height : 35px; width : 35px;">
                                        <svg style="position : relative; left : -3px; top : -3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                        </svg>
                                        </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/removeBook/{{ $stud->unique_id }}">
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
        function perubahanfilter()
        {
            let val = document.getElementById('pilihanfilter').value;
            if(val == 1)
            {
                //console.log('mantap');
                document.getElementById('form1').style.display = 'block';
                document.getElementById('form2').style.display = 'none';
                document.getElementById('form3').style.display = 'none';
                document.getElementById('form4').style.display = 'none';
                document.getElementById('form5').style.display = 'none';
            } else if(val == 2)
            {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'block';
                document.getElementById('form3').style.display = 'none';
                document.getElementById('form4').style.display = 'none';
                document.getElementById('form5').style.display = 'none';
            } else if(val == 3)
            {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'none';
                document.getElementById('form3').style.display = 'block';
                document.getElementById('form4').style.display = 'none';
                document.getElementById('form5').style.display = 'none';
            } else if(val == 4)
            {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'none';
                document.getElementById('form3').style.display = 'none';
                document.getElementById('form4').style.display = 'block';
                document.getElementById('form5').style.display = 'none';
            } else if(val == 5)
            {
                document.getElementById('form1').style.display = 'none';
                document.getElementById('form2').style.display = 'none';
                document.getElementById('form3').style.display = 'none';
                document.getElementById('form4').style.display = 'none';
                document.getElementById('form5').style.display = 'block';
            }
        }
        /*function generatebarcode()
        {
            let input = document.getElementById('perolehan').value;
            //console.log(input);
            document.getElementById('genbarcode').innerHTML = "{!! DNS1D::getBarcodeSVG(" + input + " , 'C39') !!}";
        } */
    </script>
@stop