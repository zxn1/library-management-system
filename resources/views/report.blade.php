@extends('dashboard')
@section('content')
<center>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pelajar</th>
      <th scope="col">Buku yang Dipinjam</th>
      <th scope="col">Tarikh Pinjam</th>
      <th scope="col">Tarikh Pulang</th>
      <th scope="col">Bayaran Denda</th>
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
      <td>{{ $val->penaltyCharge }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</center>
@stop