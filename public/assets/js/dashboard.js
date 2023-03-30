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

// aside
let aside = document.querySelector('aside');
let menuToggles = aside.querySelector('.menu-toggler')
let showMenu = true;

if(localStorage.getItem("isExpanded") != null)
{

    showMenu = JSON.parse(localStorage.getItem("isExpanded"));

    checkAside(aside);
}

menuToggles.addEventListener('click',()=>{
    showMenu = !showMenu;
    aside.classList.toggle('expanded');
    localStorage.setItem("isExpanded", JSON.stringify(showMenu));
})






function checkAside(aside){
    if(showMenu){
        aside.classList.add('expanded');
    }else{
        aside.classList.remove('expanded');
    }
}



