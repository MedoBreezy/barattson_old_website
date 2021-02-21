<section class="partners d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12 wrap-992-0">
                <?php foreach ($banners as $banner): ?>
                    <a href="<?= $banner->link ?>" target="_blank">
                        <img class="img-fluid" src="<?= $banner->image ?>" alt="<?= $banner->title ?>" />
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>