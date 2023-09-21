// MODAL DE SUPPRESSION D'UN UTILISATEUR - START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("user-item"))
    {
        const user_to_delete = e.target.getAttribute("name");
        document.querySelector(".user-name").innerHTML = user_to_delete;

        const user_id_to_delete = e.target.getAttribute("id");
        document.querySelector(".delete-btn").href = 'delete.php?id=' + user_id_to_delete;

        const deleteModal = new bootstrap.Modal(document.getElementById("delete-modal"));
        deleteModal.show();
    }
});
// MODAL DE SUPPRESSION D'UN UTILISATEUR - END

// MODAL DE SUPPRESSION D'UN COMMENTAIRE - START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("msg-item"))
    {
        const msg_author = e.target.getAttribute("name");
        document.querySelector(".msg-author").innerHTML = msg_author;

        const msg_date = e.target.getAttribute("data-target");
        document.querySelector(".msg-date").innerHTML = msg_date;

        const msg_id = e.target.getAttribute("id");
        document.querySelector(".msg-id").innerHTML = msg_id;

        document.querySelector(".delete-btn").href = 'delete_msg.php?id=' + msg_id;

        const deleteModal = new bootstrap.Modal(document.getElementById("msg-delete-modal"));
        deleteModal.show();
    }
});
// MODAL DE SUPPRESSION D'UN COMMENTAIRE - END

// MODAL DE SUPPRESSION D'UN VEHICULE - START
    document.addEventListener("click", function (e) {
        if(e.target.classList.contains("cars-item"))
        {
            const cars_id = e.target.getAttribute("id");
            document.querySelector(".cars-id").innerHTML = cars_id;

            const cars_name = e.target.getAttribute("name");
            document.querySelector(".cars-name").innerHTML = cars_name;

            const owner_name = e.target.getAttribute("data-target");
            document.querySelector(".cars-owner").innerHTML = owner_name;
        
            document.querySelector(".delete-btn").href = 'delete_cars.php?id=' + cars_id;

            const deleteModal = new bootstrap.Modal(document.getElementById("cars-delete-modal"));
            deleteModal.show();
        }
    });
// MODAL DE SUPPRESSION D'UN VEHICULE - END

// MODAL D'AFFICHAGE D'UN VEHICULE SUR LA PAGE cars.php - START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("gallery-item"))
    {
        const src = e.target.getAttribute("src");
        document.querySelector(".modal-img").src = src;

        const alt = e.target.getAttribute("alt");
        document.querySelector(".modal-img").alt = alt;

        const myModal = new bootstrap.Modal(document.getElementById("gallery-modal"));
        myModal.show();
    }
});
// MODAL D'AFFICHAGE D'UN VEHICULE SUR LA PAGE cars.php - END

// MODAL DE LA CONFIRMATION DE SUPPRESSION D'UN SERVICE - START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("service-item"))
    {
        const service_id = e.target.getAttribute("id");

        const service_name = e.target.getAttribute("name");
        document.querySelector(".service-name").innerHTML = service_name;

        document.querySelector(".delete-btn").href = 'services_delete.php?id=' + service_id;

        const myModal = new bootstrap.Modal(document.getElementById("service-delete-modal"));
        myModal.show();
    }
});
// MODAL DE LA CONFIRMATION DE SUPPRESSION D'UN SERVICE - END

// MODAL D'APERCU D'UN VEHICULE SUR les pages details.php et details_admin.php- START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("detail-item"))
    {
        const src = e.target.getAttribute("src");
        document.querySelector(".detail-img").src = src;

        const alt = e.target.getAttribute("alt");
        document.querySelector(".detail-img").alt = alt;

        const myModal = new bootstrap.Modal(document.getElementById("detail-modal"));
        myModal.show();
    }
});
// MODAL D'APERCU D'UN VEHICULE SUR LA PAGE details.php - END

// MODAL DE SUPPRESSION D'UNE IMAGE - START
document.addEventListener("click", function (e) {
    if(e.target.classList.contains("deletable-img"))
    {
        const path = e.target.getAttribute("src");
        const alt_text = e.target.getAttribute("alt");
        
        document.querySelector(".delete-preview-img").src = path;
        document.querySelector(".delete-preview-img").alt = alt_text;

        const car_id = e.target.getAttribute("id");
    
        document.querySelector(".delete-btn").href = 'delete_img.php?id=' + car_id + '&alt_text=' + alt_text + '&path=' + path;

        // document.querySelector(".t1").innerHTML = path;

        const deleteModal = new bootstrap.Modal(document.getElementById("img-delete-modal"));
        deleteModal.show();
    }
});
// MODAL DE SUPPRESSION D'UNE IMAGE - END

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

    // FONCTION QUI RENITIALISE LES SLIDERS DE RECHERCES - START
    const reset = () => {
        const resetButton = document.getElementsByClassName('reset-button');

        resetButton.addEventListener('click', function(event) {
            // Empêche le rechargement de la page
            event.preventDefault();

            // APPELLE LA FONCTION reset()
            reset();
        });
    };
    // FONCTION QUI RENITIALISE LES SLIDERS DE RECHERCES - END

    // SYSTEME DE NOTATION RATEYO - START
    $(function () 
    {
        $(".rateYo").rateYo({
            spacing: "6px"
        });

        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;

            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text(rating);
            $(this).parent().find('input[name=rating]').val(rating);

            var noteSpan = $(this).parent().siblings('label').find('.note');
            noteSpan.text(rating);
        });
    });
    // SYSTEME DE NOTATION RATEYO - END

// FONCTIONS DE LA PAGE cars.php - END