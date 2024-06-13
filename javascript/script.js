var elements = document.getElementsByClassName("effect-type");
var textArray = [];
var speed = 50; //higher number is slower

// Store the original text content and then clear it
for (var j = 0; j < elements.length; j++) {
  textArray[j] = elements[j].textContent;
  elements[j].textContent = '';
}

function typeWriter() {
  var allDone = true;
  for (var j = 0; j < elements.length; j++) {
    if (elements[j].textContent.length < textArray[j].length) {
      elements[j].textContent += textArray[j].charAt(elements[j].textContent.length);
      allDone = false;
    }
  }
  if (!allDone) {
    setTimeout(typeWriter, speed);
  }
}

typeWriter();

//form validation

function validateForm() {
    const fields = [
        { id: 'email-firstname', name: 'First Name' },
        { id: 'email-lastname', name: 'Last Name' },
        { id: 'email-address', name: 'Email Address', type: 'email' },
        { id: 'email-subject', name: 'Subject' },
        { id: 'email-message', name: 'Message' }
    ];

    for (let field of fields) {
        let value = document.getElementById(field.id).value.trim();

        if (!value) {
            alert(`${field.name} is required.`);
            return false;
        }

        if (field.type === 'email') {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                alert(`Please enter a valid ${field.name}.`);
                return false;
            }
        }
    }

    return true;
}
$("#project-list").hide(0);
$("#project-list").fadeIn(500);

//burger menu code
document.addEventListener('DOMContentLoaded', function () {
    const burgerButton = document.getElementById('burger-button');
    const menuContent = document.getElementById('menu-content');

    burgerButton.addEventListener('click', function () {
        if (menuContent.classList.contains('menu-hidden')) {
            menuContent.classList.remove('menu-hidden');
            menuContent.classList.add('menu-visible');
        } else {
            menuContent.classList.remove('menu-visible');
            menuContent.classList.add('menu-hidden');
        }
    });
});