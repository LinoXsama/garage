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

    const min = document.getElementById("min-km");
    min.textContent = km_slider_1;

    const max = document.getElementById("max-km");
    max.textContent = km_slider_2;

    for(let i = 0; kilometrages.length > i; i++)
    {
        let match = [];
        
        for(let j = 0; kilometrages.length > j; j++)
        {
            match.push(parseInt(kilometrages[j].innerHTML));
        }

        for(let k = 0; match.length > k; k++)
        {
            if(match[k] >= km_slider_1 && match[k] <= km_slider_2)
            {
                cars[k].style.display = "";
            }
            else 
            {
                cars[k].style.display = "none";
            }
        }
    }

};

const reset_km_slider = () => {
    document.addEventListener('DOMContentLoaded', function() {
        event.preventDefault();
        const km_slider_1 = document.getElementById("km-slider-1");
        const km_slider_2 = document.getElementById("km-slider-2");

        km_slider_1.value = 222220;
        km_slider_2.value = 267220;
    });
}

// FONCTIONS DE LA PAGE cars.php - END

// NOTE POUR UN EVENTUEL USAGE FUTURE: AUTRE MANIERE DE RECUPERER LES DONNEES D'UNE 
// NODE LIST GENEREE PAR getElementsByClassName() SOUS FORME DE TABLEAU

// let kilometrages = document.getElementsByClassName("kilometrage");
// let data = Array.from(kilometrages);

// for(let element of data)
// {
//     console.log(element.innerHTML);
// }

// const min = document.getElementById("min-price").innerHTML;
// console.log(min);

console.log('hello');

