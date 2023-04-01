//  Show OTP Form with heading
var formheading = document.getElementById("formhead");
var otpanim = document.getElementById("otpanimation");
var map = document.getElementById("gmap");
var otpdiv = document.getElementById("otpbox");
var signupform = document.getElementById("signup-form");
function showOTPdiv() {
    signupform.style.display = "none";
    otpanim.classList.remove("otpAnim");
    map.style.display = "none";
    otpdiv.style.display = "block";
    formheading.style.display = "none";
}

// #################################

const passwordInput = document.getElementById("password");
const numberCheck = document.getElementById("numberCheck");
const spCheck = document.getElementById("spCheck");
const numchar = document.getElementById("numchar");
const lowupchar = document.getElementById("lowupchar");
const eight = document.getElementById("eight");

//input or keyup

passwordInput.addEventListener("input", function () {
    if (/[\d_]/.test(this.value)) {
        numchar.classList.remove("invalid");
        numchar.classList.add("valid");
    } else {
        numchar.classList.add("invalid");
        numchar.classList.remove("valid");
    }
});

passwordInput.addEventListener("input", function () {
    if (/[\W_]/.test(this.value)) {
        spCheck.classList.remove("invalid");
        spCheck.classList.add("valid");
    } else {
        spCheck.classList.add("invalid");
        spCheck.classList.remove("valid");
    }
});

passwordInput.addEventListener("input", function () {
    if (/[a-z]/.test(this.value) && /[A-Z]/.test(this.value)) {
        lowupchar.classList.remove("invalid");
        lowupchar.classList.add("valid");
    } else {
        lowupchar.classList.remove("valid");
        lowupchar.classList.add("invalid");
    }
});
passwordInput.addEventListener("input", function () {
    if (this.value.length >= 8) {
        eight.classList.add("valid");
        eight.classList.remove("invalid");
    } else {
        eight.classList.remove("valid");
        eight.classList.add("invalid");
    }
});

/******
  JavaScript otp input focus form
*****/

const otpForm = document.getElementById("otp");

const inputs = otpForm.querySelectorAll("input");
inputs.forEach((input, index) => {
    input.addEventListener("input", (event) => {
        if (event.data !== null) {
            inputs[index + 1].focus();
        } else {
            inputs[index - 1].focus();
        }
    });
});

const noBtn = document.getElementById("showWarn");
const warningMsg = document.getElementById("warning");

function showWarn() {
    warningMsg.classList.remove("warnbox");
}

// otp validation

/*END*/
// javascript for showing hiddden signup form
function toggleDiv() {
    var div1 = document.getElementById("div1");
    var div2 = document.getElementById("div2");

    if (div1.style.display === "none") {
        div1.style.display = "block";
        div2.style.display = "none";
        warningMsg.classList.add("warnbox");
    } else {
        div1.style.display = "none";
        div2.style.display = "block";
    }
}

/* popups javascript Start */

$(document).ready(function () {
    // Function to show the modal and hide it after 3 seconds
    function showAlert() {
        $("#exampleModal").modal("show");
        setTimeout(function () {
            $("#exampleModal").modal("hide");
        }, 3000);
    }

    // Attach click event to the button
    $(".btn-no").click(function () {
        showAlert();
    });

    // yes button click hide div
    $("#yes").click(function () {
        // console.log('clicked');
        $("#ageContainer").fadeOut("slow");
    });
});
/* popups javascript End */
