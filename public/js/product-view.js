$(document).ready(replace(0));

var curr = -1;

$(".product-media img").each(function (index) {
  $(this).on("click", function () {
    $(".product-media img").removeClass("select");
    $(this).addClass("select");
    replace(index);
  });
});

function replace(num) {
  console.log("curr is " + curr);
  if (num != curr) {
    curr = num;
    remove();
    setTimeout(display, 400, $(".product-media img").clone()[num]);
  }
}

function remove() {
  $(".product-view img").remove();
}

function display(image) {
  $(".product-view").append(image);
  $(".product-view img").hide().fadeIn(300);
  $(".product-view img").addClass("to-full");
}
