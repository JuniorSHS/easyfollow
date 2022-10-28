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
    <?php include('includes/navbar.php'); ?>
           <!-- afficher le titre de la page au milieu "Mes Missions" -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <h1><center>Mes Missions</center></h1>
                <a href="#" class="btn btn-danger"><i class="fa fa-plus"></i></a>
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
