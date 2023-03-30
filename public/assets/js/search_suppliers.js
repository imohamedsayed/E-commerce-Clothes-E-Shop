let supRows = document.querySelectorAll("table tbody tr"),
    searchTitle = document.querySelector('input.searchName'),
    suppliersArea = document.querySelector('table tbody');

searchTitle.addEventListener('keyup',(e)=>{

    let key = searchTitle.value.toLowerCase();
    let searchResults = [];

    supRows.forEach(tr=>
    {
        let cName = tr.querySelector('.name').innerHTML.toLowerCase();


        if( cName.includes(key))
        {
            searchResults.push(tr)
        }
    })

    suppliersArea.innerHTML = '';

    searchResults.forEach(tr=>{
        suppliersArea.appendChild(tr)
    })
})
