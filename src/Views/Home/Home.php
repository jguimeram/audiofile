<div class="container">
    <div class="card-group">
        <div class="row">
            <?php foreach ($data as $key => $value) : ?>
            <div class="col">
                <div class="card p-4">
                    <div class="card-body text-start">
                        <h5 class="card-title"><?= $value["title"]; ?></h5>
                        <p class="card-text">Artist: <?= $value["artist"]; ?></p>
                        <p class="card-text">Album: <?= $value["album"]; ?></p>
                        <p class="card-text">Release Date: <?= $value["release_date"]; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>