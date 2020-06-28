function checkSubmit(){
    var name = document.getElementById("fullName").value;
    var number = document.getElementById("phoneNumber").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var retypedPassword = document.getElementById("retypedPassword").value;
    var caseId = document.getElementById("caseId").value;
    var dob = document.getElementById("dateOfBirth").value;
    var doa = document.getElementById("dateOfAppointment").value;
    var theForm = document.getElementById("bookAppointment");

    if(name != "" && number != "" && email != "" && password != "" && retypedPassword != "" && caseId != "" && dob != "" && doa != ""){
        if(password == retypedPassword){
            theForm.submit();
        }else{
            alert("Please Make Sure That The Entered Passwords Are Thesame");
        }
    }else{
        alert("Please completely fill the form before submitting");
    }
    
}

function checkLogin(){
    var email = document.getElementById("loginEmail").value;
    var password = document.getElementById("loginPassword").value;
    var form = document.getElementById("loginForm");

    if(email != "" && password != ""){
        form.submit();
    }else{
        alert("Make sure both input fields are filled before submitting the form");
    }


}