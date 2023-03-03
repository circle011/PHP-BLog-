<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span> Tüm Yazılarımsdasdasdas
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="<?php echo ANA_DIZIN ?>yonetici/yazilarim/yeni">
                    <button type="button" class="btn btn-gradient-primary btn-md">Yeni Yazı</button>
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Başlık </th>
                                <th> Kategori </th>
                                <th> Durum </th>
                                <th> Eklenme Tarihi </th>
                                <th> Gösterim </th>
                                <th> Tür </th>
                                <th> Güncelle </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($veri["blog_yazi"] as $value) {
                                $kategoriler = FUNC::kategoriler();
                                $durum = FUNC::durum();
                                $tur = FUNC::tur();
                            ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo KAYNAK ?>resimler/<?php echo $value["resimler"] ?>" class="mr-2" alt="image" /> <?php echo $value["baslik"]; ?>
                                    </td>
                                    <td> <?php echo $kategoriler[$value["kategori"]] ?> </td>
                                    <td>
                                        <label class="badge badge-gradient-success"><?php echo $durum[$value["durum"]] ?></label>
                                    </td>
                                    <td> <?php echo FUNC::tarih("yaz", $value["eklenme_tarih"]); ?> </td>
                                    <td> <?php echo $value["gosterim"] ?> </td>
                                    <td> <?php echo $tur[$value["tur"]] ?> </td>
                                    <td> <a href="<?php echo ANA_DIZIN ?>yonetici/yazilarim/<?php echo $value["id"] ?>"><button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Güncelle</button></a> </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>