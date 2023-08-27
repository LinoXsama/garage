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

const search_bar = () => 
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
};

// FONCTION QUI VERIFIE QU'UN NOMBRE EST COMPRIS DANS UN INTERVALLE FERME
// isb signifie "is between" = est compris entre
const isb = (value, limit1, limit2) => {
    return (value >= limit1 && value <= limit2);
};

// FONCTION QUI CONTROLE LA RECHERCHE PAR FILTRES : KILOMETRAGE, PRIX ET ANNEES
const search_sliders = () => {

    // year range inputs - START
    const year_slider_1 = document.getElementById("year-slider-1").value;
    const min_year = document.getElementById("min-year");
    min_year.textContent = year_slider_1;

    const year_slider_2 = document.getElementById("year-slider-2").value;
    const max_year = document.getElementById("max-year");
    max_year.textContent = year_slider_2;
    // year range inputs - END

    // price range inputs - START
    const price_slider_1 = document.getElementById("price-slider-1").value;
    const min_price = document.getElementById("min-price");
    min_price.textContent = price_slider_1;
    
    const price_slider_2 = document.getElementById("price-slider-2").value;
    const max_price = document.getElementById("max-price");
    max_price.textContent = price_slider_2;
    // price range inputs - END

    // km range inputs - START
    const km_slider_1 = document.getElementById("km-slider-1").value;
    const min_km = document.getElementById("min-km");
    min_km.textContent = km_slider_1;

    const km_slider_2 = document.getElementById("km-slider-2").value;
    const max_km = document.getElementById("max-km");
    max_km.textContent = km_slider_2;
    // km range inputs - END

    const kilometrages = document.getElementsByClassName("kilometrage");
    const prices = document.getElementsByClassName("price");
    const release_year = document.getElementsByClassName("release-year");

    const cars = document.getElementsByClassName("car");

    for(let i = 0; kilometrages.length > i; i++)
    {
        let match_km = [];
        let match_price = [];
        let match_release_year = [];

        for(let j = 0; kilometrages.length > j; j++)
        {
            match_km.push(parseInt(kilometrages[j].innerHTML));
            match_price.push(parseInt(prices[j].innerHTML));
            match_release_year.push(parseInt(release_year[j].innerHTML));
        }

        for(let k = 0; match_km.length > k; k++)
        {
            if(isb(match_km[k], km_slider_1, km_slider_2) && isb(match_price[k], price_slider_1, price_slider_2) && isb(match_release_year[k], year_slider_1, year_slider_2))
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
};

// FONCTIONS DE LA PAGE cars.php - END

// NOTE POUR UN EVENTUEL USAGE FUTURE: AUTRE MANIERE DE RECUPERER LES DONNEES D'UNE 
// NODE LIST GENEREE PAR getElementsByClassName() SOUS FORME DE TABLEAU

// let prices = document.getElementsByClassName("price");
// let price_data = Array.from(prices);

const release_year = document.getElementsByClassName("release-year");
let cars_data = Array.from(release_year);

// for(let element of price_data)
// {
//     let price = parseInt(element.innerHTML);

//     if(price >= 10000 && price <= 140441)
//     {
//         console.log(price);
//     }
// }

for(let element of cars_data)
{
    let year = element.innerHTML;

    console.log(year);
}

// const min = document.getElementById("min-price").innerHTML;
// console.log(min);


