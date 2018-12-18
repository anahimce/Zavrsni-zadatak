
var x = document.getElementsByClassName("btn btn-default")[0];
x.addEventListener("click", hideComments);

function hideComments() {
    var y = document.getElementById("comments");
    if (y.style.display === "none") {
        y.style.display = "block";
        x.innerHTML = "Hide comments";

    } else {
      y.style.display = "none";
      x.innerHTML = "Show comments";
    }
}