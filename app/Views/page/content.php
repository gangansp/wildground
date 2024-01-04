<section data-bs-version="5.1" class="features9 cid-tVBtDbUvvq" xmlns="http://www.w3.org/1999/html" id="features9-2d">

    <div class="container">
        <div class="title">
            <?php
            if (isset($keyword)) { ?>
                <h3 class="mbr-section-title mbr-fonts-style mb-4 display-5"><strong>HASIL PENCARIAN UNTUK: <?= $keyword; ?></strong></h3>
            <?php } else { ?>
                <h3 class="mbr-section-title mbr-fonts-style mb-4 display-5"><strong>CATEGORY: <?= $category_name; ?></strong></h3>
            <?php } ?>
        </div>
        <?php
        foreach ($response['data'] as $key => $value) { ?>

            <div class="item features-image">
                <div class="item-wrapper">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <div class="image-wrapper">
                                <img src="<?= $value['image_url']; ?>" alt="Mobirise Website Builder">
                            </div>
                        </div>
                        <div class="col-12 col-md">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md">
                                        <h6 class="card-title mbr-fonts-style display-5">
                                            <strong><?= $value['title']; ?></strong>
                                        </h6>
                                        <p class="mbr-text mbr-fonts-style display-7">
                                            <?= substr(strip_tags($value['contents']), 0, 100); ?>...
                                        </p>
                                    </div>
                                    <div class="col-md-auto">

                                        <div class="mbr-section-btn"><a href="<?= base_url('articledetail?id=' . $value['id']) ?>" class="btn btn-primary display-4">
                                                Selengkapnya
                                            </a></div>
                                    </div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <?php } ?>
    </div>
</section>