let catRows = document.querySelectorAll("table tbody tr"),
    searchTitle = document.querySelector('input.searchName'),
    categoriesArea = document.querySelector('table tbody');

searchTitle.addEventListener('keyup',(e)=>{

    let key = searchTitle.value.toLowerCase();
    let searchResults = [];

    catRows.forEach(tr=>
    {
        let cName = tr.querySelector('.title').innerHTML.toLowerCase();


        if( cName.includes(key))
        {
            searchResults.push(tr)
        }
    })

    categoriesArea.innerHTML = '';

    searchResults.forEach(tr=>{
        categoriesArea.appendChild(tr)
    })
})
