// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function validar() {
  var password = formuser.password.value;
  var repeat_password = formuser.repeat_password.value;

  if (password !== repeat_password) {
     alertify.alert('The passwords are different!').setting({
        title: 'Alert!',
     }).show();
     formuser.password.focus();
     return false;
  }
}
