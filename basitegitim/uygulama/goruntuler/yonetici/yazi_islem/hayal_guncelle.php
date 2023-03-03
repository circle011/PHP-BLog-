
<?php
$hayal = ($veri["hayal"]);
?>
<div class="card-body">
  <h4 class="card-title">hayal guncelle </h4>
  <p class="card-description"> Yeni Yazı </p>
  <form id="hayal_guncelle">
    <input type="hidden" class="form-control" name="id" value="<?php echo $hayal["id"]; ?>" placeholder="id">
    <div class="form-group">
      <label for="exampleInputName1">Başlık</label>
      <input type="text" class="form-control" name="baslik" value="<?php echo $hayal["baslik"]; ?>" placeholder="Blok Başlığı">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail3">Kısa Başlık</label>
      <input type="text" class="form-control" name="k_baslik" value="<?php echo $hayal["k_baslik"]; ?>" placeholder="Bloğun Kısa Başlığını Girin">
    </div>
    <div class="form-group">
      <label>Başlık Resim </label>
      <input class="file-upload-default dosyaci" name="files[]" type="file" multiple />
      <div class="input-group col-xs-12">
        <input type="text" class="form-control file-upload-info" disabled placeholder="Başlık Resim">
        <span class="input-group-append">
          <button class="file-upload-browse btn btn-gradient-primary" type="button">Resim Seç</button>
        </span>
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Kategori</label>
      <select class="form-control form-control-lg" name="kategori">
        <option value="-1">Seçim Yapın</option>
        <?php
        $kategoriler = FUNC::kategoriler();
        foreach ($kategoriler as $key => $value) {
          if ($key == $yazi["kategori"]) {
            $sec = "selected";
          } else {
            $sec = "";
          }
          echo '<option ' . $sec . ' value="' . $key . '">' . $value . '</option>';
        }

        ?>

      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Durum</label>
      <select class="form-control form-control-lg" name="durum">
        <option value="-1">Seçim Yapın</option>
        <?php
        $kategoriler = FUNC::durum();
        foreach ($kategoriler as $key => $value) {
          if ($key == $yazi["durum"]) {
            $sec = "selected";
          } else {
            $sec = "";
          }
          echo '<option ' . $sec . ' value="' . $key . '">' . $value . '</option>';
        }

        ?>

      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">tur</label>
      <select class="form-control form-control-lg" name="tur">
        <option value="-1">Seçim Yapın</option>
        <?php
        $kategoriler = FUNC::tur();
        foreach ($kategoriler as $key => $value) {
          if ($key == $yazi["tur"]) {
            $sec = "selected";
          } else {
            $sec = "";
          }
          echo '<option ' . $sec . ' value="' . $key . '">' . $value . '</option>';
        }

        ?>

      </select>
    </div>
    <div class="form-group">
      <label for="exampleTextarea1">Bloğun İçeriği</label>
      <textarea class="form-control" name="icerik" rows="4"><?php echo $hayal["icerik"]; ?></textarea>
    </div>
    <button type="submit" class="btn btn-gradient-primary me-2">guncelle</button>
  </form>
</div>
</div>
</div>