//For dropdown of select tags
document.getElementById("tags").onchange = function() {
    if (this.selectedIndex !== 0) {
        window.location.href = this.value;
    }
};

//For responsive nav bar
if (screen.width <= 600) {
    document.getElementById("edit").innerHTML = '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>';
    document.getElementById("insert").innerHTML = '<i class="fa fa-plus-square-o" aria-hidden="true"></i>';
    document.getElementById("home").innerHTML = '<i class="fa fa-home" aria-hidden="true"></i>';
    document.getElementById("user").innerHTML = '<i id ="icon" class="fa fa-user" aria-hidden="true"></i>';
    document.getElementById("myDropdown").style.marginLeft = '-120px';
}

//For dropdown
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
    if (!(event.target.matches('.dropdown') || event.target.matches('#user') || event.target.matches('#icon'))) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}