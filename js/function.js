const input = document.querySelector("#phone");
window.intlTelInput(input, {
  initialCountry: "us",
  utilsScript:
    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
var cleaveBlocks;
document.querySelector("#phone") &&
  (cleaveBlocks = new Cleave("#phone", {
    delimiters: ["(", ") ", "-"],
    blocks: [0, 3, 3, 4],
    numericOnly: true,
  }));
// document.querySelector("#cc_number") &&
//   (cleaveBlocks = new Cleave("#cc_number", {
//     creditCard: true,
//   }));
// document.querySelector("#cc_date") &&
//   (cleaveBlocks = new Cleave("#cc_date", {
//     date: true,
//     datePattern: ["m", "y"],
//     numericOnly: true,
//   }));

// document.querySelector("#cc_cvc") &&
//   (cleaveBlocks = new Cleave("#cc_cvc", {
//     blocks: [0, 4],
//     numericOnly: true,
//   }));

var cleaveNumber = new Cleave("#ccnumber", {
  creditCard: true,
  onValueChanged: function (e) {
    if (e.target.rawValue.length === 16) {
      // Assuming a 16-digit card number
      document.getElementById("ccexp").focus();
    }
  },
});

var cleaveDate = new Cleave("#ccexp", {
  date: true,
  datePattern: ["m", "y"],
  numericOnly: true,
  onValueChanged: function (e) {
    if (e.target.rawValue.length === 4) {
      // Assuming MM/YY format
      document.getElementById("cvv").focus();
    }
  },
});

var cleaveCVC = new Cleave("#cvv", {
  blocks: [3],
  numericOnly: true,
});

// Backspace functionality
document.getElementById("ccexp").addEventListener("keydown", function (e) {
  if (e.key === "Backspace" && e.target.value.length === 0) {
    document.getElementById("ccnumber").focus();
  }
});

document.getElementById("cvv").addEventListener("keydown", function (e) {
  if (e.key === "Backspace" && e.target.value.length === 0) {
    document.getElementById("ccexp").focus();
  }
});

// $(document).ready(function () {
//   $(".cc_form").validate({
//     rules: {
//       email: {
//         required: true,
//         email: true,
//       },
//       phone: {
//         required: true,
//       },
//       ccNumber: {
//         required: false,
//         // creditcard: true,
//       },
//       ccDate: {
//         required: false,
//         // minlength: 4,
//         // maxlength: 4,
//       },
//       ccCvc: {
//         required: false,
//         // minlength: 3,
//         // maxlength: 4,
//       },
//     },
//     messages: {
//       email: {
//         required: "Please enter your email address",
//         email: "Please enter a valid email address",
//       },
//       phone: {
//         required: "Please enter your phone number",
//       },
//       // ccNumber: {
//       //   required: "Please enter your card number",
//       //   creditcard: "Please enter a valid credit card number",
//       // },
//       // ccDate: {
//       //   required: "Please enter the card expiration date",
//       //   minlength: "Please enter a valid date (MM/YY)",
//       //   maxlength: "Please enter a valid date (MM/YY)",
//       // },
//       // ccCvc: {
//       //   required: "Please enter your CVC",
//       //   minlength: "CVC must be at least 3 digits",
//       //   maxlength: "CVC must be at most 4 digits",
//       // },
//     },
//     errorClass: "error-input",
//     // highlight: function (element, errorClass) {
//     //   $(element).addClass(errorClass);
//     //   if ($(element).closest(".card_area").length) {
//     //     $(element).closest(".card_area").addClass("border-red");
//     //   }
//     // },
//     // unhighlight: function (element, errorClass) {
//     //   $(element).removeClass(errorClass);
//     //   if (!$(element).closest(".card_area").find(".error-input").length) {
//     //     $(element).closest(".card_area").removeClass("border-red");
//     //   }
//     // },
//     submitHandler: function (form) {
//       event.preventDefault(); // Prevent the form from submitting and refreshing the page

//       // Log the form data to the console
//       console.log("Form Data:", $(form).serializeArray());

//       // Perform any additional actions, such as integrating with the NMI API

//       // Optionally, submit the form programmatically
//       // form.submit();
//     },
//   });
// });

// document.getElementById("cc_form").addEventListener("submit", function (e) {
//   e.preventDefault(); // Prevent the default form submission

//   // Initialize CollectJS and handle tokenization
//   CollectJS.tokenize({
//     callback: function (response) {
//       if (response.error) {
//         showError(response.error.message);
//       } else {
//         // Create a hidden input field with the token
//         let tokenField = document.createElement("input");
//         tokenField.type = "hidden";
//         tokenField.name = "token";
//         tokenField.value = response.token;
//         document.getElementById("cc_form").appendChild(tokenField);

//         // Clear sensitive fields
//         document.querySelector('input[name="card_number"]').value = "";
//         document.querySelector('input[name="exp_date"]').value = "";
//         document.querySelector('input[name="cvc"]').value = "";

//         // Submit the form via AJAX
//         let formData = new FormData(document.getElementById("cc_form"));

//         fetch("process_form.php", {
//           method: "POST",
//           body: formData,
//         })
//           .then((response) => response.json())
//           .then((data) => {
//             if (data.status === "success") {
//               showSuccess(data.message);
//             } else {
//               showError(data.message);
//             }
//           })
//           .catch((error) => {
//             showError("An error occurred: " + error.message);
//           });
//       }
//     },
//   });
// });

// function showError(message) {
//   Toastify({
//     text: message,
//     duration: 3000,
//     gravity: "top",
//     position: "right",
//     backgroundColor: "#ff6961",
//   }).showToast();
// }

// function showSuccess(message) {
//   Toastify({
//     text: message,
//     duration: 3000,
//     gravity: "top",
//     position: "right",
//     backgroundColor: "#77dd77",
//   }).showToast();
// }
