$(document).ready(function() {
    if ($('.section-product .partner.owl-carousel').length > 0){
        var path_resource = themeData.direc_url;
        var arrow_left = path_resource+"image/left.svg";
        var arrow_right = path_resource+"image/next.svg";
        $('.section-product .partner.owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            margin: 34,
            navText: [
                '<a href="javascript:;" class="owl_next prev_owl"><img src='+arrow_left+' alt="left"></a>',
                '<a href="javascript:;" class="owl_prev next_owl"><img src='+arrow_right+' alt="right"></a>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                767: {
                    items: 2
                },
                991: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    }
    if ($('#form_submit_success').length > 0){
        var element = document.getElementById('form_submit_success');
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    }

    // Smooth scroll when clicking on links with class 'smooth-scroll'
    if ($('.smooth-scroll').length > 0){
        const smoothScrollLinks = document.querySelectorAll('.smooth-scroll');
        smoothScrollLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent default anchor behavior
                const targetId = link.getAttribute('data-value').substring(1); // Get target ID from href
                console.log(targetId);
                scrollToTarget(targetId); // Smooth scroll to target
            });
        });
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
});
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


/* Click Item Responsive Footer */
function acordition(index) {
    if (document.querySelectorAll(".acordition-item")[index].classList.contains("active")) {
        document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").style.height = 0;
    } else {
        document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").style.height = `${document.querySelectorAll(".acordition-item")[index].querySelector(".product-info-list").querySelector(".list-item").offsetHeight}px`;
    }
    document.querySelectorAll(".acordition-item")[index].classList.toggle("active");
}

// Smooth scroll function
function scrollToTarget(target) {
    const targetElement = document.getElementById(target);
    if (targetElement) {
        window.scrollTo({
            top: targetElement.offsetTop,
            behavior: 'smooth'
        });
    }
}
