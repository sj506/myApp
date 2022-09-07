@extends('myApp.index')

@section('content')

<div class="table-responsive">
<table class="table align-items-center table-flush" id="export-dt">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
</div>

<script>
        $("#export-dt").DataTable({
            ajax: {url: "data.json" , dataSrc: '' },
            columns : [
                {data: "id"},
                {data: "name"},
                {data: "location"},
            ]
        });
</script>

@endsection
