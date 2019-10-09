/**
*	Author: 		Hams H
*	Target: 		apply.html and jobs.html
*	Purpose: 		Assignment 2
*	Created:		[15-04-2019]
*	Last updat: 	[1-05-2019]
*	Credits: 		N/A
**/

"use strict";



function validate(){

	var errMsg = "";
	var result = true;
    var pcPattern;
	
	var postcode = document.getElementById("postcode").value;
	var state = document.getElementById("state").value;
	var otherskills = document.getElementById("otherskills").checked;





    var dobb = document.getElementById("dob").value;
    var datePattern = /^((0[1-9]|[12][0-9]|3[01])(\/)(0[13578]|1[02]))|((0[1-9]|[12][0-9])(\/)(02))|((0[1-9]|[12][0-9]|3[0])(\/)(0[469]|11))(\/)\d{4}$/;


    var dob = document.getElementById("dob").value.split("/");
    var date = new Date(dob[2], parseInt(dob[1]) - 1, dob[0]);
    var today = new Date();
    var age = today.getFullYear() - date.getFullYear();

    if(!dobb.match(datePattern)){
        errMsg += "Incorrect date\n";
        result = false;
    } 


    if (age >= 80 || age <= 15) { 
        errMsg += "Applicants must be between 15 and 80 years old\n";
        result = false;
    }


    if (otherskills && document.getElementById("comment").value.trim().length===0) {
        errMsg += "Please enter skills\n";
        result = false;
    }



 switch (state) {
    case "VIC":
        pcPattern = new RegExp(/(3|8)\d+/);
        break;

     case "NSW":
        pcPattern = new RegExp(/(1|2)\d+/);
        break;

     case "QLD":
        pcPattern = new RegExp(/(4|9)\d+/);
        break;

     case "NT":
        pcPattern = new RegExp(/0\d+/);
        break;

     case "WA":
        pcPattern = new RegExp(/6\d+/);
        break;

     case "SA":
        pcPattern = new RegExp(/5\d+/);
        break;

     case "TAS":
        pcPattern = new RegExp(/7\d+/);
        break;

     case "ACT":
        pcPattern = new RegExp(/0\d+/);
        break;
 }
 if(!postcode.match(pcPattern)){
   errMsg += "Postcode does not match your state\n";
   
   result = false;
 }


 if (errMsg != ""){
    document.getElementById("err").innerHTML = errMsg;
 }


if(result){
  storeDetails(postcode, state, otherskills, dobb);
}

return result;
}




function storeDetails(postcode, state, dobb){
  

  

  
    sessionStorage.postcode = postcode;
    sessionStorage.state = state;
    sessionStorage.dobb = dobb;  
    sessionStorage.fname = document.getElementById("fname").value; 
    sessionStorage.lname = document.getElementById("lname").value;
    sessionStorage.street = document.getElementById("street").value; 
    sessionStorage.email = document.getElementById("email").value; 
    sessionStorage.mobile = document.getElementById("mobile").value;  


}




function prefillForm(){
  if (sessionStorage.fname != undefined){


    document.getElementById("postcode").value = sessionStorage.postcode;
    document.getElementById("state").value = sessionStorage.state;
    document.getElementById("dob").value = sessionStorage.dob;

    document.getElementById("fname").value = sessionStorage.fname;
    document.getElementById("lname").value = sessionStorage.lname;
    document.getElementById("street").value = sessionStorage.street;
    document.getElementById("email").value = sessionStorage.email;
    document.getElementById("mobile").value = sessionStorage.mobile;


  }
}




function saveRefNo (jobRefNo){
    if(typeof(Storage)!=="undefined"){
        localStorage.setItem("refNo", jobRefNo);
    }
}


function getRefNo (){
    if(typeof(Storage)!=="undefined"){
        if (localStorage.getItem("refNo") !== null) {
            var refNo = document.getElementById("refNo");
            refNo.value = localStorage.getItem("refNo");
        }   
    }
}


function init(){


    if ( document.getElementById("applyForm")!=null ){
    getRefNo();
    prefillForm();
    document.getElementById("applyForm").onsubmit = validate;

    } 

    if (document.getElementById("jobspage")!=null) { 

        var applylinks=document.getElementsByClassName("applylink");  // array
        for (var i=0; i<applylinks.length; i++)
            applylinks[i].onclick = function () { saveRefNo(this.id); }

    }


}



window.onload = init;
