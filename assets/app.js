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