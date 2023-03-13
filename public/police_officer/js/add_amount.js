
  // Get the violation dropdown and fine amount input field
  const violationDropdown = document.getElementById('violation');
  const fineInput = document.getElementById('fine');

  // Listen for changes to the violation dropdown
  violationDropdown.addEventListener('change', (event) => {
    // Get the selected option
    const selectedOption = event.target.options[event.target.selectedIndex];

    // Update the fine amount input field with the value of the selected option
    fineInput.value = selectedOption.value;
  });
