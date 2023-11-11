setTimeout(function () {
    document.querySelector('.twitter-section .loading-spinner').style.display = 'none';
  }, 6000);

  function toggleTextarea(show) {
    var textarea = document.getElementById("review");
    if (show) {
        textarea.style.display = "block";
    } else {
        textarea.style.display = "none";
        textarea.value = "";
    }
  }


