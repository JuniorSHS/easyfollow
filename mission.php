<?php include('includes/session.php'); ?>
<?php include('server.php'); ?>
<?php include('includes/header.php'); ?>
<body>
<div class="container-fluid position-relative d-flex p-0">
    <?php include('includes/spinner.php'); ?>
    <?php include('includes/sidebar.php'); ?>
<!-- Style Custom.css -->
<link href="css/custom.css" rel="stylesheet">

    <!-- Content Start et Navbar -->
<div class="content">


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une mission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="mission.php" method="POST">
                        
                        <div class="row g-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingInputGrid" placeholder="name@example.com" value="">
                                    <label for="floatingInputGrid">Nom de la mission</label>
                                </div>
                            </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected>-- choisir --</option>
                                    <option value="1">CDI</option>
                                    <option value="2">CDD</option>
                                    <option value="3">Alternance</option>
                                    <option value="4">Service Civique</option>
                                    <option value="5">Stage</option>
                                    <option value="6">Freelance</option>
                                    <option value="7">Travail intermittent</option>
                                    <option value="8">Contrat saisonnier</option>
                                    <option value="9">Benevolat</option>
                                </select>
                                <label for="floatingSelectGrid">Type de contrat</label>
                            </div>
                        </div>
                    </div><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="mdo@example.com" value="">
                                <label for="floatingInputGrid">Date de début de mission</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="mdo@example.com" value="">
                                <label for="floatingInputGrid">Date de fin de mission</label>
                            </div>
                        </div>
                    </div><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="mdo@example.com" value="">
                                <label for="floatingInputGrid">Nom de l'entreprise</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInputGrid" placeholder="mdo@example.com" value="">
                                <label for="floatingInputGrid">Ville</label>
                            </div>
                        </div>
                    </div><br>
                    <div class="row g-2">
                        <div class="col-md">
                            <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Description de la mission</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating">
                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                                    <option selected> -- </option>
                                    <option value="1">En cours</option>
                                    <option value="2">Terminé</option>
                                    <option value="3">Abandonné</option>
                                </select>
                                <label for="floatingSelectGrid">Status</label>
                            </div>
                        </div>
                    </div>


                        <br><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>

                    </form>
                </div>
        </div>
    </div>
</div>





    <?php include('includes/navbar.php'); ?>
           <!-- afficher le titre de la page au milieu "Mes Missions" -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <h1><center>Mes Missions</center></h1>
                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- afficher les missions dans un tableau bootstrap avec des valeurs d'exemple -->

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nom de la mission</th>
                                <th scope="col">Date de début</th>
                                <th scope="col">Date de fin</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Nom de la mission">Exemple</td>
                                <td data-label="Date de début">Exemple</td>
                                <td data-label="Date de fin">Exemple</td>
                                <td data-label="Statut">Exemple</td>
                                <td data-label="Action">
                                <a href="#" class="btn btn-primary"><i class="fa fa-book"></i></a>
                                <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
</body>
</html>
