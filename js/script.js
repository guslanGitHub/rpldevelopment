// tangkap class navbar
const navbar = document.querySelector(".navbar");
// tangkap id icon-menu
const iconMenu = document.querySelector("#icon-menu");
//tangkap class icon-search
const iconSearch = document.querySelector("#icon-search");
// tangkap clas searh-form
const formSearch = document.querySelector(".search-form");
// tangkap input id search-box
const searchBox = document.querySelector("#search-box");

// sidebar awal
// ketika icon menu di klik
iconMenu.onclick = () => {
  navbar.classList.toggle("active");
};

// klik di luar sidebar untuk menghilangkan sidebar
document.addEventListener("click", (e) => {
  if (!iconMenu.contains(e.target) && !navbar.contains(e.target)) {
    navbar.classList.remove("active");
  }
});
// sidebar akhir

// search form awal
iconSearch.onclick = (e) => {
  formSearch.classList.toggle("active");
  iconSearch.style.display = "none";
  searchBox.focus(); //untuk elemen input fokus
  e.preventDefault(); //mematikan # pada elemen a href="#"
};
document.addEventListener("click", (e) => {
  if (!iconSearch.contains(e.target) && !formSearch.contains(e.target)) {
    formSearch.classList.remove("active");
    iconSearch.style.display = "flex";
  }
});

// search form akhir
