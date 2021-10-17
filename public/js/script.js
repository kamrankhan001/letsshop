jQuery.noConflict();

jQuery(document).ready(function($){


    var countries = ['pakistan', 'india', 'china', 'indonesia']

    var women = ['Jeans', 'Tees', 'Beauty'];

    var men = ["Men's Polos", "Men's Jeans & Trousers", "Men Shoe"];

    var kids = ['Babies', 'Boys', 'Girls'];


    $("#profile").click(function(){
      if($("#drop").hasClass('hidden')){
        $("#drop").removeClass('hidden')
    }else{
        $("#drop").addClass('hidden')
    }
    });

    $("#mob-profile").click(function(){
      if($("#mob-drop").hasClass('hidden')){
        $("#mob-drop").removeClass('hidden')
    }else{
        $("#mob-drop").addClass('hidden')
    }
    });


    $("#add").click(function(){
      qty = $("#quantity").val();
      qty = Number(qty) + 1;
      $("#quantity").val(qty);
    });

    $("#sub").click(function(){
      qty = $("#quantity").val();
      if (qty > 1){
        qty = Number(qty) - 1;
        $("#quantity").val(qty);
      }
    });

    $("#quantity").focus(function(){
      $(this).prop('readonly', true);
    })


    $("#dropdown").click(function(){
      if($("#down-items").hasClass('hidden')){
          $("#down-items").removeClass('hidden')
      }else{
          $("#down-items").addClass('hidden')
      }
    });

    $("#mob-nav").click(function(){
      if($("#mob-nav-items").hasClass('hidden')){
          $("#mob-nav-items").removeClass('hidden')
      }else{
          $("#mob-nav-items").addClass('hidden')
      }
    });

    

    // ****************************forms****************************

    // check spaces
    $.validator.addMethod("noSpaces", function(value, ele){
      return value == '' || value.trim().length != 0;
    }, "Spaces are not allowed");

    // check password length
    $.validator.addMethod("length", function(value, ele){
      return value.length >= 8;
    }, "Password must be grater then 8 characters");

    // countries
    $.validator.addMethod("country", function(value, ele){
      return  countries.includes(value);
    }, "Sorry we can't shipping there");

    $("#register").validate({
      rules: {
        first_name: {
          required: true,
          noSpaces: true,
        },
        last_name: {
          required: true,
          noSpaces: true,
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          length: true,
        },
        confirm_password: {
          required: true,
          equalTo: '#password',
        },
      },

    });

    $("#login").validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          }
        },
    });

    $("#address").validate({
      rules: {
        address: {
          required: true,
        },
        country: {
          required: true,
          country: true,
        },
        city: {
          required: true,
        },
        phone_number: {
          required: true,
        },
        gender: {
          required: true,
        },
      },
    });

    $("#addtocard").validate({
      rules: {
        size: {
          required: true,
        },
        quantity: {
          required: true,
        }
      },
      errorPlacement: function(error, ele){
        if(ele.is("#size")){
          error.appendTo(ele.parents(".sizeerror"));
        }else{
          error.insertBefore(ele);
        }
      }
      
    });

    $("#product").validate({
      rules: {
        product_name: {
          required: true,
        },
        price: {
          required: true,
        },
        category: {
          required: true,
        },
        subcategory: {
          required: true,
        },
        stock: {
          required: true,
        },
      },
  
    });
   

 // ********************************* Admin Product ****************************
 $("#category").on('change',function(){
    let category =  $(this).val();
    $("#subcategory").find('option').remove();
    if (category === 'women') {
      $.each(women, function (index,item) {
        $('#subcategory').append($('<option>', { 
            value: item,
            text : item 
        }));
      });
    }else if (category === 'men') {
      $.each(men, function (index,item) {
        $('#subcategory').append($('<option>', { 
            value: item,
            text : item 
        }));
      });
    }else if (category === 'kids') {
      $.each(kids, function (index,item) {
        $('#subcategory').append($('<option>', { 
            value: item,
            text : item 
        }));
      });
    }
 });









});