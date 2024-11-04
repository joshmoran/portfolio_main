# Calculator App

> A simple calculator created using ReactJS 

## Index 
1. Features
2. Error handling

## 1. Features
- Basic sums
  - Addition
  - Subtraction
  - Multiplication
  - Division
- 10 Number buttons - 0 to 9
- Other buttons 
  - Add 0 
  - Add 00
  - Delete last character (DC button)
  - Clear calculation (AC button)
  - Point - for floating point calculations
  - Calculate button (= button)
- Box output boxes
  - First: Last calculation to be calculated
  - Second: current input from the user

## 2. Error Handling 
- Delete last character button (DC button)
  - On empty, nothing is inserted and no errors are being thrown
  - Using a try, catch block to asses if the input can be sliced (string method) 
- Calculate sum button (= button )
  - After a sum has been calculated, input the sum total is inputted back into the input box 
  - Alert the user that the sum cannot be calculated
    - E.g. 2 dots in the sum etc
    - If the sum is not a number
  - When inputting any number 0 to 9, 0 or 00. A function evaluates if the output input is empty 
    - If it is, show the button selected
    - If is is not, add the button on to the end of the input