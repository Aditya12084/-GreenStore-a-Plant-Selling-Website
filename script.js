function show() {
  document.getElementById("hambunav").classList.toggle("active");
  document.getElementById("hambu").classList.toggle("open");
}

function search() {
  let filter = document.getElementById("find").value.toUpperCase();

  let item = document.querySelectorAll(".prod");

  let l = document.getElementsByTagName("h3");

  for (var i = 0; i <= l.length; i++) {
    let a = item[i].getElementsByTagName("h3")[0];

    let value = a.innerHTML || a.innerText || a.textContent;

    if (item[i].style.display != "none") {
      if (value.toUpperCase().indexOf(filter) > -1) {
        item[i].style.display = "";
      } else {
        item[i].style.display = "none";
      }
    }
  }
}

function tt(name) {
  var ck = name;

  let z = Array.from(document.querySelectorAll(".cat"));

  for (let index = 0; index < z.length; index++) {
    if (index == ck) {
      z[index].style.backgroundColor = "green";
      z[index].style.color = "white";
    } else {
      z[index].style.backgroundColor = "";
      z[index].style.color = "black";
    }
  }

  let item = Array.from(document.querySelectorAll(".prod"));
  let ca1 = Array.from(document.querySelectorAll(".Indoor"));
  let ca2 = Array.from(document.querySelectorAll(".Outdoor"));
  let ca3 = Array.from(document.querySelectorAll(".Office"));

  let arr = [item, ca1, ca2, ca3];

  for (let index = 0; index < arr.length; index++) {
    for (let i = 0; i < arr[index].length; i++) {
      if (ck == 0) {
        arr[index][i].style.display = "block";
      } else {
        if (index != ck) {
          arr[index][i].style.display = "none";
        } else {
          arr[index][i].style.display = "block";
        }
      }
    }
  }
}

function showit(preference) {
  let loginformval = document.querySelector(".Logincenter");

  let registerformval = document.querySelector(".registercenter");

  let fpassw = document.querySelector(".forgot_pwd_center");

  if (preference == 0) {
    registerformval.style.display = "block";
    loginformval.style.display = "none";
    fpassw.style.display = "none";
  } else if (preference == 1) {
    registerformval.style.display = "none";
    loginformval.style.display = "block";
    fpassw.style.display = "none";
  } else {
    registerformval.style.display = "none";
    loginformval.style.display = "none";
    fpassw.style.display = "block";
  }
}

function opencart() {
  let previewContainer = document.querySelector(".products-preview");
  console.log(previewContainer);

  if (previewContainer.style.display == "flex") {
    previewContainer.style.display = "none";
  } else {
    previewContainer.style.display = "flex";
  }
  document.getElementById("hambcart").classList.toggle("cartactive");
}

function validateLogin() {
  let username = document.getElementById("fielduser").value;
  let password = document.getElementById("fieldpass").value;

  let regcheck = /^[A-za-z0-9]{8,20}$/;

  let passcheck = /^[a-zA-z0-9]{5,15}$/;

  if (regcheck.test(username) && passcheck.test(password)) {
    return true;
  } else {
    alert("Invalid Input!!");
    return false;
  }
}

function validateRegister() {
  let usname = document.getElementById("reguser").value;
  let phno = document.getElementById("regphno").value;
  let email = document.getElementById("regemail").value;
  let passw = document.getElementById("regpassw").value;
  let confpassw = document.getElementById("regconfpassw").value;

  let reguser = /^[a-z0-9A-Z]{8,20}$/;
  let regphno = /^[7-9][0-9]{9}$/;
  let regemail = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
  let regpass = /^[a-zA-Z0-9]{5,15}$/;

  if (
    reguser.test(usname) &&
    regphno.test(phno) &&
    regemail.test(email) &&
    regpass.test(confpassw) &&
    passw == confpassw
  ) {
    return true;
  } else {
    if (!reguser.test(usname)) {
      document.getElementById("usernameerr").innerHTML = "Invalid Username";
    }
    if (!regphno.test(phno)) {
      document.getElementById("phnoerr").innerHTML = "Invalid Phonenumber";
    }
    if (!regemail.test(email)) {
      document.getElementById("emailerr").innerHTML = "Invalid Email";
    }
    if (!regpass.test(passw)) {
      document.getElementById("passwderr").innerHTML = "Invalid Password";
    }
    if (!passw == confpassw) {
      document.getElementById("passwderr").innerHTML =
        "Password not matched with the confirmed password!";
    }
    return false;
  }
}

