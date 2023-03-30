// Search for products

let productRows = document.querySelectorAll("table tbody tr"),
    searchTitle = document.querySelector('input.searchTitle'),
    searchCategory = document.querySelector('input.searchCategory'),
    seachInputs = document.querySelectorAll('input'),
    productArea = document.querySelector('table tbody');
seachInputs.forEach(input=>{
    input.addEventListener('keyup',(e)=>{

        let key1 = searchTitle.value.toLowerCase();
        let key2 = searchCategory.value.toLowerCase();



        let searchResults = [];

        productRows.forEach(tr=>
        {
            let pName = tr.querySelector('.title').innerHTML.toLowerCase();
            let pCat = tr.querySelector('.category').innerHTML.toLowerCase();

            if( pName.includes(key1) && pCat.includes(key2))
            {
                searchResults.push(tr)
            }
        })

        productArea.innerHTML = '';


        searchResults.forEach(tr=>{
            productArea.appendChild(tr)
        })
    })
})
