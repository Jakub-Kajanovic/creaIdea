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
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('a[href^="#"]');

  links.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        // Dynamicky získaj výšku hlavičky
        const header = document.querySelector('header');
        const headerHeight = header ? header.offsetHeight : 0;

        // Vypočítaj pozíciu cieľového prvku s ohľadom na posúvanie okna
        const targetPosition = targetElement.getBoundingClientRect().top + window.scrollY;
        const offsetPosition = targetPosition - headerHeight;

        // Použi `scrollIntoView` s vyrovnávacím offsetom
        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});


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
