@extends('myApp.index')


<style>
  table {
    width: 0% !important;
  }
  input, th {
    text-align: center !important;
  }
  input , td {
    width: 4rem;
  }
</style>
@section('content')
    <div class="ms-4">
        <h1>board</h1>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="toggleClick()" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch</label>
        </div>
    <form action="{{ route('savetable') }}" method="post">
      @csrf
<div class="d-flex align-items-start">
    <table class="table">
    <thead class="thead">
      <tr id='tr'>
        <th scope="col">Num</th>
      @foreach ($columns as $item)
        <th scope="col">{{ $item->column }}</th>
      @endforEach
      </tr>
    </thead>
    <tbody id="tbody">
      @foreach ($rows as $item)
      <tr>
        <th scope="row"><input class="data" type="text" value="{{ $item->row }}"></th>
      @foreach ($columns as $item)
        <td><input class="data" type="text" value="0"></td>
      @endforEach
        <td class="data d-none">@</td>
      </tr>
      @endforEach
      </tr>
      {{-- <tr>
        <th scope="row"><input class="data" type="text" value="b"></th>
        <td><input class="data" type="text" value="0"></td>
        <td><input class="data" type="text" value="0"></td>
        <td><input class="data" type="text" value="0"></td>
        <td class="data d-none">@</td>
      </tr>
      <tr>
        <th scope="row"><input class="data" type="text" value="c"></th>
        <td><input class="data" type="text" value="0"></td>
        <td><input class="data" type="text" value="0"></td>
        <td><input class="data" type="text" value="0"></td>
        <td class="data d-none">@</td>
      </tr> --}}
    </tbody>
  </table>
      {{-- <button type="button" class="btn btn-outline-secondary " onclick="addColumn()"><i class="fa-solid fa-plus"></i></button>
      <button type="button" class="btn btn-outline-secondary d-none" onclick="">저장</button> --}}
</div>
    <button type="button" class="btn btn-outline-secondary h-30" onclick="addRow()"><i class="fa-solid fa-plus"></i></button>
    <div>
        <button onclick="change()" type="button" class="btn btn-success ms-3 mt-5">변환</button>
        <button class="btn btn-outline-secondary ms-3 mt-5">저장</button>
    </div>
    </form>
<div class="mb-5">
    <textarea class="ms-3 mt-5" id="textarea" cols="80" rows="10"></textarea>
</div>
@endsection


<script>

    function addColumn() {
      const thead = document.querySelector('#tr');
      const newColumn = document.createElement('th');
      thead.appendChild(newColumn);
      newColumn.innerHTML = `
        <input class="data" type="text">
      `;
    }

    function addRow() {
      const tbody = document.querySelector('#tbody');
      const newRow = document.createElement('tr');
      tbody.appendChild(newRow);
      newRow.innerHTML = `
      <th scope="row"><input class="newData" type="text" value="" name='newData[]'></th>
    @foreach ($columns as $item)
      <td><input class="data" type="text" value="0"></td>
    @endforEach
      <td class="data d-none">@</td>
      <button class="btn btn-outline-secondary">-</button>
      `;
    }

    function toggleClick() {
        $('.thead').toggleClass('d-none')
    }

    function change() {
      const data = document.querySelectorAll('.data');
      let str = '';
      data.forEach(ele => {
        console.log(ele.value);
            if(ele.innerText === '@') {
                ele.innerText = ''
                str += '\n';
            }
            else {
            str += ele.value +  '/'  ;
            } 
      });

        $('#textarea').text(str) 

    }
</script>