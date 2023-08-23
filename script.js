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

// Fonctions de la page cars.php - START

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

const search_slider = () => {

    const km_slider_1 = document.getElementById("km-slider-1").value;
    const km_slider_2 = document.getElementById("km-slider-2").value;
    const kilometrages = document.getElementsByClassName("kilometrage");
    // console.log('[', km_slider_1, ';', km_slider_2, ']');

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
                match[k].style.display = "";
            }
            else
            {
                match[k].style.display = "none"; 
            }
        }

    }

}

// Fonctions de la page cars.php - END