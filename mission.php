<?php include('includes/session.php'); ?>
<?php include('server.php'); ?>
<?php $page = 'mission'; include('includes/header.php'); ?>
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
            <button type="button" class="btnX" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
        </div>

        <div class="modal-body">

        <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="mission.php" method="POST">
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" name="nom_mission" require>
                            <label for="floatingInputGrid">Nom de la mission</label>
                        </div>
                    </div>
                <div class="col-md">
                    <div class="form-floating">
                        <select name="type" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" require>
                            <option selected>-- choisir --</option>
                            <option value="CDI">CDI</option>
                            <option value="CDD">CDD</option>
                            <option value="Alternance">Alternance</option>
                            <option value="Service Civique">Service Civique</option>
                            <option value="Stage">Stage</option>
                            <option value="Freelance">Freelance</option>
                            <option value="Travail">Travail intermittent</option>
                            <option value="Contrat saisonnier">Contrat saisonnier</option>
                            <option value="Benevolat">Benevolat</option>
                        </select>
                        <label for="floatingSelectGrid">Type de contrat</label>
                    </div>
                </div>
            </div><br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" name="date_debut" require>
                        <label for="floatingInputGrid">Date de début de mission</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="date" class="form-control" id="floatingInputGrid" name="date_fin" require>
                        <label for="floatingInputGrid">Date de fin de mission</label>
                    </div>
                </div>
            </div><br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" name="entreprise" require>
                        <label for="floatingInputGrid">Nom de l'entreprise</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" name="ville" require>
                        <label for="floatingInputGrid">Ville</label>
                    </div>
                </div>
            </div><br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                    <textarea class="form-control" name="desc_mission" id="floatingTextarea2" style="height: 100px" require></textarea>
                    <label for="floatingTextarea2">Description de la mission</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                    <select name="statut" class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" require>
                            <option selected> -- </option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                            <option value="Abandonné">Abandonné</option>
                        </select>
                        <label for="floatingSelectGrid">Statut</label>
                    </div>
                </div>
            </div><br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="time" class="form-control" id="floatingInputGrid" name="heure_debut" require>
                        <label for="floatingInputGrid">Heure de début</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating">
                        <input type="time" class="form-control" id="floatingInputGrid" name="heure_fin" require>
                        <label for="floatingInputGrid">Heure de fin</label>
                    </div>
                </div>
            </div><br>
            <div class="row g-2">
                <div class="col-md">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingInputGrid" name="montant" value="0" require>
                        <label for="floatingInputGrid">Rémuneration</label>
                    </div>
                </div>
            </div>
                <br><br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="add_mission" class="btn btn-primary">Ajouter</button>
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

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
            <!-- si la mission à été ajouté avec success on ouvre une alerte avec alertiy JS -->
            <script>
                <?php if (isset($_SESSION['message'])) { ?>
                    alertify.set('notifier','position', 'top-center');
                    alertify.success('<?= $_SESSION['message']; ?>');
                <?php } ?>
            </script>
                        
                

<div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Nom de la mission</th>
            <th scope="col">Date de début</th>
            <th scope="col">Date de fin</th>
            <th scope="col">Statut</th>
            <th scope="col">Rémuneration (€)</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        <tbody>
        <?php
            $id = $_SESSION['id'];
            $query = "SELECT * FROM missions WHERE id_user = $id";
            $query_run = mysqli_query($connection, $query);
            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
        ?>
        <tr>
            <td><?php echo $row['nom_mission']; ?></td>
            <td><?php echo $row['date_debut']; ?></td>
            <td><?php echo $row['date_fin']; ?></td>
            <td><?php echo $row['statut']; ?></td>
            <td><?php echo $row['montant']; ?></td>
            <td>
                <a href="edit_mission.php?id=<?php echo $row['id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                <a href="delete_mission.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
                }
            } else {
                echo "Aucune mission n'a été trouvé";
            }
        ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>
</body>
</html>
