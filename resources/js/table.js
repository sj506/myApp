const checkbox = document.querySelectorAll(".checkbox");

checkbox.addeventlistener("change", console.log(1));

function addList() {
    const listGroup = document.querySelector(".list-group");
    const newList = document.createElement("li");
    listGroup.appendChild(newList);
    newList.innerHTML = `
    <input class="form-check-input me-1 checkbox" type="checkbox" value="0" id="thirdCheckbox">
    <label class="form-check-label" for="thirdCheckbox"><input type="text"></label>
      `;
}
