function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  document.myForm.submit();
  event.preventDefault();
}
$(document).on('click', '#login_form', function(){
  var email = $("#email").val();
  var password = $("#password").val();

  var url = $('meta[name="url"]').attr('content');
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
    type: "POST",
    headers: { 'X-CSRF-TOKEN': csrf_token },
    url:'seeder_login',
    data:{
      email:email,
      password:password,
    },
    dataType: "json",
    success: function (res) {
      console.log(res.data);
      location.href = "/profile-setting";

      },
    error:function(res){
    },
  });

});
