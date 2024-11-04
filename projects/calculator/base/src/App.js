// Set favicon logo
import logo from './logo.svg';
// Import CSS File
import './App.css';
// Import Modules for functionality
import React, { useState, setValue } from 'react';

// Set previous calculation to null 
let currentCalc = '';

// Function for clearing the input (AC button) 
function clearInputs() {
  // Set previous calculation to null
  currentCalc = '';
  // Clear the output field
  document.getElementsByClassName('output')[0].value = '';
}

// Function to check if the input field is empty 
function checkEmpty( stringEl ) {
  // Convert to a string data type
  let toString = String( stringEl );

  // Check if the string is not empty, null or undefined
  if (  toString != '' || toString != null || toString != 'undefined') {
    // If not, try to remove the last character
    try { 
      // Remove the last character from the string and return the value
      return stringEl.slice(0, -1 ) ;
    } catch ( e ) {
      // On error, just return
      return;
    }
  } else {
    // If it is empty, null or undefined return the previous calculation
    return currentCalc;
  }
}

// Function to check if the input is empty or has something in it 
function checkValue ( currentVal, targetEl ) {
  // Check if the target element is empty or has something in it
  if ( targetEl == '' || targetEl == null ) {
    // If it is, check if the previous calculation is not 0 and greater than 0 
    if ( currentCalc == 0 && currentCalc > 0 ){ 
      // If it is, just return the current value being inputted
      return  currentVal;
    } else {
      // If it is not, return the previous calculation and the current value being inputted
      return currentCalc +currentVal;
    }
  } else { 
    // If it is not, return the target element and the current value being inputted
    return targetEl + currentVal;
  }
}

// Function to handle the = button 
function calculate ( sum ) {  
  // Save the sum into a variable 
  let oldSum =  sum ;  

  // Try and evaluate the return, break out if there is an error
  try {
    // Try to evaluate the sum and save the result back into the sum variable
    sum = eval(sum);
  } catch ( e ) {
    // IF not, show a alert to the user
    alert('Cannot re-enter the calculation, there was an error ');
    // Clear the output input 
    document.getElementsByClassName('output')[0].value = '';
    // Return and break out 
    return;
  }

  // Check if the calculation is a number
  if (  typeof sum !== 'number') {
    // If not, show a message to the user
    alert('Cannot re-enter the calculation, there was an error ');
    // Clear the previous calculation variable
    currentCalc = '';
    // Return and break out
    return;
  // Check if the sum is equal to 0 
  } else if ( eval(sum) === 0 ){
    // If it is, show 0 on the previous calculation 
    document.getElementsByClassName('oldOutput')[0].innerHTML = sum ;
    // Return '0' and break out 
    return '0';
  }

  // If everything goes through, save the sum in the previous calculation variable 
  currentCalc = eval(sum);
  // Update the previous calculation on the screen
  document.getElementsByClassName('oldOutput')[0].innerHTML = oldSum + ' = ' + sum;
  // Return the calculated variable
  return eval( sum ) ;
}

function App() {
  const [value, setValue ] = useState('');

  return (  
    <div className="App">
      <div className="calculator">
          <div className="display">
            <h1>Previous Calculation: <span className="oldOutput">N/A</span></h1>
            <input type="text" className="output" value={value}  />
          </div>
          <div className="buttons">
          <div className="flex row row1">
              <input type="button" value="AC" onClick={e => setValue( clearInputs )} />
              <input type="button" value="DE" onClick={ e => setValue( checkEmpty( value  ) ) } />
              <input type="button" value="." onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="/" onClick={e => setValue( checkValue ( e.target.value, value ) )} />    
            </div>
            <div className="flex row row2">
              <input type="button" value="7" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="8" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="9" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="*" onClick={e => setValue( checkValue ( e.target.value, value ))} />    
            </div>
            <div className="flex row row3">
              <input type="button" value="4" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="5" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="6" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="+" onClick={e => setValue( checkValue ( e.target.value, value ) )} />    
            </div>
            <div className="flex row row5">
              <input type="button" value="1" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="2" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="3" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="-" onClick={e => setValue( checkValue ( e.target.value, value ) )} />    
            </div>
            <div className="flex row row6">
              <input type="button" value="00" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="0" onClick={e => setValue( checkValue ( e.target.value, value ) )} />
              <input type="button" value="=" className="calculateBtn" onClick={e => setValue( calculate( value ) )} />
            </div>
          </div>
    </div>
    </div>
  );
}

export default App;
