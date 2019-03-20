
<h1> <?= $categorie->nomQuestionnaire;?></h1>
<div class="row">
    <div class="col-sm-8">

        <?php foreach ($articles as $post): ?>

            <h2><a href="<?php echo $post->url ;?>"> <?= $post->nom ;?></a></h2>

            <p><?php echo $post->longitude; ?> <p/>

        <?php endforeach; ?>
    </div>
    <div class="col-sm-4">

        <?php foreach ($categories as $categorie): ?>
            <ul>
                <li>
                    <a href="<?= $categorie->url ;?>"> <?= $categorie->nomQuestionnaire ;?></a>
                </li>
            </ul>
        <?php endforeach; ?>
        
    </div>
</div>