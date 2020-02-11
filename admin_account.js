$(document).on('keypress', '#firstname', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var name = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(name)) {
        event.preventDefault();
        alert('Please Use Alphabets in Your Name');
        return false;
    }
});
$(document).on('keypress', '#lastname', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var name = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(name)) {
        event.preventDefault();
        alert('Please Use Alphabets in Your Name');
        return false;
    }
});


$("#username").change(function(){
      var email = document.getElementById("username").value;
      var expression = /^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|yahoo|hotmail)\.com$/;
      //var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      if (!expression.test(email)) {
            alert('Invalid Email');
            document.getElementById("username").focus();
            document.getElementById('username').value='';
            return false;
        }
    });

    $("#contact").change(function(){
      var phone = document.getElementById("contact").value;
      var phoneexp = /^[0-9]+$/;
      if (!phoneexp.test(phone)) {
            alert('Invalid Phone Number');
            document.getElementById('contact').value='';
            document.getElementById("contact").focus();
            return false;
        }
    });
