<!DOCTYPE html>
<html lang="pl">

<?php include(dirname(__DIR__) . '/head.html'); ?>
<style>
    @media (min-width: 767px) {
        .field-label-responsive {
            padding-top: .5rem;
            text-align: right;
        }
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
            aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php include(dirname(__DIR__) . '/Template/menu.php') ?>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <?php include(dirname(__DIR__) . '/Template/login_panel.php') ?>
        </ul>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-12 text-middle">

            <h1>Dodaj temat</h1>
            <hr>
            <form class="form-horizontal" role="form" method="POST" action="?page=add_topic">
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="topic">Podaj temat</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fas fa-folder-plus"></i>
                                </div>
                                <input type="text" name="topicName" class="form-control" id="topicName"
                                       placeholder="Temat" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <?php if (isset($topicErrorMessage)): ?><i class="fas fa-times">
                                <?php print($topicErrorMessage) ?>
                                </i><?php endif; ?>
                        </span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Dodaj</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<footer class="container-fluid text-center">
    <?php include(dirname(__DIR__) . '/Template/footer.php'); ?>
</footer>

</body>
</html>