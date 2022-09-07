@extends('myApp.index')

@section('content')

<div class="container">
    <div class="text-center">
        <h1>To do List</h1>
    </div>  
<ul class="list-group">
  <li class="list-group-item ">
    <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="firstCheckbox">
    <label class="form-check-label" for="firstCheckbox">오늘 할일 - 1</label>
  </li>
  <li class="list-group-item ">
    <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="secondCheckbox">
    <label class="form-check-label" for="secondCheckbox">오늘 할일 - 2</label>
  </li>
  <li class="list-group-item ">
    <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox">
    <label class="form-check-label" for="thirdCheckbox">오늘 할일 - 3</label>
  </li>
  <li class="list-group-item ">
    <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox">
    <label class="form-check-label" for="thirdCheckbox"><input type="text"></label>
  </li>
</ul>
    <button type="button" class="btn btn-outline-secondary h-30 mt-3" onclick="addList()"><i class="fa-solid fa-plus"></i></button>
</div>

<script>


    function addList() {
        const listGroup = document.querySelector(".list-group");
        const newList = document.createElement("li");
        newList.classList.add('list-group-item')
        listGroup.appendChild(newList);
        newList.innerHTML = `
        <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox">
        <label class="form-check-label" for="thirdCheckbox"><input type="text"></label>
        `;
    }

        const checkbox = document.querySelectorAll(".checkbox");
    checkbox.forEach(ele => {
        // console.log(ele.addEventListener);
       ele.addEventListener("change", function (e) {
         e.target.value = Math.abs(e.target.value - 1)
         if (e.target.value == 1) {
            e.target.parentNode.classList = 'list-group-item bg-dark text-dark bg-opacity-10 text-black-50'
         } else {
            e.target.parentNode.classList = 'list-group-item'
         }
       }); 
    });
</script>
@endsection
