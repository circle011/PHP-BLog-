<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="modal-body">
                <!-- proje_yaziect Details Go Here -->
                <h2 class="text-uppercase"><?php echo $veri["ideal_yazi"]["baslik"] ?></h2>
                <p class="item-intro text-muted"><?php echo $veri["ideal_yazi"]["k_baslik"] ?></p>
                <img class="img-fluid d-block mx-auto" src="<?php echo KAYNAK ?>resimler/<?php echo $veri["ideal_yazi"]["resimler"] ?>" alt="">
                <p><?php echo ($veri["ideal_yazi"]["icerik"]) ?> </p>
                <ul class="list-inline">
                    <li>Tarih: <?php echo FUNC::tarih("yaz", $veri["ideal_yazi"]["eklenme_tarih"]) ?></li>

                    <li>Katagori: <?php echo FUNC::kategoriler()[$veri["ideal_yazi"]["kategori"]]; ?></li>
                </ul>
                <p>Yorum Yazısı : <?php print_r($veri["yorum"]["yorum"]) ?></p>
                <!-- yorum yapma -->
                <div class="mt-3">


                    <form method="POST" id="yorum" >
                        <!-- current #{user} avatar -->
                        <div class="input_comment" style="width: 380px;">
                            <input class="form-control" type="text" id="kullanici_ad" name="kullanici_ad" placeholder="Kullanıcı Adı">
                        </div>
                        <div class="input_comment" style="width: 390px;">
                            <input class="form-control mt-3" type="mail" id="mail" name="mail" placeholder="Mail Adresi">
                        </div>
                        <div class="input_comment">
                            <textarea class="form-control mt-3" type="text" id="yorum_text" name="yorum" placeholder="Yorumunuz.."></textarea>
                            <input  class="form-control mt-3" type="hidden" name="icerik_id" value="<?php echo $icerikgetir['id']; ?>">
                            <input  class="form-control mt-3" type="hidden" id="yorum_alt" name="yorum_alt" 
                              value="<?php if (isset($_GET["comment"])) {echo $_GET['comment']; }  ?>">
                        </div>
                        <div class="input_comment">
                            <input class="btn btn-primary btn-block mt-3" type="button" name="ekle" id="ekle"  value="Yorum Yap">
                        </div>
                    </form>
                </div>
                <a href="<?php echo ANA_DIZIN ?>"> <button class="btn btn-success mt-3" type="button">

                        Geri Gel</button></a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   
	
</script>