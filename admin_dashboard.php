<?php $page_title = 'admin'; ?>

<?php
    require_once 'templates/header.php';
    require_once 'templates/navbar.php';
    require_once 'functions.php';
?>

<?php
    if(isset($_POST['SCHEDULES_UPDATE']))
    {
        $monday_morning = htmlspecialchars($_POST['monday-morning']);
        $monday_afternoon = htmlspecialchars($_POST['monday-afternoon']);

        if(!empty($monday_morning))
        {
            update('schedules', 'id', '1', 'morning', $monday_morning);
        }

        if(!empty($monday_afternoon))
        {
            update('schedules', 'id', '1', 'afternoon', $monday_afternoon);
        }

        $tuesday_morning = htmlspecialchars($_POST['tuesday-morning']);
        $tuesday_afternoon = htmlspecialchars($_POST['tuesday-afternoon']);

        if(!empty($tuesday_morning))
        {
            update('schedules', 'id', '2', 'morning', $tuesday_morning);
        }

        if(!empty($tuesday_afternoon))
        {
            update('schedules', 'id', '2', 'afternoon', $tuesday_afternoon);
        }

        $wednesday_morning = htmlspecialchars($_POST['wednesday-morning']);
        $wednesday_afternoon = htmlspecialchars($_POST['wednesday-afternoon']);

        if(!empty($wednesday_morning))
        {
            update('schedules', 'id', '3', 'morning', $wednesday_morning);
        }

        if(!empty($wednesday_afternoon))
        {
            update('schedules', 'id', '3', 'afternoon', $wednesday_afternoon);
        }

        $thursday_morning = htmlspecialchars($_POST['thursday-morning']);
        $thursday_afternoon = htmlspecialchars($_POST['thursday-afternoon']);

        if(!empty($thursday_morning))
        {
            update('schedules', 'id', '4', 'morning', $thursday_morning);
        }

        if(!empty($thursday_afternoon))
        {
            update('schedules', 'id', '4', 'afternoon', $thursday_afternoon);
        }

        $friday_morning = htmlspecialchars($_POST['friday-morning']);
        $friday_afternoon = htmlspecialchars($_POST['friday-afternoon']);

        if(!empty($friday_morning))
        {
            update('schedules', 'id', '5', 'morning', $friday_morning);
        }

        if(!empty($friday_afternoon))
        {
            update('schedules', 'id', '5', 'afternoon', $friday_afternoon);
        }

        $saturday_morning = htmlspecialchars($_POST['saturday-morning']);
        $saturday_afternoon = htmlspecialchars($_POST['saturday-afternoon']);

        if(!empty($saturday_morning))
        {
            update('schedules', 'id', '6', 'morning', $saturday_morning);
        }

        if(!empty($saturday_afternoon))
        {
            update('schedules', 'id', '6', 'afternoon', $saturday_afternoon);
        }

        $sunday_morning = htmlspecialchars($_POST['sunday-morning']);
        $sunday_afternoon = htmlspecialchars($_POST['sunday-afternoon']);

        if(!empty($sunday_morning))
        {
            update('schedules', 'id', '7', 'morning', $sunday_morning);
        }

        if(!empty($sunday_afternoon))
        {
            update('schedules', 'id', '7', 'afternoon', $sunday_afternoon);
        }

        unset($_POST['SCHEDULES_UPDATE']);
    }
?>

