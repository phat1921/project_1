function check_admin(){
    

    if( document.getElementById("user").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
        // document.getElementById("erruser").innerHTML = 'điền đầy đủ vào!';
    }
    if( document.getElementById("pass").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
        // document.getElementById("errpass").innerHTML = 'điền đầy đủ vào!';
    }
}

function check_user(){
    

    if( document.getElementById("email").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
        // document.getElementById("erruser").innerHTML = 'điền đầy đủ vào!';
    }
    if( document.getElementById("pass").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
        // document.getElementById("errpass").innerHTML = 'điền đầy đủ vào!';
    }
}

function check_regis(){

    if( document.getElementById("name").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("sex").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("pass").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("repass").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("email").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("sdt").value == "" || document.getElementById("sdt").length > 10 || document.getElementById("sdt").length < 10 ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

    if( document.getElementById("address").value == "" ){
        alert("Vui lòng nhập đầy đủ thông tin!");
        return false;
    }

}


