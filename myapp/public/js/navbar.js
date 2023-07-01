window.onload = function () {
  var bars = document.querySelector(".fa-bars");
  var sidebar = document.querySelector(".item2");
  bars.addEventListener("click", function () {
    sidebar.classList.toggle("hide");
  });
};
