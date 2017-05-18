/*
 * Author: Jonnathon McCoy
 * Filename: mccoy-dating-custom.js
 * Description: Validation functions for My Dating Website
 */

/**
 * Validates First Name to not be empty or contains numbers
 *
 * @returns {Boolean} If firstName is empty or contains numbers, return false.
 * Otherwise return true.
 */
function validateFirstName()
{
  //retrieve elements
  var errorElement = document.getElementById('firstNameErr');
  var firstName = document.getElementById('firstName').value;
  var firstNameErr = "";
  
  if(!isNaN(firstName) || firstName == "")
  {
    //Change error, change font color, and modify innerHTML
    firstNameErr = "&nbsp &nbsp * Invalid";
    errorElement.innerHTML = firstNameErr;
    errorElement.style.color = "red";
    return false;
  }
  
  //Change error, change font color, and modify innerHTML
  firstNameErr = "&nbsp &nbsp * Success!";
  errorElement.innerHTML = firstNameErr;
  errorElement.style.color = "green";
  return true;
} //validateFirstName()

/**
 * Validates that the last name is not empty or contains numbers
 *
 * @returns {Boolean} If lastName is empty or contains number, return false
 * Otherwise return true.
 */
function validateLastName()
{
  //retrieve elements
  var errorElement = document.getElementById('lastNameErr');
  var lastName = document.getElementById('lastName').value;
  var lastNameErr = "";
  
  if(!isNaN(lastName) || lastName == "")
  {
    //Change error, change font color, and modify innerHTML
    lastNameErr = "&nbsp &nbsp * Invalid";
    errorElement.innerHTML = lastNameErr;
    errorElement.style.color = "red";
    return false;
  }
  
  //Change error, change font color, and modify innerHTML
  lastNameErr = "&nbsp &nbsp * Success!";
  errorElement.innerHTML = lastNameErr;
  errorElement.style.color = "green";
  return true;
} //validateLastName()
  
/**
 * Validates that age is a positive number greater than 18 but less than
 * 124.
 *
 * return {Boolean} If age is not positive number greater than 18 and less
 * than 124, return false. Otherwise, return true.
 */
function validateAge()
{
  //retrieve elements
  var errorElement = document.getElementById('ageErr');
  var age = document.getElementById('age').value;
  var ageErr = "";
  
  if(isNaN(age) || age <= 0 || age < 18 || age > 124)
  {
    //Change error, change font color, and modify innerHTML
    ageErr = "&nbsp &nbsp * Age must be a positive number greater than 18 and less than 125";
    errorElement.innerHTML = ageErr;
    errorElement.style.color = "red";
    return false;
  }
  
  //modify innerHTML
  errorElement.innerHTML = ageErr;
  
  return true;
} //validateAge()

/**
 * Validates that a phone number is either empty or does not contain any
 * alphabetical characters and is a 10 digit phone number.
 *
 * @returns {Boolean} If phone is Not a Number or is not 10 digits in
 * in length, return false. Otherwise, return true.
 */
function validatePhone()
{
  //retrieve elements
  var errorElement = document.getElementById('phoneNumberErr');
  var phone = document.getElementById('phoneNumber').value;
  var phoneErr = "";
  
  if (phone != "" && isNaN(phone))
  {
    //modify font color
    errorElement.style.color = "red";
    return false;
  }
  else if (phone != "" && phone.length != 10)
  {
    //Change error, change font color, and modify innerHTML
    phoneErr = "&nbsp &nbsp * Please enter a 10 digit phone number or leave blank";
    errorElement.innerHTML = phoneErr;
    errorElement.style.color = "red";
    return false;
  }
  
  //Change error, change font color, and modify innerHTML
  phoneErr = "&nbsp; &nbsp; * Only numbers or leave blank";
  errorElement.innerHTML = phoneErr;
  errorElement.style.color = "black";
  
  return true;
} //validatePhone()

/*
 * Validates that seeking cannot be empty.
 *
 * @returns {Boolean} If seeking is empty, return false, else return true.
 */
function validateSeeking()
{
  //retrieve elements
  var errorElement = document.getElementById('seekingErr');
  var seeking = document.getElementById('seeking').value;
  var seekingErr = "";
  
  if(seeking == "")
  {
    //Change error and modify innerHTML
    seekingErr = "&nbsp; &nbsp; * Please choose your preference";
    errorElement.innerHTML = seekingErr;
  }
  
  //modify innerHTML
  errorElement.innerHTML = seekingErr;
  
  return true;
} //validateSeeking()