$(function ($) {
  "use strict";

  jQuery(document).ready(function () {

    // preloader
    $("#preloader").delay(300).animate({
      "opacity": "0"
    }, 500, function () {
      $("#preloader").css("display", "none");
    });

    // Scroll Top
    var ScrollTop = $(".scrollToTop");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 500) {
        ScrollTop.removeClass("active");
      } else {
        ScrollTop.addClass("active");
      }
    });
    $('.scrollToTop').on('click', function () {
      $('html, body').animate({
        scrollTop: 0
      }, 500);
      return false;
    });

    // Navbar Dropdown
    $(window).resize(function () {
      if ($(window).width() < 992) {
        $(".dropdown-menu").removeClass('show');
      }
      else {
        $(".dropdown-menu").addClass('show');
      }
    });
    if ($(window).width() < 992) {
      $(".dropdown-menu").removeClass('show');
    }
    else {
      $(".dropdown-menu").addClass('show');
    }

    // Sticky Header
    var fixed_top = $(".header-section");
    $(window).on("scroll", function () {
      if ($(window).scrollTop() > 50) {
        fixed_top.addClass("animated fadeInDown header-fixed");
      }
      else {
        fixed_top.removeClass("animated fadeInDown header-fixed");
      }
    });

    // Remittance active
    var remittance = $(".remittance .single-box");
    $(remittance).on('mouseover', function () {
        $(remittance).removeClass('active');
        $(this).addClass('active');
    });

    // social link active
    var socialLink = $(".social-link a");
    $(socialLink).on('mouseover', function () {
        $(socialLink).removeClass('active');
        $(this).addClass('active');
    });

    // Password Show Hide
    $('.showPass').on('click', function(){
        var passInput=$(".passInput");
        if(passInput.attr('type')==='password'){
          passInput.attr('type','text');
        }else{
          passInput.attr('type','password');
        }
    });
    
  });

});

// Loan Calculator
function calculate() {
  var apr_dict = {
          personal: 22,
          bad_credit: 33,
          payday: 17,
          auto: 36,
          retirement: 34,
          consolidation: 31};
          
  var loanAmount = parseFloat(document.getElementById("loanAmount").value);
  var loanType = document.getElementById("loanType").value;
  var apr = apr_dict[loanType];

  var loanTerm = parseFloat(document.querySelector('input[name="loanTerm"]:checked').value);
      
  var monthlyInterestRate = apr / 12 / 100; 
  var numerator = loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTerm);
  var denominator = Math.pow(1 + monthlyInterestRate, loanTerm) - 1;
  var monthlyPayment = numerator / denominator;
  var repayment = monthlyPayment * loanTerm;

  document.getElementById("monthlyPayment").innerHTML = "$" + monthlyPayment.toFixed(2);
  document.getElementById("repayment").innerHTML = "$" + repayment.toFixed(2);
  document.getElementById("loan-term").innerHTML = loanTerm + " months";
  document.getElementById("APR").innerHTML = apr + "%";
}

// offer 
function calculate_offer() {
  var loanAmount = parseFloat(document.querySelector('input[name="l-amount"]:checked').value);
  var apr = parseFloat(document.getElementById("a_apr").value);

  var loanTerm = 24;
      
  var monthlyInterestRate = apr / 12 / 100; 
  var numerator = loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTerm);
  var denominator = Math.pow(1 + monthlyInterestRate, loanTerm) - 1;
  var monthlyPayment = numerator / denominator;
  var repayment = monthlyPayment * loanTerm;
  
  document.getElementById("amountSelect").innerHTML = "$" + loanAmount.toFixed(2);
  document.getElementById("monthlyPayment").innerHTML = "$" + monthlyPayment.toFixed(2);
  document.getElementById("repayment").innerHTML = "$" + repayment.toFixed(2);

}

// Multistep form

// Email field formatter
function formatDOB(input) {
  var value = input.value.replace(/\D/g, '').substring(0,8);
  var yyyy = value.substring(4,8);
  var mm = value.substring(0,2);
  var dd = value.substring(2,4);

  input.value = mm + (dd.length > 0 ? '-' + dd : '') + (yyyy.length > 0 ? '-' + yyyy : '');
}
// Phone number formatter
function formatPhone(input) {
  var phoneNumber = input.value.replace(/\D/g, '').substring(0,10); // Remove non-numeric characters
  var formattedPhoneNumber = phoneNumber.replace(/(\d{3})(\d{3})(\d{4})/, "($1) $2 $3"); // Apply phone number format
  input.value = formattedPhoneNumber;
}

// Social Formatter
document.getElementById('social_number').addEventListener('input', function (e) {
  var ssn = e.target.value.replace(/\D/g, '');
  if (ssn.length > 9) {
    ssn = ssn.substring(0, 9); // Truncate excess characters
  }
  var formattedSSN = ssn.replace(/(\d{3})(\d{2})(\d{4})/, '$1 $2 $3');
  e.target.value = formattedSSN;
});

// Issue Date
document.getElementById('issue_date').addEventListener('input', function(e) {
  var input = e.target.value;
  if(input.length === 2 && !input.includes('-')) {
    e.target.value = input + '-';
  }
});

// Expiry Date
document.getElementById('expiry_date').addEventListener('input', function(e) {
  var input = e.target.value;
  if(input.length === 2 && !input.includes('-')) {
    e.target.value = input + '-';
  }
});

// Multistep
function validateStep(step) {
  var valid = true;
  var currentStep = document.getElementById('step' + step);
  var inputs = currentStep.querySelectorAll('input, select');

  inputs.forEach(function(input) {
    if (!input.checkValidity()) {
      input.reportValidity();
      input.classList.add('error');
      valid = false;
    } else {
      input.classList.remove('error');
    }
  });

  if (valid) {
    nextStep(step);
  } else {
    scrollToFormTop();
  }
}

function nextStep(step) {
    document.getElementById('step' + step).style.display = 'none';
    document.getElementById('step' + (step + 1)).style.display = 'block';
    scrollToFormTop();
}

function prevStep(step) {
  document.getElementById('step' + step).style.display = 'none';
  document.getElementById('step' + (step - 1)).style.display = 'block';
  scrollToFormTop();
}

function scrollToFormTop() {
  var formContainer = document.getElementById('formContainer');
  formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

// function validateStep(step) {
//   var isValid = true;
//   var inputs = document.getElementById('step' + step).querySelectorAll('input, select');
  
//   inputs.forEach(function(input) {
//     if(input.checkValidity() == false) {
//       isValid = false;
//       input.reportValidity();
//     }
//   });

//   return isValid;
// }