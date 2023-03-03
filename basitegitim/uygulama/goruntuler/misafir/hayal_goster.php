<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <!-- proje_yaziect Details Go Here -->
                <h2 class="text-uppercase"><?php echo $veri["hayal_yazi"]["baslik"] ?></h2>
                <p class="item-intro text-muted"><?php echo $veri["hayal_yazi"]["k_baslik"] ?></p>
                <img class="img-fluid d-block mx-auto" src="<?php echo KAYNAK ?>resimler/<?php echo $veri["hayal_yazi"]["resimler"] ?>" alt="">
                <p><?php echo ($veri["hayal_yazi"]["icerik"]) ?> </p>
                <ul class="list-inline">
                    <li>Tarih: <?php echo FUNC::tarih("yaz", $veri["hayal_yazi"]["eklenme_tarih"]) ?></li>

                    <li>Katagori: <?php echo FUNC::kategoriler()[$veri["hayal_yazi"]["kategori"]]; ?></li>
                </ul>
                <a href="<?php echo ANA_DIZIN ?>"> <button class="btn btn-success" type="button">

                        Geri Gel</button></a>
            </div>
        </div>
    </div>
</div>