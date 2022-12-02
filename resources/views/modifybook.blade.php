@extends('dashboard')
@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<head>
<style>
* {
  box-sizing: border-box;
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
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

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
</head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin-left : 150px;margin-right : 150px; margin-top : 20px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
            <a href="{{route('bklst')}}">
            <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </button>
            </a>
            Menyunting maklumat buku</h5>
        </div>

        <div class="row">
            <div class="col-lg-6" style="margin : auto; margin-top : 15px;">
            <div style="margin : auto; padding-bottom : 15px; border-style : solid; border-width : 1px; border-color :#d1d1d1; border-radius : 8px;">
                <div style="margin : 10px;">
                    <p style="color :dimgray; font-size : 14px;">Kulit buku :</p>
                    <center>
                        <span id="genbarcode">
                            @if( $data->cover_image != null)
                            <img src="/Image/{{$data->cover_image}}" class="img-fluid" alt="Wild Landscape" />
                            @else
                            <img src="/src/img/no_cover.jpg" class="img-fluid" alt="Wild Landscape" />
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

        <form style="margin : 40px;" action="{{route('modifBook')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <h4 style="margin-top : 40px; margin-bottom : 23px;">Sunting Maklumat Buku</h4>

            <!--<input type="text" name="id" value="{{ $data->id }}" readonly="readonly"/>-->
            <span style="color : #8a8888;">&nbsp;&nbsp;id</span>
            <input type="text" class="form-control" name="id" placeholder="ID" value="{{ $data->id }}"  readonly="readonly" style="width : 100px; margin-bottom : 40px;">

            <div class="col-lg-4 mb-6" style="position : relative; left : -10px;">
                <label for="formFileSm" class="form-label">Gambar Kulit Buku (*optional)</label>
                <input class="form-control form-control-sm" id="formFileSm" name="image" type="file">
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                <label for="identiti">Identiti Buku</label>
                <input type="text" class="form-control" id="identiti" name="identiti" placeholder="Nombor Identity Buku" value="{{$data->acquisition}}" readonly="readonly">
                </div>
                <div class="form-group col-md-8">
                <label for="tajuk">Tajuk buku</label>
                <input type="text" name="booktitle" class="form-control" id="tajukbuku" value="{{$data->title}}" placeholder="Tajuk buku">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <div class="form-group">
                        <label for="rack">Nombor Rak Buku</label>
                        <input type="number" name="rack" min="0" onkeyup="partOne()" max="9999" class="form-control" value="{{$data->rack_number}}" id="rack" placeholder="503">
                    </div>
                </div>

                <div class="form-group col-md-8">
                    <div class="form-group">
                        <label for="inputAddress2">Penerbit</label>
                        <input type="text" class="form-control" name="penerbit" id="penerbit" value="{{$data->publisher}}" placeholder="Pusat Penerbit">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Kategori</label>

                    <select class="form-select" onchange="partThree()" id="categoryval" name="categoryval" aria-label="Default select example">
                        <option selected disabled>Sila pilih kategori</option>
                        @forelse ($list_category as $list)
                            @if($list->id == $data->categ_id)
                            <option value="{{$list->id}}" selected>{{$list->category_name}}</option>
                            @else
                            <option value="{{$list->id}}">{{$list->category_name}}</option>
                            @endif
                        @empty
                        <option disabled>Tiada kategori dijumpai.</option>
                        @endforelse
                    </select>

                    <!--<div class="autocomplete" style="width: 100%;">
                        <input id="myInput1" type="text" onchange="keeptrackKategori()" name="kategori" placeholder="Sila isikan kategori" class="form-control">
                    </div> -->
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Bahasa</label>

                    <select class="form-select" name="languageval" onchange="partTwo()" id="languageval" aria-label="Default select example">
                        <option selected disabled>Sila pilih bahasa</option>
                        @forelse ($list_language as $list)
                            @if($list->id == $data->lang_id)
                            <option value="{{$list->id}}" selected>{{$list->type_lang}}</option>
                            @else
                            <option value="{{$list->id}}">{{$list->type_lang}}</option>
                            @endif
                        @empty
                        <option disabled>Tiada bahasa dijumpai.</option>
                        @endforelse
                    </select>

                    <!--<div class="autocomplete" style="width: 100%;">
                        <input id="myInput3" type="text" onchange="keeptrackLanguage()" name="bahasa" placeholder="Sila isikan bahasa" class="form-control">
                    </div>-->
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div>
                    <label for="inputAddress2">Pengarang</label>
                    <div class="autocomplete" style="width: 100%;">
                        <input id="myInput2" type="text" onchange="keeptrackAuthor()" value="{{$data->authors->name}}" name="pengarang" placeholder="Sila isikan nama pengarang" class="form-control">
                    </div>
                    </div>
                </div>

            </div>

            <div class="form-row" style="margin-top : 40px;">
                <div class="form-group col-md-4">
                    <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Tahun Terbit</label>
                        <input type="date" id="date" name="year_publish" value="{{$data->year_publish}}">
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                    <label for="perolehan" style="margin-left : 10px; font-size : 12px;">Tahun Perolehan</label>
                        <input type="date" id="date" name="year_acquisition" value="{{$data->year_acquisition}}">
                    </div>
                </div>
            </div>

            
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Sunting</button>
            </form>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>
    function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
            /*check if the item starts with the same letters as the text field value:*/
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
            }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 38) { //up
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(x);
        } else if (e.keyCode == 13) {
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        /*close all autocomplete lists in the document,
        except the one passed as an argument:*/
        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
        }
        }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
    }

    /*An array containing all the country names in the world:*/
    //var kategori = [];
    var pengarang = [];
    //var bahasa = [];
    //var choosenKategori = '';
    var choosenPengarang = '';
    //var choosenBahasa = '';

    /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
    </script>

    <script>
        /*function generatebarcode()
        {
            let input = document.getElementById('perolehan').value;
            //console.log(input);
            document.getElementById('genbarcode').innerHTML = "{!! DNS1D::getBarcodeSVG(" + input + " , 'C39') !!}";
        } */

        /*function keeptrackKategori()
        {
            const detik = setInterval(()=>{
                var KategoriVal = document.getElementById("myInput1").value;
                    choosenKategori = KategoriVal;
                    //console.log(choosenKategori); 
                clearInterval(detik);
            }, 500);

        }*/

        function keeptrackAuthor()
        {
            const detik = setInterval(()=>{
                var AuthorVal = document.getElementById("myInput2").value;
                    choosenPengarang = AuthorVal;
                    //console.log(choosenPengarang); 
                clearInterval(detik);
            }, 500);

        }

        function partTwo()
        {
            let langnumber = document.getElementById('languageval').value;
            let perolehan = document.getElementById('identiti').value;

            let zeros = '';
            for(let i = String(langnumber).length; i < 2; i++ )
            {
                zeros += '0';
            }

            langnumber = zeros + langnumber;

            if(perolehan.length != 15)
            {
                document.getElementById('identiti').value = '0000-' + '00' + '-00-' + langnumber;
            } else {
                let selebih = perolehan.substring(0, 13);
                document.getElementById('identiti').value = selebih + langnumber;
                //console.log(selebih);
            }
        }

        function partThree()
        {
            let catenumber = document.getElementById('categoryval').value;
            let perolehan = document.getElementById('identiti').value;

            let zeros = '';
            for(let i = String(catenumber).length; i < 2; i++ )
            {
                zeros += '0';
            }

            catenumber = zeros + catenumber;

            if(perolehan.length != 15)
            {
                document.getElementById('identiti').value = '0000-' + '00' + '-' + catenumber + '-00';
            } else {
                let selebih = perolehan.substring(0, 10);
                let selebih2 = perolehan.substring(13, 15);
                document.getElementById('identiti').value = selebih + catenumber + '-' + selebih2;
                //console.log(selebih);
            }
            //console.log(catenumber);
        }

        function partOne()
        {
            let racknumber = document.getElementById('rack').value;
            if(racknumber.length >= 5)
            {
                //console.log('lebih mat');
            } else {
                let perolehan = document.getElementById('identiti').value;
                if(racknumber.length < 4)
                {
                    let zeros = '';
                    for(let i = racknumber.length; i < 4; i++)
                    {
                        zeros += '0';
                    }
                    if(perolehan.length != 15)
                    {
                        document.getElementById('identiti').value = '0000-' + idBuku() + '-00-00';
                    }
                    let selainrack = document.getElementById('identiti').value.substring(4);
                    //console.log(selainrack);
                    //idBuku();
                    document.getElementById('identiti').value = zeros + racknumber + selainrack;
                } else {
                    let selainrack = document.getElementById('identiti').value.substring(4);
                    document.getElementById('identiti').value = racknumber + selainrack;
                }
            }
            //console.log(racknumber + '  -  ' + perolehan);
        }


    $('#formFileSm').on('change',function ()
    {
        var filePath = $(this).val();
        console.log(filePath);
        document.getElementById('genbarcode').innerHTML = `<p>Choosen image : ${filePath}</p>`;
    });

    $('#myInput2').on('keyup',function(){
        $value=$(this).val();
        choosenPengarang = $value;
        //console.log(choosenPengarang);
        //alert($value);
        if ($value.length == 0) {
            //alert('nothing');
            return;
        } else {
            //console.log($value);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById("txtHint").innerHTML = this.responseText;
                    pengarang = this.responseText;
                    pengarang = pengarang.replace(/[\[\]"]/g, '');
                    pengarang = pengarang.split(",");
                    //instructors.push('test');
                    
                    //instructros = instructors.substring();
                    //console.log(choosenPengarang);
                    autocomplete(document.getElementById("myInput2"), pengarang);
                    //console.log(pengarang);
                }
            };
            xmlhttp.open("GET", "/authorquery/" + $value, true);
            xmlhttp.send();
        }
        //choosenInstructors = $value;
        //console.log(choosenInstructors);
    });

    </script>
@stop