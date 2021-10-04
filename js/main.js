// Get current time
function getDate() {
  let today = new Date();
  var date =
    today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();
  var time =
    today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
  var dateTime = date + " " + time;

  return dateTime;
}

// Time date HTML holder
let dateHolder = document.querySelector("#date_time");

// Pass the current date and time
dateTime = getDate();
dateHolder.innerHTML = dateTime;

// Show / Save product image

$("document").ready(function () {
  $("#product_img").change(function () {
    if (this.files && this.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#fileDisplayArea").attr("src", e.target.result);
      };
      reader.readAsDataURL(this.files[0]);
    }
  });
});
