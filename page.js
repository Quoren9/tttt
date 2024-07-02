function showcontent(section) {
    // Get all content sections
    var sections = document.querySelectorAll('.container > div');
    
    // Loop through all sections and hide them
    sections.forEach(function(sec) {
        sec.classList.remove('visible');
        sec.classList.add('hidden');
    });
    
    // Show the selected section
    var selectedSection = document.getElementById(section.toLowerCase());
    selectedSection.classList.remove('hidden');
    selectedSection.classList.add('visible');
    
    // Update active class on navbar links
    var links = document.querySelectorAll('.navbar a');
    links.forEach(function(link) {
        link.classList.remove('active');
    });
    
    // Add active class to the clicked link
    var activeLink = document.querySelector('.navbar a[onclick="showcontent(\'' + section + '\')"]');
    activeLink.classList.add('active');
}

function toggleNavbar() {
    var navbar = document.getElementById("myNavbar");
    if (navbar.className === "navbar") {
        navbar.className += " responsive";
    } else {
        navbar.className = "navbar";
    }
}

