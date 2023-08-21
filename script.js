document.addEventListener("click", function (e) 
{
    if (e.target.classList.contains("edition"))
    {
        let session = "$_SESSION['user_id'] = ";
        let user_id = e.target.id;
        data = session.concat(user_id, ';');
        // console.log(data);
        localStorage.setItem('data', data);
    }
})

let result = document.getElementById('result');

result.innerHTML = localStorage.getItem('data');

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

