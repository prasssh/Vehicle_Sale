// menu
let menu = document.querySelector('.navbar');
document.querySelector('#menu-icon').onclick = () =>
{
   menu.classList.toggle('active');
   search.classList.remove('active');
}
//registration form validation
const form = document.getElementById("register-form");
form.addEventListener("submit", function (event) {
   
    // validation using regular expressions
    const namePattern = /^[A-Za-z\s]+$/;
    const addressPattern = /^[A-Za-z\s]+$/;
    const phonePattern = /^\d{10}$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const usernamePattern = /^[A-Za-z0-9]+$/;
    const passwordPattern = /^.{6,}$/;

    // getting input values
    const nameInput = document.getElementById("name");
    const addressInput = document.getElementById("address");
    const phoneInput = document.getElementById("phoneNumber");
    const emailInput = document.getElementById("email");
    const usernameInput = document.getElementById("username");
    const passwordInput = document.getElementById("password");

    if (!namePattern.test(nameInput.value)) {
        alert("Enter a valid name.");
        event.preventDefault();
    }
    if (!addressPattern.test(addressInput.value)) {
        alert("Enter a valid address.");
        event.preventDefault();
    }
    if (!phonePattern.test(phoneInput.value)) {
        alert("Enter a valid phone number [10 digits].");
        event.preventDefault();
    }
    if (!emailPattern.test(emailInput.value)) {
        alert("Enter a valid email address.");
        event.preventDefault();
    }
    if (!usernamePattern.test(usernameInput.value)) {
        alert("Enter a valid username (alphanumeric only).");
        event.preventDefault();
    }
    if (!passwordPattern.test(passwordInput.value)) {
        alert("Enter password at least 6 characters");
        event.preventDefault();
    }
    else{
        alert("Registration Successful!");
    }
});


    document.addEventListener('DOMContentLoaded', function () {
        const searchForm = document.querySelector('form');
        const carItems = document.querySelectorAll('.car-item');

        searchForm.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission

            const model = document.querySelector('input[name="model"]').value.toLowerCase();
            const location = document.querySelector('input[name="location"]').value.toLowerCase();

            // Loop through car items and toggle 'show' class based on search criteria
            carItems.forEach(function (carItem) {
                const carModel = carItem.querySelector('h2').textContent.toLowerCase();
                const carLocation = carItem.querySelector('h4:last-of-type').textContent.toLowerCase();

                if (carModel.includes(model) && carLocation.includes(location)) {
                    carItem.classList.add('show');
                } else {
                    carItem.classList.remove('show');
                }
            });
        });
    });






