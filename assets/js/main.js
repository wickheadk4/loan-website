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

function calculate() {
  var apr_dict = {
          personal: 4.5,
          bad_credit: 3.7,
          payday: 4.3,
          auto: 6.8,
          retirement: 5.6,
          consolidation: 5.8
          };
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