<main>

    <!-- <div class="main">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi asperiores quas nobis in voluptas sequi tempore sunt, perspiciatis quibusdam vero. Labore, obcaecati ipsam error cumque harum cupiditate exercitationem sunt accusantium.
            Tenetur modi beatae labore repellendus totam commodi, dicta a quo accusamus rerum perspiciatis magnam enim. Iure non iste aspernatur harum, provident ad error odio, laboriosam nemo qui sint possimus amet!
            Magnam at officia error rem minima ipsa officiis deleniti harum consequuntur dolorem voluptate dolorum recusandae ut aliquid placeat impedit voluptatem, numquam quam eaque possimus adipisci omnis dolores repellendus. Veniam, asperiores?
            Mollitia officia aperiam sint, minima ab fugit provident. Reiciendis quod, magnam accusantium nisi labore aliquid perspiciatis a expedita exercitationem, adipisci sed corporis obcaecati deleniti minima quasi et veritatis sint. Tempora!
            Placeat obcaecati veniam eum odit laudantium modi nostrum animi necessitatibus, libero consectetur vel quaerat ex alias reiciendis impedit illum suscipit maiores voluptate unde nulla repellendus nemo molestias a voluptas. Alias.
            Voluptates doloremque at quia autem aut dolor ipsum porro inventore fugiat, in quidem officia incidunt doloribus tempore, distinctio facere natus, illum explicabo nostrum magnam odio quos? Laudantium natus beatae sint.
            Sunt maxime vel dolorum deserunt consequatur sapiente, quae officiis assumenda delectus odio cum quod labore iusto temporibus, perferendis pariatur laboriosam, magni ut alias enim eveniet tenetur! Eius voluptas ipsam assumenda.
            Aperiam in suscipit error quas dolorum eum nam, dolorem iure amet, saepe numquam, maxime enim unde! Cupiditate magni maxime impedit, laborum ullam harum debitis, voluptates natus aliquam sequi nisi? At.
            Deleniti laudantium explicabo harum quas provident perspiciatis iure, reiciendis minima aut consectetur dignissimos! Deserunt qui distinctio porro ipsum aperiam velit sunt rem. Aliquam odit non iste error laboriosam quisquam ut!
            Quo tenetur error ut iusto? Libero cupiditate perspiciatis velit, alias ab laudantium ipsa, quod vitae ea suscipit neque placeat eaque obcaecati rerum quos animi consequatur sit necessitatibus tempore voluptates debitis.
            Quasi sunt ad, sit maxime quae dicta voluptatibus fuga commodi nulla voluptates, in laudantium maiores obcaecati ullam libero magni eum delectus! Ut fugit sapiente corrupti cum quae explicabo voluptatum facilis?
            A vitae accusantium tempora sint quia ipsam, ducimus dolor sunt reprehenderit soluta et. Nam enim optio tenetur distinctio eligendi. At facilis voluptate saepe rerum culpa eum consequuntur, rem totam dolorum?
            Rem, sequi pariatur, corporis laboriosam temporibus mollitia aperiam, perferendis animi maiores nisi magni id non. Adipisci, cum, excepturi illum accusamus mollitia expedita nobis ab ratione quo et nostrum cupiditate labore.
            Cum qui molestias, ex doloremque rem distinctio corrupti. Nulla ex exercitationem similique dolore explicabo, provident maxime suscipit repudiandae doloribus veritatis ut. Ipsum praesentium suscipit aspernatur impedit nulla animi, explicabo laborum!
            Unde quidem, quam est incidunt vitae impedit cupiditate aliquam libero ratione ex aperiam doloribus soluta reprehenderit maxime, minus ducimus, nam rem in consectetur. Sunt quidem est voluptatibus, natus quis laudantium.
            Animi, quod velit. Corrupti laboriosam soluta odio voluptas aperiam labore animi culpa, quidem tenetur, aspernatur facilis! Iure necessitatibus, impedit at unde error aspernatur ut sint dolorem tempore quam? Vitae, minus.
            Molestiae, doloremque? Rerum adipisci dicta pariatur, nostrum deserunt iusto dolorem eaque vel aliquam numquam velit enim quos commodi exercitationem nam iure a nulla voluptate earum! Error debitis qui temporibus quos?
            Modi, expedita reiciendis quasi amet eligendi vitae fuga? Quos ut libero accusantium fugit praesentium quia similique, aspernatur commodi. Nihil consequuntur rem architecto sunt culpa ratione sit voluptas enim illum exercitationem.
            Reprehenderit aliquid libero delectus dolorum eos hic ipsum ipsa veritatis debitis enim nihil natus earum voluptates ullam, magni nobis sapiente dignissimos placeat mollitia ratione adipisci quae? Harum illum architecto nihil.
            Architecto nobis ut id distinctio, ipsam repellat temporibus ad vero eos a optio porro esse culpa earum quos unde. Libero, cumque rerum. Illo expedita molestiae exercitationem, quam libero architecto nostrum.
            Ut excepturi quasi corporis at molestias unde, rerum quidem ea aliquam reiciendis quo modi dolore nemo. Cumque numquam incidunt quod suscipit odit perferendis possimus obcaecati cum repellendus, rerum doloribus molestiae?
            Illum, pariatur voluptates sit odit quasi quod est in nulla, possimus maxime quia optio a incidunt atque nisi vitae voluptatem! Inventore labore vitae natus obcaecati voluptate nesciunt alias facere magni?
            Distinctio quibusdam ipsum repudiandae facere debitis laudantium! Non cupiditate, at velit optio dolores ex id! Recusandae magni optio ipsam nam tenetur doloremque? Beatae unde recusandae possimus voluptate, ut perspiciatis ex!
            Quos hic molestiae porro natus numquam repellat eum ad, maiores atque! Earum sequi laboriosam eos illum exercitationem unde ducimus totam nisi quidem, quos fugiat. Veritatis dicta repellendus dolor impedit unde.
            Necessitatibus nesciunt iusto molestias maxime ad similique ipsum eligendi, vitae voluptate optio expedita fugiat cumque odit ipsam placeat nulla sed beatae dolorum quaerat alias numquam adipisci asperiores voluptatum ipsa? Dolore!
            Laudantium quo quod aliquam? Unde, mollitia. Blanditiis commodi voluptates at veritatis, nostrum repudiandae eum tenetur soluta laboriosam, corrupti est a alias non debitis recusandae libero rem ut quia similique esse!
            Laboriosam, impedit voluptatem repellat quis totam dolorum maiores, repellendus dicta modi corrupti deserunt? Voluptas impedit eligendi minus quae fugit? Debitis dolores omnis modi alias impedit numquam a recusandae accusantium commodi?
            Similique, incidunt molestiae reprehenderit veritatis consectetur consequuntur illo error nihil dolorem impedit dolorum, enim quaerat commodi earum quidem dolor dolore saepe voluptate nisi nulla voluptas quam aut praesentium eos. Ipsum?
            Omnis, distinctio? Ut, iusto enim iste repudiandae deserunt assumenda corporis maxime reiciendis aperiam aut sapiente odit consectetur beatae nesciunt earum quibusdam cupiditate amet, ipsum placeat a odio totam id? Facilis?
            Numquam, veniam vel iure nisi similique fugit dicta minus cum blanditiis, perspiciatis dolores qui omnis deserunt et autem odit aliquid consequuntur alias dolorem voluptates ut? Earum qui eos nesciunt maiores.
            Possimus excepturi consequuntur praesentium distinctio provident voluptatibus fugit quas, quam vel rerum debitis aspernatur odit at eveniet ut ab soluta facere nisi magnam. Dolorem architecto consectetur quas totam voluptatum soluta.
            Veritatis vitae itaque, tempora explicabo tenetur assumenda voluptatum maiores dignissimos deleniti totam aliquid consequatur vero eligendi qui sit incidunt laudantium adipisci repellendus provident! Iste aliquid beatae nisi eos dicta molestias!
            In nobis quod accusamus deserunt, repellat blanditiis consequatur maiores soluta quam architecto, vitae ab fugiat, debitis minus doloremque saepe perspiciatis earum adipisci eum asperiores quas laborum! Voluptates autem rem officiis.
            Laborum labore soluta excepturi repellendus ullam mollitia numquam unde cupiditate, facilis odio sit reiciendis et asperiores porro, eius blanditiis libero minus corporis incidunt. Nam nulla inventore obcaecati laborum neque eos?
            Laudantium blanditiis temporibus qui impedit, sit magni quaerat commodi nemo non placeat enim amet. Ullam fugiat expedita nihil cum? Nulla voluptates ipsa voluptatum quis assumenda nihil facere aut consequatur quia.
            Velit, sapiente? Corrupti dolore nemo fugit doloremque ad perferendis rerum neque facere suscipit. Sunt voluptatem provident beatae adipisci voluptates quasi architecto voluptatibus doloribus iusto perferendis! Quaerat natus placeat repudiandae eos!
            Dolores minus rerum eum explicabo ab vitae ut veritatis aliquam numquam provident natus voluptatibus eveniet eaque, harum optio inventore reiciendis saepe ea dicta expedita consequatur dolorum quos quibusdam. Perferendis, beatae.
            Optio consequatur, veniam eveniet eum natus tenetur, quia ad ex velit illo labore porro, tempore dolores. Architecto minus voluptatem, alias quisquam soluta illum necessitatibus sequi deserunt aliquam quos, dicta repellat!
            Porro inventore laborum quaerat. Repellendus cumque consequuntur est delectus, dolores nam quam explicabo veniam similique corrupti. Quos laudantium dolorum harum, eius, sit pariatur deserunt saepe eligendi porro, architecto voluptate dolores?
            Rem dolor ipsam assumenda nesciunt optio molestias minus voluptatum, cumque, explicabo fuga placeat corporis. Quam, libero consequatur molestias reprehenderit laboriosam, enim quia obcaecati atque, sit voluptas dolores soluta suscipit deserunt.
        </p>
    </div> -->

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="pt-2 text-align text-center">ADMINISTRATION DU SITE</h5>
                        </div>
                        <div class="card-body">

                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-flex justify-content-start"><span class="material-symbols-outlined">group</span>&nbsp;GESTION DES UTILISATEURS</a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="add_user.php" class="btn btn-success text-white">AJOUTER UN UTILISATEUR</a><br />
                                            <a href="admin_panel.php" class="btn btn-primary text-white mt-2">GÉRER LES UTILISATEURS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES AVIS</a>
                                        </h5>
                                    </div>

                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="#" class="btn btn-primary text-white">GÉRER LES AVIS</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="material-symbols-outlined">today</span>&nbsp;GESTION DES HORAIRES</a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">

                                        <form action="dashboard.php" method="POST">

                                            <div class="form-group my-3 mx-3" >

                                                <label class="btn btn-info">LUNDI</label>
                                                <input type="text" name="monday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="monday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control mb-3">

                                                <label class="btn btn-info">MARDI</label>
                                                <input type="text" name="tuesday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="tuesday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">MERCREDI</label>
                                                <input type="text" name="wednesday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="wednesday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">JEUDI</label>
                                                <input type="text" name="thursday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="thursday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">VENDREDI</label>
                                                <input type="text" name="friday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="friday-afternoon" placeholder="APRES-MIDI - Exemple : 14:00 - 18:00" class="form-control my-3">

                                                <label class="btn btn-info">SAMEDI</label>
                                                <input type="text" name="saturday-morning" placeholder="MATINÉE - Exemple : 08:45 - 12:00" class="form-control my-3">
                                                <input type="text" name="saturday-afternoon" placeholder="APRES-MIDI - Exemple : Fermé" class="form-control my-3">

                                                <label class="btn btn-info">DIMANCHE</label>
                                                <input type="text" name="sunday-morning" placeholder="MATINÉE - Exemple : Fermé" class="form-control my-3">
                                                <input type="text" name="sunday-afternoon" placeholder="APRES-MIDI - Exemple : Fermé" class="form-control my-3">

                                                <div class="text-center my-4">
                                                    <button type="submit" name="SCHEDULES_UPDATE" value="schedules_update" class="btn btn-primary">ENREGISTRER</button>
                                                </div>

                                            </div>

                                        </form>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            <a class="collapsed d-flex justify-content-start" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span class="material-symbols-outlined">comment</span>&nbsp;GESTION DES VEHICULES</a>
                                        </h5>
                                    </div>

                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            <a href="#" class="btn btn-primary text-white">GÉRER LES VEHICULES</a><br />
                                            <a href="#" class="btn btn-primary text-white mt-2">GÉRER LA GALERIE D'IMAGES</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once 'templates/footer.php'; ?>