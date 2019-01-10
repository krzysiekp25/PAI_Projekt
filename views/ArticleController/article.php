<!DOCTYPE html>
<html lang="pl">

<?php include(dirname(__DIR__) . '/head.html'); ?>
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
        <div class="col-sm-1 sidenav">
            <?php include(dirname(__DIR__) . '/Template/topic_menu.php') ?>
        </div>
        <div class="col-sm-11 text-left">
            <?php
            /* @var $article Article */
            if (isset($article)) { ?>
            <h1><?php print($article->getTitle()) ?></h1>
            <?php ?>
            <p>
                <?php
                print('Utworzono: ' . date("m/d/Y G:i", strtotime($article->getAuditcd())));
                if ($article->getAuditcd() != $article->getAuditmd()) {
                    print('</br>Zmodyfikowano: ' . date("m/d/Y G:i", strtotime($article->getAuditmd())));
                }
                ?>
            </p>
            <hr>
            <div id="article" class="article">
                <p>
                    <?php
                    print($article->getContent());
                    ?>
                </p>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="container">
                <?php if($commentsExists || isset($_SESSION) && !empty($_SESSION)) {
                print('<h3>Komentarze</h3>');
                }?>
                <?php if (isset($_SESSION) && !empty($_SESSION)) { ?>
                    <form method="POST" id="commentForm">
                        <div class="form-group">
                        <textarea name="comment" id="comment" class="form-control" placeholder="Wpisz komentarz" rows="5"
                                  required></textarea>
                        </div>
                        <span id="message"></span>
                        <div class="form-group">
                            <input type="hidden" name="commentId" id="commentId" value="0"/>
                            <input type="submit" name="submit" id="submit" class="btn btn-primary"
                                   value="Zatwierdź"/>
                        </div>
                    </form>
                <?php } ?>
                <div id="showComments"></div>
            </div>
            <div id="output"></div>

        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <?php include(dirname(__DIR__) . '/Template/footer.php'); ?>
</footer>
<script src="/public/scripts/comments.js"></script>
</body>
</html>