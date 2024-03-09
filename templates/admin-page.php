<h1><?= __( 'Product Health Monitor', 'product-health' );?></h1>
<?php if( $issues->isEmpty() ):?>
    <form method="post">
        <button>Scan Products</button>
    </form>
<?php else: ?>
<div class="panel">
    <ul class="list">
        <?php foreach( $issues as $issue ):?>
        <li class="list--item">
            <p><?= $issue->message;?></p>
            <a href="<?= get_edit_post_link( $issue->product_id );?>">Edit product</a>
        </li>   
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>
