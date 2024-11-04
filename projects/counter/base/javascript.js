let resetBtn = document.getElementById('reset');
// Increment Button
let increaseBtn = document.getElementById('increment');
// Decrement Button
let decreaseBtn = document.getElementById('decrement');
// Counter element
let counterEl = document.getElementById('current-number');

increaseBtn.addEventListener('click', () => {
    // Get Number in counter
    let count = counterEl.innerHTML;

    // Convert counter number to an integer and add 1
    count = Number(count)  + 1;

    // Display updated counter on the element
    counterEl.innerHTML = count;
});

decreaseBtn.addEventListener('click', () => {
    // Get number in counter 
    count = counterEl.innerHTML;

    // Convert counter number to an integer and subtract 1
    count = Number(count) - 1;

    // Display updated counter on the element
    counterEl.innerHTML = count;
});

resetBtn.addEventListener('click', () => {
    // Reset counter to 0
    counterEl.innerHTML = 0;
})
