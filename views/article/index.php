<?php

require_once dirname(__DIR__, 1) . "/layouts/header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Articles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Articles</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <?php
        foreach ($articles as $article):
            ?>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $article->getTitle() ?></h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <?= $article->getFirstComment()->getText() ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= $article->getUser()->getFirstName() . " " . $article->getUser()->getLastName() . " - " .
                    $article->getDateTime()->format("d.m.Y H:i")
                     ?>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        <?php
        endforeach;
        ?>
    </section>
</div>
<?php

require_once dirname(__DIR__, 1) . "/layouts/footer.php";
?>
