
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

function validateForm() {
    var x = document.forms["myForm"]["author"].value;
    var y = document.forms["myForm"]["tekst"].value;
    if (x === "") {
      alert("Author must be filled out");

    } else if (y === ""){
        alert("Comment must be filled out");
        return false;
    }
}


function validate() {
  var s = document.forms["createPostForm"]["title"].value;
  var b = document.forms["createPostForm"]["body"].value;
  var c = document.forms["createPostForm"]["author"].value;
  var d = document.forms["createPostForm"]["created_at"].value;

  if (s === "") {
    alert("Title must be filled out");
  } else if (b === ""){
      alert("Text must be filled out");
  } else if (c === ""){
  alert("Text must be filled out");
  } else if (d === ""){
  alert("Date&Time must be filled out");
  return false;
  }
}


var el = document.getElementById('deletePostForm');

el.addEventListener('submit', function(){
    return confirm('Do you really want to delete this post?');
}, false);