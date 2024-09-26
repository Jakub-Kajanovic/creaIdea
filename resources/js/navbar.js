let hamburger = document.querySelector("#hamburger");
let nav = document.querySelector(".navMenu");
let navLinks = document.querySelectorAll(".navMenu li");

// close nav by clicking on list items
Array.from(navLinks).forEach((li) =>
  li.addEventListener("click", () => {
    if (hamburger.classList.contains("toggle")) {
      hamburger.classList.remove("toggle");
    }
    if (nav.classList.contains("nav-active")) {
      nav.classList.remove("nav-active");
    }
  })
);

// toggle nav on click of hamburger menu icon
hamburger.addEventListener("click", () => {
  nav.classList.toggle("nav-active");

  // burger animation
  hamburger.classList.toggle("toggle");
});

const scrollNav = document.getElementById("navbar");
const scrollHeader = document.getElementById("header");

function handleScroll(){
  if (window.scrollY > 0 ) {
    scrollNav.classList.add("nav-scroll");
    scrollHeader.classList.add("header-scroll");
  } else {
    scrollNav.classList.remove("nav-scroll");
    scrollHeader.classList.remove("header-scroll");
  }
}
window.addEventListener("scroll", handleScroll);


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
      e.preventDefault();

      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      // Získaj výšku headera
      const headerOffset = document.querySelector('header').offsetHeight; 
      const elementPosition = targetElement.getBoundingClientRect().top;
      const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

      // Skroluj na správne miesto
      window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
      });
  });
});
