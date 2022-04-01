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

<div class="container">

    <div class="row mt-4">

        <div class="col-md-8 curso">

            <h3 class="nomeCurso"><?= mb_strtoupper($curso->nome) ?></h3>
            <p><?= $curso->sobre_o_curso ?></p>
            <h2> <i class="bx bxs-bookmark"></i> O QUE VOCÊ VAI APRENDER</h2>

            <!--  -->
            <?php if (!empty($curso->objetivo_geral)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseObjetivoGeral" role="button" aria-expanded="true" aria-controls="collapseObjetivoGeral">OBJETIVO GERAL</h4>
                <div class="collapse show" id="collapseObjetivoGeral">
                    <div class="card card-body">
                        <?= $curso->objetivo_geral ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->objetivos_especificos)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseObjetivosEspecifico" role="button" aria-expanded="true" aria-controls="collapseObjetivosEspecifico">OBJETIVO ESPECÍFICOS</h4>
                <div class="collapse show" id="collapseObjetivosEspecifico">
                    <div class="card card-body">
                        <?= $curso->objetivos_especificos ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->habilidades_competencias)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseHabilidadesCompetencias" role="button" aria-expanded="true" aria-controls="collapseHabilidadesCompetencias">HABILIDADES E COMPETÊNCIAS</h4>
                <div class="collapse show" id="collapseHabilidadesCompetencias">
                    <div class="card card-body">
                        <?= $curso->habilidades_competencias ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->competencias_profissionalizantes)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseCompetenciasProfissionalizantes" role="button" aria-expanded="true" aria-controls="collapseCompetenciasProfissionalizantes">COMPETÊNCIAS PROFISSIONALIZANTES</h4>
                <div class="collapse show" id="collapseCompetenciasProfissionalizantes">
                    <div class="card card-body">
                        <?= $curso->competencias_profissionalizantes ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->area_atuacao)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseAreaDeAtuacao" role="button" aria-expanded="true" aria-controls="collapseAreaDeAtuacao">ÁREA DE ATUAÇÃO</h4>
                <div class="collapse show" id="collapseAreaDeAtuacao">
                    <div class="card card-body">
                        <?= $curso->area_atuacao ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->perfil_profissional)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapsePerfilProfissional" role="button" aria-expanded="true" aria-controls="collapsePerfilProfissional">PERFIL PROFISSIONAL</h4>
                <div class="collapse show" id="collapsePerfilProfissional">
                    <div class="card card-body">
                        <?= $curso->perfil_profissional ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->investimento)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseInvestimento" role="button" aria-expanded="true" aria-controls="collapseInvestimento">INVESTIMENTO</h4>
                <div class="collapse show" id="collapseInvestimento">
                    <div class="card card-body">
                        <?= $curso->investimento ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->coordenacao)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseCoordenacao" role="button" aria-expanded="true" aria-controls="collapseCoordenacao">COORDENAÇÃO</h4>
                <div class="collapse show" id="collapseCoordenacao">
                    <div class="card card-body">
                        <?= $curso->coordenacao ?>
                    </div>
                </div>
            <?php endif; ?>

            <!--  -->
            <?php if (!empty($curso->diferenciais)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseDiferenciais" role="button" aria-expanded="true" aria-controls="collapseDiferenciais">DIFERENCIAIS</h4>
                <div class="collapse show" id="collapseDiferenciais">
                    <div class="card card-body">
                        <?= $curso->diferenciais ?>
                    </div>
                </div>
            <?php endif; ?>
            <!--  -->
            <?php if (!empty($curso->publico_alvo)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapsePublicoAlvo" role="button" aria-expanded="true" aria-controls="collapsePublicoAlvo">PÚBLICO ALVO</h4>
                <div class="collapse show" id="collapsePublicoAlvo">
                    <div class="card card-body">
                        <?= $curso->publico_alvo ?>
                    </div>
                </div>
            <?php endif; ?>
            <!--  -->
            <?php if (!empty($curso->matriz)) : ?>
                <h4 data-bs-toggle="collapse" href="#collapseMatriz" role="button" aria-expanded="true" aria-controls="collapseMatriz">MATRIZ</h4>
                <div class="collapse show" id="collapseMatriz">
                    <div class="card card-body">
                        <?= $curso->matriz ?>
                    </div>
                </div>
            <?php endif; ?>
            <!--  -->
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
                <form action="<?=SITE['root']?>/form-submission" method="POST">

                <input type="hidden" name="typeForm" value="Matrícula">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="phone" class="form-control" name="telefone">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="ciente" name="ciente">
                        <label class="form-check-label" for="ciente">Li e aceito os <a href="#">termos de política de privacidade e responsabilidade</a> da Pós-Graduação FAAM.</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Matricula-se já</button>
                    </div>
                    <p class="text-center"><a href="#"> <i class="bx bxl-whatsapp"></i> Dúvidas ? Fale com a gente pelo Whatsapp</a></p>
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