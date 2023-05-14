
const asideBtn = document.querySelector(".asideToggler");
const menuToggler = document.querySelector(".menu-toggler");
const catAside = document.querySelector("aside.category");
const menuAside = document.querySelector("aside.menu");
const asideOver = document.querySelector(".aside-ovelay");

asideBtn.addEventListener("click", () => {
    removeActiveFromMobileNavButtons();
    asideBtn.classList.toggle("active");
    catAside.classList.toggle("open");
    checkOvelay();
});
menuToggler.addEventListener("click", () => {
    removeActiveFromMobileNavButtons();
    menuToggler.classList.toggle("active");

    menuAside.classList.toggle("open");
    checkOvelay();
});

function checkOvelay() {
    if (
        catAside.classList.contains("open") ||
        menuAside.classList.contains("open")
    ) {
        asideOver.style.display = "block";
    } else {
        asideOver.style.display = "none";
    }
}
asideOver.addEventListener("click", () => {
    menuAside.classList.remove("open");
    catAside.classList.remove("open");
    asideOver.style.display = "none";
    removeActiveFromMobileNavButtons();
});

function removeActiveFromMobileNavButtons() {
    let spans = document.querySelectorAll(".mobile-nav span");
    spans.forEach((span) => {
        span.classList.remove("active");
    });
}
catAside.innerHTML = document.querySelector(".categories").innerHTML;


// colse notification

const notificationToast = document.querySelector(".notification-toast");
const toastCloseBtn = document.querySelector(".toast-close-btn");

// notification toast eventListener
toastCloseBtn.addEventListener("click", function () {
    notificationToast.classList.add("closed");
});

// mode
const dayNight = document.querySelector(".day-night");

dayNight.addEventListener("click", () => {
    dayNight.querySelector("svg").classList.toggle("fa-sun");
    dayNight.querySelector("svg").classList.toggle("fa-moon");
    document.body.classList.toggle("dark");
    if(document.body.classList.contains('dark')){
        localStorage.darkMode = 'on'
    }else{
        localStorage.darkMode = 'off'
    }
});



window.addEventListener("load", () => {
    if (localStorage.darkMode === 'on') {
        document.body.classList.add('dark')
        dayNight.querySelector("svg").classList.add("fa-sun");
    } else {
        dayNight.querySelector("svg").classList.add("fa-moon");
    }
});

// increment and decrement quantity of a product

let incrementButtons = document.querySelectorAll('.increment'),
 decrementButtons = document.querySelectorAll('.decrement');


incrementButtons.forEach(one=>{
    one.addEventListener('click',(e)=>{
        let qty = e.target.parentNode.querySelector('.pQty');
        qty.value++;
    })
})
decrementButtons.forEach(one=>{
    one.addEventListener('click',(e)=>{
        let qty = e.target.parentNode.querySelector('.pQty');
        if(qty.value != 1){
            qty.value--;
        }
    })
})

// document.querySelector('.purchaseBtn').addEventListener('click',()=>{
//     document.querySelector('form.cart-update-from').submit()
// })
