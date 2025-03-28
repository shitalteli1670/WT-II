// Display message using alert box
alert('Exams are near, have you started preparing for?');

// Accept two numbers from user using prompt
let num1 = prompt('Enter first number:');
let num2 = prompt('Enter second number:');

// Show confirmation message to user using confirm box
let confirmMsg = `Are you sure you want to add ${num1} and ${num2}?`;
let confirmResult = confirm(confirmMsg);

// If user confirms, then perform addition and display the result
if (confirmResult) {
    num1 = parseInt(num1);
    num2 = parseInt(num2);
    let sum = num1 + num2;
    alert(`The sum of ${num1} and ${num2} is ${sum}.`);
}
