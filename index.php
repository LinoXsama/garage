<?php
    $page_title = 'Accueil';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
?>

<main>

    <div id="search" class="container mt-4 d-flex justify-content-center">
        <form role="search">
            <input
                type="search"
                class="form-control form-control-dark"
                placeholder="Chercher un véhicule"
                aria-label="Search"
            />
        </form>
    </div>

    <div class="container mt-2">
        <form class="d-flex justify-content-around">

            <div class="">
                <label class="d-inline-block">Kilométrage</label>
                <input 
                    type="range"
                    min="0"
                    max="100"
                    step="1"
                    value="0"
                    class="d-block mb-2 custom-slider"
                />
                <span class="">177 220 km - 267 220 km</span>
                <button class="reset-btn">Réinitialiser</button>
            </div>

            <div class="">
                <label class="d-inline-block">Prix</label>
                <input 
                    type="range"
                    min="0"
                    max="100"
                    step="1"
                    value="0"
                    class="d-block mr-5"
                />
                <span class="ml-5">177 220 km - 267 220 km</span>
                <button class="reset-btn">Réinitialiser</button>
            </div>

            <div class="">
                <label class="d-inline-block">Année</label>
                <input 
                    type="range"
                    min="0"
                    max="100"
                    step="1"
                    value="0"
                    class="d-block mr-5"
                />
                <span class="ml-5">177 220 km - 267 220 km</span>
                <button class="reset-btn">Réinitialiser</button>
            </div>

        </form>
    </div>

    <div id="cars-container" class="container mt-4 mb-4 pt-4">

        <div class="row row-cols-1 row-cols-md-3 g-4 pb-4">

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">10 000 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">10 000 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">10 000 €</span>
                    <img src="img/v4.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">10 000 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v5.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Mitsubishi Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">10 000 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark" id="price-tag">140 441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : </span>122 000 <span>km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">140 441 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</main>

<?php require_once 'templates/footer.php'; ?>