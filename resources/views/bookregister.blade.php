@extends('dashboard')
@section('content')
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <div style="border-style : solid; border-width : 1px; border-color :#428bca; margin : 30px; border-radius : 13px; background : radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);">
        <div style="height : 60px; width : 100%; background-color : #428bca;border-top-left-radius: 13px; border-top-right-radius: 13px;">
            <h5 style="font-family : Montserrat; color : white; position : relative; top : 12px; left : 20px;">Borang pendaftaran buku baru</h5>
        </div>

        <div class="row">
            <div class="col-lg-6">
            <div style="margin : 15px; padding-bottom : 15px; border-style : solid; border-width : 1px; border-color :darkgrey; border-radius : 13px;">
                <div style="margin : 10px;">
                    <p style="color :dimgray; font-size : 14px;">Kulit buku :</p>
                    <center>
                        <span id="genbarcode">
                            <img src="/src/img/no_cover.jpg" class="img-fluid" alt="Wild Landscape" />
                        </span>
                    </center>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div style="margin : 15px; padding-bottom : 15px; border-style : solid; border-width : 1px; border-color :darkgrey; border-radius : 13px;">
                <div style="margin : 10px;">
                    <p style="color :dimgray; font-size : 14px;">Kulit buku :</p>
                    <center>
                        <span id="genbarcode">
                            {!! DNS1D::getBarcodeSVG('4445645656', 'C39') !!}
                        </span>
                    </center>
                </div>
            </div>
            </div>
        </div>


        <form style="margin : 15px;">
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="perolehan">Nombor perolehan</label>
                <input type="text" class="form-control" id="perolehan" placeholder="Nombor perolehan">
                </div>
                <div class="form-group col-md-6">
                <label for="tajuk">Tajuk buku</label>
                <input type="text" class="form-control" id="tajukbuku" placeholder="Tajuk buku">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
                </div>
                <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
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