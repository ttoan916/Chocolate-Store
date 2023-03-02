//nav bar scripts
const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navLinks = document.getElementsByClassName('links')[0]

toggleButton.addEventListener('click', () => {
    navLinks.classList.toggle('active')
})

const activePage = window.location.pathname;
const navBarLinks = document.querySelectorAll('nav a').forEach(link => {
  if(link.href.includes(activePage)){
    link.classList.add('activeTab');
  }
})