function validateForm() {
  var x = document.forms["myForm"]["username"].value;
  if (x == "") {
    alert("Enter Username");
    return false;
  }

  var y = document.forms["myForm"]["password"].value;
  if (y == "") {
    alert("Enter Password");
    return false;
  }

}

// class form 

function validateform() {
 var clas = document.forms["myform"]["c_class"].value;
  if (clas == "") {
    alert("Enter Username");
    return false;
  }

  var sub = document.forms["myform"]["c_subject"].value;
  if (sub == "") {
    alert("Enter Password");
    return false;
  }
}

// Student registration form

function validregform() {
  var s_name = document.forms["myform"]["s_name"].value;
  var s_fname = document.forms["myform"]["s_fname"].value;
  var s_registration = document.forms["myform"]["s_registration"].value;
  var s_email = document.myform.s_email.value;
  var s_phone = document.forms["myform"]["s_phone"].value;
  var firstpassword = document.myform.s_password.value;
  var secondpassword = document.myform.s_cpassword.value;
  var s_username = document.myform.s_username.value;
  var s_rollno = document.forms["myform"]["s_rollno"].value;
  var s_date = document.myform.s_dob.value;
  var s_class = document.myform.s_class.value;
  var s_batch = document.myform.s_batch.value;
  var s_section = document.myform.s_section.value;
  var s_image = document.myform.s_image.value;
  var s_gender = document.myform.s_gender.value;
  if (s_name == "") {
   alertify.error('Enter Name');
    return false;
  } else if (s_fname == "") {
     alertify.error("Enter Father's Name");
    return false;
  } else if (
    isNaN(s_registration) ||
    s_registration < 1 ||
    s_registration > 10000000000
  ) {
     alertify.error('Enter numeric in Registartion no.');
    return false;
  }else if (s_registration.length < 10) {
    alertify.error('Registration no. must be 10 digit');
    return false;
  }
   else if (s_email == "" || s_email == null) {
    alertify.error('Enter Email');
    return false;
  } else if (isNaN(s_phone) || s_phone < 1 || s_phone > 10000000000) {
    alertify.error('Enter 10 digit Number');
    return false;
  } else if ((firstpassword == "", secondpassword == "")) {
    alertify.error('Password must be entered');
    return false;
  } else if (firstpassword != secondpassword) {
    alertify.error('Password must be same');
    return false;
  } else if (firstpassword.length < 6) {
    alertify.error('Password must be 6 digit');
    return false;
  }else if (s_username == null || s_username == "") {
    alertify.error('Username is empty');
    return false;
  }
  else if (s_rollno == null || s_rollno == "") {
    alertify.error('Roll_no is empty');
    return false;
  }
  //  else if ((s_rollno) || s_rollno < 1 || s_rollno > 1000000) {
  //   alertify.error('Enter roll number');
  //   return false;
  // }else if (s_rollno.length < 10) {
  //   alertify.error('Roll no. must be 10 digit');
  //   return false; 
  // }
  else if (s_date == "" || s_date == null) {
    alertify.error('Select Date');
    return false;
  } else if (s_date != "" || s_date != null) {
    let selectedYear = (s_date = s_date.substring(0, 4));
    let CurrentYear = new Date().getFullYear();
    let result = parseInt(CurrentYear) - parseInt(selectedYear);
    if (result < 5) {
      alertify.error('Age is not defined');
      return false;
    }
  } 
  var g=document.myform.s_class.value;  
if (g==null || g==""){  
 alertify.error('Class must be defined'); 
  return false;
}

  var h=document.myform.s_batch.value;  
if (h==null || h==""){  
  alertify.error('Batch must be selected');  
  return false;
}

   var i=document.myform.s_section.value;  
if (i==null || i==""){  
  alertify.error('Select Section');
  return false;
}

  var f=document.myform.s_image.value;  
if (f==null || f==""){  
  alertify.error('Select Image'); 
  return false;
}

 var g=document.myform.s_gender.value;  
if (g==null || g==""){  
  alertify.error('Select Gender');
  return false;
}
  // else if (s_class == null || s_class == "") {
  //   alert("Class must be defined");
  //   return false;
  // } else if (s_batch == null || s_batch == "") {
  //   alert("Batch must be selected");
  //   return false;
  // } else if (s_section == null || s_section == "") {
  //   alert("Select Section");
  //   return false;
  // } else if (s_image == null || s_image == "") {
  //   alert("Select Image");
  //   return false;
  // } else if (s_gender == null || s_gender == "") {
  //   alert("Select Gender");
  //   return false;
  // } 
  // else {
  //   alert("ok");
  // }
}


