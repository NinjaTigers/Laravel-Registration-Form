// Get a reference to the modal element
const myModal = document.getElementById('myModal');

// The modal body is where the error description goes
const modalBody = document.getElementById("modal-body");

// Get the date input element
const dateInput = document.querySelector('input[name="birthdate"]');

// Bind the API function to the change event
dateInput.addEventListener("change", function () {
    const date = new Date(dateInput.value);
    const month = date.getMonth() + 1; // Adding 1 because month starts from 0
    const day = date.getDate();

    getActorsBornOnDate(month, day);
});

function showModal(modalErrors) {
    let modalBodyHTML = ``

    for (let modalError of modalErrors)
        modalBodyHTML += `<p style="color: red;">${modalError}</p>`
    modalBody.innerHTML = modalBodyHTML;

    // Showing the popup
    myModal.classList.add('show');
    myModal.style.display = 'block';
}

function closeModal() {
    myModal.classList.remove('show');
    myModal.style.display = 'none';
}

function closeActorModal() {
    const actorModal = document.getElementById('actor-modal');
    actorModal.classList.remove('show');
    actorModal.style.display = 'none';
}

function confirmRedirect() {
    let errorList = [];

    const requiredInputNames = ['name', 'username', 'birthdate', 'phone', 'address', 'email',
        'password', 'confirm-password', 'image'];

    // Checking whether the required fields are filled
    const requiredFieldErrors = checkRequiredFields(requiredInputNames);

    // Checking that the checkbox is selected
    if (!document.querySelector('input[name="declaration"]').checked) {
        errorList.push(`Checkbox must be checked`);
    }

    const passwordValue = document.querySelector('input[name="password"]').value,
        confirmValue = document.querySelector('input[name="confirm-password"]').value;

    // Checking the format of the password and whether the confirmation matches it
    const passwordErrors = checkPasswordFields(passwordValue, confirmValue)

    // Checking if the full name, email and date are in the appropriate format
    const otherFieldErrors = otherFieldsCheck();

    errorList = [...errorList, ...requiredFieldErrors, ...passwordErrors, ...otherFieldErrors];

    // If there are no errors, allow the form to submit
    if (errorList.length === 0)
        return true;
    else {
        // otherwise display popup and prevent submission
        showModal(errorList);
        return false;
    }
}

function checkRequiredFields(requiredInputNames) {
    let errors = [];
    for (let inputName of requiredInputNames) {
        // Getting each input element's value
        let inputElement = document.querySelector(`input[name="${inputName}"]`);
        let inputValue = inputElement.value;

        // If it is not filled:
        if (inputValue === "") {
            // Formatting the input name to be displayed in the popup (e.g. full-name -> Full Name)
            const fieldName = inputName.toLowerCase().split('-').map(function (word) {
                return word.charAt(0).toUpperCase() + word.slice(1);
            }).join(' ');

            // Error message to be displayed in the popup
            errors.push(`${fieldName} is required.`);
        }
    }
    return errors;
}

function checkPasswordFields(passwordValue, confirmValue) {
    let errors = [];
    // check password regex
    const passwordRegex = /.*?(?=.{8})(?=[^0-9]*[0-9])(?=\w*\W)/;
    if (passwordValue && !passwordRegex.test(passwordValue)) {
        errors.push("The password must be at least 8 characters with at least 1 number literal and 1 special character")
    }
    if (passwordValue && passwordValue !== confirmValue) {
        errors.push("Passwords must match");
    }
    return errors;
}

function otherFieldsCheck() {
    let errors = [];
    let fullNameValue = document.querySelector('input[name="name"]').value;

    // Checking the full name format against a regex
    const fullNamePattern = /^[a-zA-Z]+(?: [a-zA-Z]+)+$/;
    if (fullNameValue && !fullNamePattern.test(fullNameValue)) {
        errors.push("Invalid Full Name Format");
    }

    let phoneNumberValue = document.querySelector('input[name="phone"]').value;

    // Checking the full name format against a regex
    const phoneNumberPattern = /^01[0-9]{9}$/;
    console.log(phoneNumberValue, !phoneNumberPattern.test(phoneNumberValue));
    if (phoneNumberValue && !phoneNumberPattern.test(phoneNumberValue)) {
        errors.push("The phone number must be 11 digits long");
    }

    return errors;
}