function validatecont() {
  let uname = document.getElementById("conname").value;
  let uemail = document.getElementById("conemail").value;
  let umessage = document.getElementById("conmessage").value;

  let reguname = /^[a-zA-Z\s]{5,50}$/;
  let reguemail = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
  let regmessage = /^[a-zA-Z0-9\s]{5}$/;

  if (
    reguname.test(uname) &&
    reguemail.test(uemail) &&
    regmessage.test(regmessage)
  ) {
    return true;
  } else {
    if (!reguname.test(uname)) {
      alert("Invalid Name!");
    }
    if (!reguemail.test(uemail)) {
      alert("Invalid Email");
    }
  }
}

function jushowit() {
  alert("Username already exists, Please choose another.");
}

function validatechpasswd() {
  let passwd = document.getElementById("chpwd_pwd").value;
  let cnfpwd = document.getElementById("chpwd_cnfpwd").value;

  let regpasswd = /^[A-Z0-9a-z]{8,15}$/;

  if (regpasswd.test(passwd) && passwd == cnfpwd) {
    return true;
  } else {
    alert("Invalid Password");
    return false;
  }
}

function validateRePaswword() {
  let chuser = document.getElementById("ch_fielduser").value;
  let chpw = document.getElementById("ch_fieldpass").value;
  let chcnf_fieldpass = document.getElementById("chcnf_fieldpass").value;

  let regus = /^[a-z0-9A-Z]{8,20}$/;
  let regpw = /^[a-zA-Z0-9]{5,15}$/;

  if (regus.test(chuser) && chpw == chcnf_fieldpass) {
    return true;
  } else {
    if (!regus.test(chuser)) {
      alert("Invalid Username!");
    }
    if (!chpw == chcnf_fieldpass) {
      alert("Inavlid Password");
    }
    return false;
  }
}

function preventit() {
  return false;
}

function checkcheckout() {
  let checkfirstname = document.getElementById("checkfirstname").value;
  let checkLastname = document.getElementById("checkLastname").value;
  let checkstreetaddress = document.getElementById("checkstreetaddress").value;
  let checklandmark = document.getElementById("checklandmark").value;
  let checktowncity = document.getElementById("checktowncity").value;
  let checkstate = document.getElementById("checkstate").value;
  let checkpincode = document.getElementById("checkpincode").value;
  let checkphone = document.getElementById("checkphone").value;
  let checkemail = document.getElementById("checkemail").value;
  let ckbox = document.getElementById("ck_box");

  let regname = /^[A-Za-z\s]+$/;

  let streetadd = /^[A-Z0-9a-z\s]+$/;

  let landmark = /^[A-Za-z\s]+$/;

  let regpincode = /^[0-9]{6,10}$/;

  let phno = /^[7-9][0-9]{9}$/;

  let regemail = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;

  if (
    regname.test(checkLastname) &&
    regname.test(checkfirstname) &&
    streetadd.test(checkstreetaddress) &&
    landmark.test(checklandmark) &&
    regname.test(checktowncity) &&
    regname.test(checkstate) &&
    regpincode.test(checkpincode) &&
    phno.test(checkphone) &&
    regemail.test(checkemail) &&
    ckbox.checked
  ) {
    return true;
  } else {
    // alert("Something went wrong!!!");
    return true;
  }
}

function givealertmsg(gotit) {
  alert(gotit);
}
