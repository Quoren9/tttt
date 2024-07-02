function showContent(contentId) {
  var i, tabcontent, tablinks;

  // Hide all tabcontent
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].classList.add("hidden");
      tabcontent[i].classList.remove("visible");
  }

  // Remove the active class from all links
  tablinks = document.getElementsByClassName("navbar")[0].getElementsByTagName("a");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].classList.remove("active");
  }

  // Show the curre"nt tab, and add an "active" class to the link that opened the tab
  document.getElementById(contentId).classList.add("visible");
  document.getElementById(contentId).classList.remove("hidden");
  event.currentTarget.classList.add("active");
}

// function toggleNavbar() {
//   var x = document.getElementById("myNavbar");
//   if (x.className === "navbar") {
//       x.className += " responsive";
//   } else {
//       x.className = "navbar";
//   }
// }
