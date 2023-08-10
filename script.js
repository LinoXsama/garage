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
});

let result = document.getElementById('result');

result.innerHTML = localStorage.getItem('data');

