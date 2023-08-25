<?php
    $page_title = 'Nos véhicules';
?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
?>

<main>
    <!-- BARRE DE RECHERCHE - START -->
    <div id="search" class="container mt-4 d-flex justify-content-center">
        <form role="search">
            <input
                id="search-bar"
                class="form-control form-control-dark"
                type="search"
                placeholder="Cherchez par marque, modèle, année de sortie, nombre de chevaux"
                aria-label="Search"
                oninput="search_bar()"
            />
        </form>
    </div>
    <!-- BARRE DE RECHERCHE - END -->

    <!-- FILTRES DE RECHERCHE PAR CRITERES : KILOMETRAGE, PRIX, ANNEES - START -->
    <div class="container mt-2">
        <form class="d-flex justify-content-around">

            <div class="" style="border: 1px solid crimson">
                <label class="d-block">Kilométrage</label>
                <div class="d-flex">
                    <input 
                        type="range"
                        min="177220"
                        max="222220"
                        step="1"
                        value="177220"
                        id="km-slider-1"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                    <input 
                        type="range"
                        min="222221"
                        max="267220"
                        step="1"
                        value="267220"
                        id="km-slider-2"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                </div>
                <div class="ctn d-flex justify-content-between">
                    <span><span id="min-km">177220</span> km - <span id="max-km">267220</span> km</span>
                    <button id="reset-km-button" onclick="reset_km_slider()">Réinitialiser</button>
                </div>
            </div>

            <div class="" style="border: 1px solid crimson">
                <label class="d-block">Prix</label>
                <div class="d-flex">
                    <input 
                        type="range"
                        min="4790"
                        max="6990"
                        step="1"
                        value="4790"
                        id="price-slider-1"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                    <input 
                        type="range"
                        min="6991"
                        max="9190"
                        step="1"
                        value="9190"
                        id="price-slider-2"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                </div>

                <div class="ctn d-flex justify-content-between">
                    <span>
                        <span id="min-price">4790</span> € - <span id="max-price">9190</span> €
                    </span>
                    <button>Réinitialiser</button>
                </div>
            </div>

            <div class="" style="border: 1px solid crimson">
                <label class="d-block">Années</label>
                <div class="d-flex">
                    <input 
                        type="range"
                        min="2001"
                        max="2005"
                        step="1"
                        value="2001"
                        id="year-slider-1"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                    <input 
                        type="range"
                        min="2006"
                        max="2010"
                        step="1"
                        value="2010"
                        id="year-slider-2"
                        class="d-inline-block"
                        oninput="search_sliders()"
                    />
                </div>
                <div class="ctn d-flex justify-content-between">
                    <span>
                        <span id="min-year">2001</span> - <span id="max-year">2010</span>
                    </span>
                    <button>Réinitialiser</button>
                </div>
            </div>

        </form>
    </div>
    <!-- FILTRES DE RECHERCHE PAR CRITERES : KILOMETRAGE, PRIX, ANNEES - END -->

    <div id="cars-container" class="container mt-4 mb-4 pt-4">

        <div class="row row-cols-1 row-cols-md-3 g-4 pb-4">

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">10000 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">177220</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">15000 €</span>
                    <img src="img/v4.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Ferrari Stellar 1996 100 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">267220</span> km</span></li>
                            
                        </ul>
                    </div>
                    <div class="card-footer custom-footer">
                        <div class="float-start">
                            <h4 class="custom-highlight">15000 €</h4>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-dark rounded-3 custom-btn">DÉTAILS</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v5.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">BMW i5 2018 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span >Kilométrage : <span class="kilometrage-tag">80000</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Mitsubishi Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">75000</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">113000</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">54020</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">10000 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">54325</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">25630</span> km</span></li>
                            
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

            <div class="car col">
                <div class="card h-100 shadow custom-card">
                    <span class="btn btn-dark price" id="price-tag">140441 €</span>
                    <img src="img/v3.jpg" alt="" class="card-img-top w-100 custom-bg">
                    <div class="card-body">
                        <h4 class="card-title">Porsche Elantra 2016 120 CH</h4>
                        <ul class="card-text list-unstyled">
                            <li><span>Année : </span>2016</li>
                            <li><span>Type de moteur : </span>Diesel</li>
                            <li><span>Kilométrage : <span class="kilometrage-tag">175430</span> km</span></li>
                            
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