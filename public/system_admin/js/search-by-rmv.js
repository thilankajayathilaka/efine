function changeInputType() {
    const select = document.getElementById("column");
    const inputContainer = document.getElementById("search-input-container");
    const selectedOption = select.options[select.selectedIndex].value;

    if (selectedOption === "created_at" || selectedOption === "latest_update_at") {
        inputContainer.innerHTML = '<input type="date" name="search" id="search">';
    } else if (selectedOption === "id") {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    } else if (selectedOption === "name" || selectedOption === "email") {
        inputContainer.innerHTML = '<input type="text" name="search" id="search">';
    } else {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    }
}