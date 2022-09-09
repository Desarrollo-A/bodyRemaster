<link href="<?= base_url("assets/js/fullcalendar/main.css")?>" rel="stylesheet" />
        <div class="container-fluid px-5 pt-5 pb-4">
            <div class="row">
                <div class="col-md-12" style="background-color: white;">
                    <div class="container">
                        <br>
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('template/footer'); ?>
        </div>
    </main><!-- Cierre de etiqueta MAIN que se encuentra en Sidebar -->

    <!--   Core JS Files   -->
    <?php $this->load->view('template/footerScripts'); ?>
    <script src="<?= base_url("assets/js/fullcalendar/main.js")?>"></script>
    <script src="<?= base_url("assets/js/fullcalendar/locales-all.js")?>"></script>
    <script src="<?=base_url()?>assets/js/controllers/agenda.js"></script>
</body><!-- Cierre de etiqueta BODY que se encuentra en Sidebar -->
</html><!-- Cierre de etiqueta HTML que se encuentra en Sidebar -->