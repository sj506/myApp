@extends('myApp.index')


@section('content')
    <div class="ms-4">
        <h1>board</h1>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="toggleClick()" checked>
            <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch</label>
        </div>
<div>
  <table class="table">
  <thead class="thead">
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
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td class="data d-none">@</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td class="data d-none">@</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td><input class="data" type="text"></td>
      <td class="data d-none">@</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<div>
    <button onclick="change()" type="button" class="btn btn-success ms-3 mt-5">변환</button>
</div>
<div>
    <textarea class="ms-3 mt-5" id="textarea" cols="80" rows="10"></textarea>
</div>
                {{-- <input type="checkbox" class="checkUpdate" @if($item->status == 0) checked @endif onclick="toggleClick('{{ $item->idx }}')"> --}}
@endsection


<script>
    //     function toggleClick(idx) {
    //     $.ajax({
    //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //         url:'{{ route("toggleClick") }}',
    //         data:{
    //             'idx' : idx
    //         },
    //         method: 'POST',
    //         dataType: 'JSON',
    //         success: function (d) {
    //             if($('.text').text() == d) 
    //                 {
    //                     $('.text').text('0')
    //                 }
    //                 else {
    //                 $('.text').text(d)
    //                 }
    //         }
    //     })
    // }

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