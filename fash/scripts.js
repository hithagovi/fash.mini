// Smooth scrolling for navigation links
document.querySelectorAll('nav a').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  import React from 'react';

const Header = () => (
  <header className="header">
    <div className="logo">Fashion Blog</div>
    <nav className="nav-links">
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#trends">Trends</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>
);

export default Header;
import About from "./pages/About/About";
