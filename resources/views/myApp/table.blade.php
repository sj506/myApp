@extends('myApp.index')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center text-center">
        <div></div>
        <h1 class="mb-4">My feed</h1>
        <input id="searchDate" name="date" class="h-50" type="date" onchange="test(event.target)" value={{ date("Y-m-d", time()) }}>
    </div>  
  <form action={{ route('insTodoList') }} method="post">
    @csrf
<ul class="list-group">
  @foreach ($data as $item)
  <li class="d-flex justify-content-between list-group-item ">
    <div>
      <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox" data-todoList="{{ $item->i_todo_list }}">
      <label class="form-check-label" for="thirdCheckbox">{{ $item->todo_list }}</label>
    </div>
    <div>
    <span class="text-muted me-4">{{ substr($item->created_at,0,10) }}</span>
    </div>
  </li>
  @endforeach
  <li class="list-group-item ">
    <input class="form-check-input me-1" type="checkbox" value="0" id="thirdCheckbox">
    <label class="form-check-label" for="thirdCheckbox"><input name="todo_list[]" type="text"></label>
  </li>
</ul>
    <div>
      <button type="button" class="btn btn-outline-secondary h-30 mt-3" onclick="addList()"><i class="fa-solid fa-plus"></i></button>
      <button type="submit" class="btn btn-outline-secondary h-30 mt-3">저장</button>
      <button type="button" class="btn btn-outline-secondary h-30 mt-3" id="delListBtn" onclick="delList()">삭제</button>
    </div>
  </form>
</div>

<script>


function test(e) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('Chtable') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    '_date' : e.value,
                },
                success: function(result) {
                  const ul = document.querySelector('.list-group')
                  ul.innerHTML = null;
                  result.data.forEach(item => {
                    // console.log(item);
                    const li = document.createElement('li');
                    li.classList = 'd-flex justify-content-between list-group-item'
                    li.innerHTML = `
                          <div>
                            <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox" data-todoList="${item.i_todo_list}">
                            <label class="form-check-label" for="thirdCheckbox">${item.todo_list}</label>
                          </div>
                          <div>
                          <span class="text-muted me-4">${item.created_at.substr(0,10)}</span>
                          </div>
                    `;
                  ul.appendChild(li)
                  });
                },
                error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            });
}
// const date = document.querySelector('#searchDate')

// date.addEventListener('change' , function (e) {
//               $.ajax({
//                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//                 url: "{{ route('table') }}",
//                 method: 'POST',
//                 dataType: 'json',
//                 data: {
//                     '_date' : e.target.value,
//                 },
//                 success: function(result) {
//                     console.log(result)
//                 },
//                 error:function(request,status,error){
//                     console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
//                 }
//             });
// })

  function delList() {
    const checkbox = document.querySelectorAll(".checkbox");
    checkbox.forEach(ele => {
        // console.log(ele.addEventListener);
         if (ele.value == 1) {
            // console.log(ele.dataset.todolist); 
                $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('delTodoList') }}",
                method: 'POST',
                dataType: 'json',
                data: {
                    'i_todo_list' : ele.dataset.todolist,
                },
                success: function(result) {
                    console.log(result)
                    if(result) {
                      ele.parentNode.parentNode.classList = 'd-none'
                    }
                },
                error:function(request,status,error){
                    console.log("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                    alert('리스트를 삭제할 수 없습니다.')
                }
            });
        }
       }); 
    };

    function addList() {
        const listGroup = document.querySelector(".list-group");
        const newList = document.createElement("li");
        newList.classList.add('list-group-item')
        listGroup.appendChild(newList);
        newList.innerHTML = `
        <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox">
        <label class="form-check-label" for="thirdCheckbox"><input name="todo_list[]" type="text"></label>
        `;
    }

    const checkbox = document.querySelectorAll(".checkbox");
    checkbox.forEach(ele => {
        // console.log(ele.addEventListener);
       ele.addEventListener("change", function (e) {
         e.target.value = Math.abs(e.target.value - 1)
         if (e.target.value == 1) {
            e.target.parentNode.parentNode.classList = 'd-flex justify-content-between list-group-item bg-dark text-dark bg-opacity-10 text-black-50'
         } else {
            e.target.parentNode.parentNode.classList = 'd-flex justify-content-between list-group-item'
         }
       }); 
    });
</script>
@endsection
