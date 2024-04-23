/* Menu mobile */
function navOpen() {
    var x = document.getElementById("menu-reponsive");
    if (x.classList.contains("site-navigation")) {
        x.classList.add("navigation-open");
    } else {
        x.className = "site-navigation";
    }
    console.log(document.querySelector(".nav-close"));
}

function navClose() {
    document.querySelector("#menu-reponsive").classList.remove('navigation-open');
}

/* Click Item Responsive Footer */
function myFunction(index) {
	if (document.querySelectorAll(".footer-item")[index].classList.contains("active")) {
	  	document.querySelectorAll(".footer-item")[index].querySelector(".nav-content-list").style.height = 0;
	} else {
		document.querySelectorAll(".footer-item")[index].querySelector(".nav-content-list").style.height = `${document.querySelectorAll(".footer-item")[index].querySelector(".nav-content-list").querySelector(".hover-list-style2").offsetHeight}px`;
	}
	document.querySelectorAll(".footer-item")[index].classList.toggle("active");
}

/* Menu Collection Mobile */
if ($("#btn-active-collection").length > 0){
    var button = document.getElementById("btn-active-collection");
    var div = document.getElementById("menu-above-reponsive");


    button.addEventListener("click", function() {
        if (div.classList.contains("active")) {
            div.classList.remove("active");
        } else {
            div.classList.add("active");
        }
    });
}


/* Click Item Responsive Footer */
function acordition(index) {
    if (document.querySelectorAll(".acordition-item")[index].classList.contains("active")) {
        document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").style.height = 0;
    } else {
        document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").style.height = `${document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").querySelector(".list-item").offsetHeight}px`;
    }
    document.querySelectorAll(".acordition-item")[index].classList.toggle("active");
}