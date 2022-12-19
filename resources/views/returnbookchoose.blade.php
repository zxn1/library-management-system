@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<style>
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
<div style="border-style : solid; padding-bottom : 30px; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
    <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
        <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">
        <a href="{{route('dash')}}">
        <button type="button" class="btn btn-dark" style="border-radius : 100%; margin-right : 15px;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
        </button>
        </a>
        Proses Pemulangan</h5>
    </div>

       <div style="position : relative; top : 30px; margin : auto; background-color : lightgrey; box-shadow : 0 4px 5px rgb(0 0 0 / 50%); width : 550px;">
            <form action="{{ route('procRetWBar') }}" method="POST">
            @csrf
            <div style="margin : 30px; padding-top : 30px;">
                <div>
                    <h6><strong>Peminjam</strong></h6>

                    <div style="padding-bottom : 15px;">
                        <span style="color : #5e5e5e;">Berurusan menggunakan :</span><br>
                        <select onchange="berurusan()" id="pilihanBerurusan" name="pilihanBerurusan" class="form-select" aria-label="Default select example" style="width : 180px; margin-bottom: 15px;">
                            <option selected disabled>Sila pilih</option>
                            <option value="1">PPS ID</option>
                            <option value="2">Nama Penuh</option>
                        </select>

                        <div style="display:none;" id="select1">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        PSS ID
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Masukkan PSS ID Pelajar" aria-label="pssid" name="pssid" id="pssid" aria-describedby="basic-addon1">
                                <button onclick="checkAvailability()" id="tukarwarna" type="button" class="btn btn-dark">Check</button>
                            </div>
                        </div>

                        <div style="display:none;" id="select2">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        Nama Pelajar
                                    </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Penuh Pelajar" aria-label="studname" name="studname" id="studname" onchange="keeptrackStudent()" aria-describedby="basic-addon1">
                            </div>
                        </div>
                      
                        <button type="submit" style="width : 100%;" type="button" class="btn btn-primary">Lanjut Proses Pemulangan
                            <svg style="margin-left : 5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                            </svg>
                        </button>
                    </div>
                    </div>
                </div>
            </div>
            </form>
       </div>
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
            var studentname = [];
            //var bahasa = [];
            //var choosenKategori = '';
            var choosenStudentname = '';
            
            function keeptrackStudent()
            {
                const detik = setInterval(()=>{
                    var StudentVal = document.getElementById("studname").value;
                    choosenStudentname = StudentVal;
                        //console.log(choosenPengarang); 
                    clearInterval(detik);
                }, 500);

            }

            $('#studname').on('keyup',function(){
            $value=$(this).val();
            choosenStudentname = $value;
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
                        studentname = this.responseText;
                        studentname = studentname.replace(/[\[\]"]/g, '');
                        studentname = studentname.split(",");
                        //instructors.push('test');
                        
                        //instructros = instructors.substring();
                        //console.log(choosenPengarang);
                        autocomplete(document.getElementById("studname"), studentname);
                        //console.log(pengarang);
                    }
                };
                xmlhttp.open("GET", "/studname/" + $value, true);
                xmlhttp.send();
            }
            //choosenInstructors = $value;
            //console.log(choosenInstructors);
        });
        </script>

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

        function berurusan()
        {
            if(document.getElementById('pilihanBerurusan').value == '1')
            {
                document.getElementById('select1').style = 'display : block';
                document.getElementById('select2').style = 'display : none';
            } else if(document.getElementById('pilihanBerurusan').value == '2')
            {
                document.getElementById('select1').style = 'display : none';
                document.getElementById('select2').style = 'display : block';
            } else {
                document.getElementById('select1').style = 'display : none';
                document.getElementById('select2').style = 'display : none';
            }
        }
       </script>
    </div>
@stop