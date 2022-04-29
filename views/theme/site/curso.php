<?php $v->layout("theme/site/_theme"); ?>

<div class="container-fluid breadcrumb-faam">
    <div class="container">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?= buildBreadcrumb() ?>
            </ol>
        </nav>
    </div>
</div>

<?php if (!empty($curso->cover)) : ?>
    <div class="wrapInternalImage">
        <img class="img-responsive" src="<?= SITE['root'] . DS . $curso->cover ?>" alt="SEM IMAGEM">
    </div>
<?php endif; ?>

<div class="container">

    <div class="row mt-4">

        <div class="col-md-8 curso">

            <div class="row">

                <div class="col-md-2 text-center">
                    <?php if (!empty($curso->logo)) : ?>
                        <img class="img-fluid" src="<?= SITE['root'] . DS . $curso->logo ?>" alt="">
                    <?php else : ?>
                        <img class="img-fluid" src="<?= asset('images/favicon.png') ?>" alt="">
                    <?php endif; ?>
                </div>

                <div class="col-md-10">
                    <h3 class="nomeCurso"><?= mb_strtoupper($curso->nome) ?></h3>
                    <p><?= $curso->sobre_o_curso ?></p>
                </div>
            </div>

            <h2> <i class="bx bxs-bookmark"></i> O QUE VOCÊ VAI APRENDER</h2>

            <!--  -->
            <?php if (!empty($curso->sobre_o_curso)) : ?>
                <h4 data-bs-toggle="collapse" href="#cSobreCurso" role="button" aria-expanded="true" aria-controls="cSobreCurso">SOBRE O CURSO</h4>
                <div class="collapse show" id="cSobreCurso">
                    <div class="card card-body">
                        <?= $curso->sobre_o_curso ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->publico_alvo)) : ?>
                <h4 data-bs-toggle="collapse" href="#cPublicoAlvo" role="button" aria-expanded="true" aria-controls="cPublicoAlvo">PÚBLICO ALVO</h4>
                <div class="collapse show" id="cPublicoAlvo">
                    <div class="card card-body">
                        <?= $curso->publico_alvo ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->horarios)) : ?>
                <h4 data-bs-toggle="collapse" href="#cHorarios" role="button" aria-expanded="true" aria-controls="cHorarios">HORÁRIOS</h4>
                <div class="collapse show" id="cHorarios">
                    <div class="card card-body">
                        <?= $curso->horarios ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->duracao_do_curso)) : ?>
                <h4 data-bs-toggle="collapse" href="#cDuracaoCurso" role="button" aria-expanded="true" aria-controls="cDuracaoCurso">DURAÇÃO DO CURSO</h4>
                <div class="collapse show" id="cDuracaoCurso">
                    <div class="card card-body">
                        <?= $curso->duracao_do_curso ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->investimento)) : ?>
                <h4 data-bs-toggle="collapse" href="#cInvestimento" role="button" aria-expanded="true" aria-controls="cInvestimento">INVESTIMENTO</h4>
                <div class="collapse show" id="cInvestimento">
                    <div class="card card-body">
                        <?= $curso->investimento ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->parcerias)) : ?>
                <h4 data-bs-toggle="collapse" href="#cParcerias" role="button" aria-expanded="true" aria-controls="cParcerias">PARCERIAS</h4>
                <div class="collapse show" id="cParcerias">
                    <div class="card card-body">
                        <?= $curso->parcerias ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->documentacao_necessaria)) : ?>
                <h4 data-bs-toggle="collapse" href="#cDocNecessaria" role="button" aria-expanded="true" aria-controls="cDocNecessaria">DOCUMENTAÇÃO NECESSÁRIA</h4>
                <div class="collapse show" id="cDocNecessaria">
                    <div class="card card-body">
                        <?= $curso->documentacao_necessaria ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (!empty($curso->coordenacao)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseCoordenacao" role="button" aria-expanded="true" aria-controls="collapseCoordenacao">COORDENAÇÃO</h4>
                <div class="collapse show" id="collapseCoordenacao">
                    <div class="card card-body">
                        <?= $curso->coordenacao ?>
                    </div>
                </div>
            <?php endif; ?>
           
            <?php if (!empty($curso->matriz)) : ?>
                <h4 data-bs-toggle="collapse" href="#cMatriz" role="button" aria-expanded="true" aria-controls="cMatriz">MATRIZ CURRICULAR</h4>
                <div class="collapse show" id="cMatriz">
                    <div class="card card-body">
                        <?= $curso->matriz ?>
                    </div>
                </div>
            <?php endif; ?>

            <h4 data-bs-toggle="collapse" href="#collapseDocNormas" role="button" aria-expanded="true" aria-controls="collapseDocNormas">DOCUMENTOS E NORMAS</h4>
            <div class="collapse show" id="collapseDocNormas">
                <div class="card card-body">
                    <ul class="list-group">
                        <?php foreach ($anexos as $a) : ?>
                            <li class="list-group-item list-group-item-success"> <a target="_blank" href="<?= SITE['root'] . DS . $a->arquivo ?>"> <?= $a->nome ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-4">

            <div class="wrapForm">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center"><b>Dê o próximo passo na sua carreira</b></h5>
                        <hr>
                    </div>
                </div>
                <div class="login_form_callback"> <?= flash(); ?></div>
                <form action="<?= SITE['root'] ?>/form-submission" method="POST">

                    <input type="hidden" name="typeForm" value="Matrícula">
                    <input type="hidden" style="pointer-events:none" class="form-control" name="curso" value="<?= mb_strtoupper($curso->nome) ?>">

                    <div class="mb-3">
                        <input type="text" class="form-control" name="nome" placeholder="Nome">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="E-mail">
                    </div>
                    <div class="mb-3">
                        <input type="phone" class="form-control" name="telefone" placeholder="Telefone">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ciente" name="ciente">
                        <label class="form-check-label" for="ciente" style="font-size:12px">Li e aceito os <a href="#">termos de política de privacidade e responsabilidade</a> da Pós-Graduação FAAM.</label>
                    </div>
                    <div class="d-grid">
                        <a href="<?= !empty($curso->link_inscricao) ? $curso->link_inscricao : "#" ?>" target="_blank" class="btn btn-lg btn-warning text-success"><b>INSCREVA-SE</b></a>
                    </div>
                    <br>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Receba mais informações</button>
                    </div>
                    <p class="text-center mt-2">
                        <a href="https://api.whatsapp.com/send?phone=5591991436058" target="_blank">
                            <i class="bx bxl-whatsapp"></i> Dúvidas ? Fale com a gente pelo Whatsapp
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container -->

<?php $v->start("scripts"); ?>
<script src="<?= asset("/js/jquery-ui.js"); ?>"></script>
<script src="<?= asset("/js/script.js"); ?>"></script>
<script src="<?= asset("/js/form.js"); ?>"></script>
<?php $v->end(); ?>