// teacher registration
function validregteacherform() {
var t_name = document.forms["myform"]["t_name"].value;
var t_fname = document.forms["myform"]["t_fname"].value;
var s_date = document.forms["myform"]["t_dob"].value;
var t_email = document.forms["myform"]["t_email"].value;
var t_phone = document.forms["myform"]["t_phone"].value;
var t_qualification = document.forms["myform"]["t_qualification"].value;
var t_jdate = document.forms["myform"]["t_jdate"].value;
var t_username = document.forms["myform"]["t_username"].value;
var t_password = document.forms["myform"]["t_password"].value;
var t_cpassword = document.forms["myform"]["t_cpassword"].value;
var t_image = document.forms["myform"]["t_image"].value;
var t_gender = document.forms["myform"]["t_gender"].value;

if (t_name == "") {
alertify.error("Enter your Name");
return false;
}

else if (t_fname == "") {
alertify.error("Enter Father's Name");
return false;
}
else if (t_email == "" || t_email == null) {
alertify.error("Enter Email");
return false;
}
else if (isNaN(t_phone) || t_phone < 1 ||t_phone.length !=10 || t_phone > 10000000000) {
alertify.error("Enter 10 digit number");
return false;
}
else if (t_qualification == "" || t_qualification == null) {
alertify.error("Enter Qualification");
return false;
}
else if (t_jdate == "" || t_jdate == null) {
alertify.error("Enter Joining date");
return false;
}
else if (t_username == "" || t_username == null) {
alertify.error("Enter Username");
return false;
}
else if ((t_password == "", t_cpassword == "")) {
alertify.error("Password must be entered.");
return false;
} else if (t_password != t_cpassword) {
alertify.error("password must be same!");
return false;
}

else if (t_password.length < 6) {
alertify.error("password must be 6 digit");
return false;
} 
else if (t_image == "" || t_image == null) {
alertify.error("Image must be uploaded");
return false;
}
else if (t_gender == "" || t_gender == null) {
alertify.error("Gender must be selected");
return false;
}
else if (s_date == "" || s_date == null) {
alertify.error("select Date");
return false;
} else if (s_date != "" || s_date != null) {
let selectedYear = (s_date = s_date.substring(0, 4));
let CurrentYear = new Date().getFullYear();
let result = parseInt(CurrentYear) - parseInt(selectedYear);
if (result < 5) {
alertify.error("low age");
return false;
}
}

}


// teacher update
function validupdateregteacherform() {
var t_name = document.forms["myform"]["t_name"].value;
var t_fname = document.forms["myform"]["t_fname"].value;
var s_date = document.myform.t_dob.value;
var t_email = document.forms["myform"]["t_email"].value;
var t_phone = document.forms["myform"]["t_phone"].value;
var t_qualification = document.forms["myform"]["t_qualification"].value;
var t_jdate = document.forms["myform"]["t_jdate"].value;
var t_username = document.forms["myform"]["t_username"].value;
var t_image = document.forms["myform"]["t_image"].value;
var t_gender = document.forms["myform"]["t_gender"].value;

if (t_name == "") {
alertify.error("Enter your Name");
return false;
}

else if (t_fname == "") {
alertify.error("Enter Father's Name");
return false;
}
else if (t_email == "" || t_email == null) {
alertify.error("Enter Email");
return false;
}
else if (isNaN(t_phone) || t_phone < 1 ||t_phone.length !=10 || t_phone > 10000000000) {
alertify.error("Enter 10 digit number");
return false;
}
else if (t_qualification == "" || t_qualification == null) {
alertify.error("Enter Qualification");
return false;
}
else if (t_jdate == "" || t_jdate == null) {
alertify.error("Enter Joining date");
return false;
}
else if (t_username == "" || t_username == null) {
alertify.error("Enter Username");
return false;
}

else if (t_image == "" || t_image == null) {
alertify.error("Image must be uploaded");
return false;
}
else if (t_gender == "" || t_gender == null) {
alertify.error("Gender must be selected");
return false;
}
else if (s_date == "" || s_date == null) {
alertify.error("select Date");
return false;
} else if (s_date != "" || s_date != null) {
let selectedYear = (s_date = s_date.substring(0, 4));
let CurrentYear = new Date().getFullYear();
let result = parseInt(CurrentYear) - parseInt(selectedYear);
if (result < 5) {
alertify.error("low age");
return false;
}
}
}