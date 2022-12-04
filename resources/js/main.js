const burger_btn = document.getElementById("menu-button")
const side_bar = document.getElementById("side-bar")
const x_btn = document.getElementById("x-button")

function toggleSideBar() {
	side_bar.classList.toggle('open')
}

burger_btn.addEventListener('click', (event) => toggleSideBar())

x_btn.addEventListener('click', (event) => toggleSideBar())