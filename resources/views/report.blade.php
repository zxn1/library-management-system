@extends('dashboard')
@section('content')
@inject('carbon', 'Carbon\Carbon')
<link rel='stylesheet' href="{{ asset('/css/bootstrap.min.css') }}">
<link rel='stylesheet' href="{{ asset('/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style-fab.css') }}">
<style>
  .dropdown {
    left : -170px;
  }
</style>

<!-- Modal -->
<div style="top : 23%;" class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('rptfilter') }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="purchaseLabel">Tapis Laporan</h4>
            </div>
            <div class="modal-body">
              <div style="margin-left : 5px; margin-bottom : 7px;">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="pinjam" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Pinjam</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="pulang" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Pulang</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="denda" value="option2">
                  <label class="form-check-label" for="inlineCheckbox2">Denda</label>
                </div>
                <span><br>(&#10003;) pada maklumat yang ingin didapatkan<br></span>
              </div>
              <div class="row" style="padding-top : 20px;">
                    <div class="col-lg-6">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                            <label for="terbit" style="margin-left : 10px;">Mula pada</label>
                            <input type="date" id="date" name="start_year" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group" style="border-style : solid; border-width : 1px; border-color : #cfcecc; border-radius : 5px;">
                        <label for="terbit" style="margin-left : 10px;">Akhir pada</label>
                        <input type="date" id="date" name="end_year" class="form-control">
                        </div>
                    </div>
                </div>

                <div style="margin-left : 5px; margin-bottom : 7px;margin-top : -35px;">
                <span><br>(&#10003;) pada jenis tapisan<br></span>
                  <table style="margin-left : 15px;" id="jenistarikh">
                    <td>
                        <td><input class="form-check-input" id="tapistarikh" name="tapistarikh" type="checkbox" value="1"/><label for="tapistarikh">Tarikh Pinjam</label></td>
                    </td>
                    <td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="form-check-input" name="tapistarikh" id="tapistarikh" type="checkbox" value="2"/><label for="tapistarikh">Tarikh Pulang</label></td>
                    </td>
                  </table>
                </div>

                <div style="margin-left : 70%;">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="forlimit" onclick="haveLimit()" value="op">
                    <label class="form-check-label" for="checlimit">Limit Rekod</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-control" type="number" min="0" max="9999" id="limit" name="limit" placeholder="150" disabled="true">
                  </div>
                </div>

            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-dark" type="button">Mencari
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                    <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                    <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
                </svg>
                </button>
            </div>
        </div>
      </form>
    </div>
</div>

<div class="btn-group-fab" role="group" aria-label="FAB Menu">
  <div>
    <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Menu"> <i class="fa fa-bars"></i> </button>
    <button type="button" class="btn btn-sub btn-info has-tooltip" onclick="printReport()" data-placement="left" title="print">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
      </svg>
    </button>
    <button type="button" class="btn btn-sub btn-danger has-tooltip" onclick="goFullScreen()" data-placement="left" title="Fullscreen">
      <i class="fa fa-arrows-alt"></i> 
    </button>
    <button type="button" class="btn btn-sub btn-warning has-tooltip" data-toggle="modal" data-target="#purchaseModal" data-placement="left" title="filter">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel-fill" viewBox="0 0 16 16">
        <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z"/>
      </svg>
    </button>
  </div>
</div>
<center>
<div id="dPDF">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pelajar </th>
      <th scope="col">Buku yang Dipinjam</th>
      <th scope="col">Tarikh Pinjam</th>
      <th scope="col">Tarikh Pulang</th>
      <th scope="col">Bayaran Denda</th>
      <th scope="col">Operasi Pada</th>
    </tr>
  </thead>
  <tbody>
    <?php $key = 1; ?>
    @foreach( $data as $val )
    <tr>
      <th scope="row">{{ $key++ }}</th>
      <td>{{ $val->student_name }}</td>
      <td>{{ $val->book_name }}</td>
      <td>{{ $val->date_borrow }}</td>
      <td>{{ $val->date_return }}</td>
      @if($val->penaltyCharge != null)
      <td>RM {{ number_format($val->penaltyCharge, 2, '.', ','); }}</td>
      @else
      <td></td>
      @endif
      <td>{{ $carbon::createFromFormat('Y-m-d H:i:s', $val->created_at, 'UTC')->setTimezone('Asia/Kuala_Lumpur') }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@if (session('norow'))
<span>{{ session('norow') }}</span>
@else
<a href="#" data-toggle="modal" data-target="#purchaseModal"><span style="color :blue; text-decoration: underline;">Lihat lagi rekod</span></a>
@endif
</center>
<script>
function goFullScreen()
{
  document.documentElement.requestFullscreen().catch((e) => {
      console.log(e);
  });
}

window.onload = function () {
        var tblFruits = document.getElementById("jenistarikh");
        var chks = tblFruits.getElementsByTagName("INPUT");
        for (var i = 0; i < chks.length; i++) {
            chks[i].onclick = function () {
                for (var i = 0; i < chks.length; i++) {
                    if (chks[i] != this && this.checked) {
                        chks[i].checked = false;
                    }
                }
            };
        }
    };

function printReport()
{
  var prtContent = document.getElementById("dPDF");
  var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
  WinPrint.document.write(prtContent.innerHTML);
  WinPrint.document.close();
  WinPrint.focus();
  WinPrint.print();
  WinPrint.close();
}

function haveLimit()
{
  //alert('test');
  if(document.getElementById('forlimit').checked == true)
  {
    document.querySelector('#limit').disabled = false;
  } else {
    document.querySelector('#limit').disabled = true;
  }
}

</script>
<script src="{{ asset('/js/bootstrap.js') }}"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/popper.min.js') }}"></script>
<script  src="{{ asset('/js/script-fab.js') }}"></script>
@stop