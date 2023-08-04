
var violationSelect = document.getElementById("violation");
var amountInput = document.getElementById("amount");
var violationNameInput = document.getElementById("violation_name");

violationSelect.addEventListener("change", function () {
    // get selected violation name and fine amount
    var selectedOption = this.options[this.selectedIndex];
    var violationName = selectedOption.text;
    var violationFine = selectedOption.getAttribute("data-fine");

    // update amount input field
    amountInput.value = violationFine;

    // update violation name input field
    violationNameInput.value = violationName;
});
                


