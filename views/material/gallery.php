<h1>Pictures <?= $username ?></h1>
<?php foreach($arts as $item): ?>

            <h2><?= $item['title'] ?></h2>
            <p><?= $item['message'] ?></p>

             <img width='320' src='<?= $item['img_src'] ?>' /> 
  
<?php endforeach; ?>

