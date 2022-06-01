window.onload = function()
{// Navbar
    const elemsDropdown = document.querySelectorAll(".dropdown-trigger");
    const instancesDropdown = M.Dropdown.init(elemsDropdown, {
        coverTrigger: false
    });
    const elemsSidenav = document.querySelectorAll(".sidenav");
    const instancesSidenav = M.Sidenav.init(elemsSidenav, {
        edge: "left"
    });
}

window.onload = function()
{//Animation page accueil 
$(document).ready(function(){
    $('.modal').modal();
});
}
