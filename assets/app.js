import './bootstrap';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.css';

let nav = document.querySelector("nav");
let hamburger = document.querySelector("#hamburger");
hamburger.addEventListener("click", () => {
    nav.classList.toggle("open");
})

let links = document.querySelectorAll(".nav-links");
links.forEach((liens) => {
    liens.addEventListener("click", () => {
        nav.classList.remove("open");
    })
})

const runColorMode = (fn) => {
    if (!window.matchMedia) {
      return;
    }
    
    const query = window.matchMedia('(prefers-color-scheme: dark)');
  
    fn(query.matches);
  
    query.addEventListener('change', (event) => fn(event.matches));
  }
  
  runColorMode((isDarkMode) => {
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.add('dark-mode');
    }
  })

let darkModeButton = document.querySelector("#dark-mode");
darkModeButton.addEventListener("click", () => {
    document.body.classList.toggle('dark-mode');
})