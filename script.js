// document.addEventListener("click", function (e) 
// {
//     if(e.target.classList.contains("edition"))
//     {
//         let session = "$_SESSION['user_id'] = ";
//         let user_id = e.target.id;
//         data = session.concat(user_id, ';');
//         // console.log(data);
//         localStorage.setItem('data', data);
//     }
// })

// let result = document.getElementById('result');

// result.innerHTML = localStorage.getItem('data');

// FONCTIONS DE LA PAGE cars.php - START

// FONCTION QUI CONTROLE LA BARRE DE RECHERCHE
const search = () => 
{
    const search_bar = document.getElementById("search-bar").value.toUpperCase();
    const cars = document.getElementsByClassName("car");

    for(let i = 0; cars.length > i; i++)
    {
        let match = cars[i].getElementsByTagName("h4")[0];

        if(match)
        {
            let text_value = match.innerHTML || match.textContent;

            if(text_value.toUpperCase().indexOf(search_bar) > -1)
            {
                cars[i].style.display = "";
            }
            else
            {
                cars[i].style.display = "none";
            }
        }
    }
}

// FONCTION QUI CONTROLE LA RECHERCHE SELON UN INTERVALLE DE DONNEES VIA DES INPUTS DU TYPE RANGE
const search_slider = () => {

    const km_slider_1 = document.getElementById("km-slider-1").value;
    const km_slider_2 = document.getElementById("km-slider-2").value;
    const kilometrages = document.getElementsByClassName("kilometrage");
    const cars = document.getElementsByClassName("car");
    // console.log('[', km_slider_1, ';', km_slider_2, ']');

    for(let i = 0; kilometrages.length > i; i++)
    {
        let match = [];
        
        for(let j = 0; kilometrages.length > j; j++)
        {
            match.push(parseInt(kilometrages[j].innerHTML));
        }

        for(let z = 0; match.length > z; z++)
        {
            if(match[z] >= km_slider_1 && match[z] <= km_slider_2)
            {
                cars[z].style.display = "";
            }
            else 
            {
                cars[z].style.display = "none";
            }
        }

    }

}

// FONCTIONS DE LA PAGE cars.php - END