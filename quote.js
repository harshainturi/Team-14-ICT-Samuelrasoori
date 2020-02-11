$(document).on('keypress', '#name', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var name = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(name)) {
        event.preventDefault();
        alert('Please Use Alphabets in Your Name');
        return false;
    }
});


$("#email").change(function(){
      var email = document.getElementById("email").value;
      var expression = /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|yahoo|hotmail)\.com$/;
      //var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if (!expression.test(email)) {
            alert('Invalid Email');
            document.getElementById("email").focus();
            document.getElementById('email').value='';
            return false;
        }
    });
    $('#con').change(function() {
    var vak = $('#con').val();
    $("#phone").val(vak);
    $("#phone").change(function(){
      var phone = document.getElementById("phone").value;
    //  var phoneexp = /^[0-9]{10,}$/;
    var phoneexp = /^[+][1-9]\d{10}$|^[1-9]\d{10}$/;
  // var phoneexp= /^(([+][(]?[0-9]{1,3}[)]?)|([(]?[0-9]{4}[)]?))\s*[)]?[-\s\.]?[(]?[0-9]{1,3}[)]?([-\s\.]?[0-9]{3})([-\s\.]?[0-9]{3,4})$/;
      // var default_country_code  = '(+91)';
        if(!phoneexp.test(phone)) {
          alert('Invalid Phone Number');
          document.getElementById('phone').value='';
          document.getElementById("phone").focus();
          return false;
        }
        else{

        }
    });
});
  var phonev = document.getElementById("phone").value;
  if (phonev.equal(ind)){
    alert("Enter Phone Number");
  }
  if( phonev.equal(aus)){
alert("Enter Phone Number");
  }
    $(document).on('keypress', '#message', function (event) {
        var msg = /^[a-zA-Z0-9,.!? ]*$/;
        var message = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!msg.test(message)) {
            event.preventDefault();
            alert('No Special Characters allowed');
            return false;
        }
    });

      $('textarea#message').on('keyup',function()
      {
        var maxlen = $(this).attr('maxlength');

        var length = $(this).val().length;
        if(length > (maxlen-10) ){
          alert('Maximum Characters limit reached');
        }
      });
