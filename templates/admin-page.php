<form method="post" class="trigger-form">
    <?php wp_nonce_field( 'ph_scan_products', 'trigger_form_nonce' );?>
    <button class="button primary">Scan Products</button>
</form>
<div class="panel">
    <h1 class="panel--title"><?= __( 'Product Health Monitor', 'product-health' );?></h1>

    <?php if( $issues->isEmpty() == false ):?>
    <ul class="list--header flush-with-panel">
        <li><?= __( 'Problem', 'product-health' );?></li>
        <li class="actions"><?= __( 'Reported on', 'product-health' );?></li>
        <li class="actions"><?= __( 'Actions', 'product-health' );?></li>
    </ul>
    <ul class="list">
        <?php foreach( $issues as $issue ):?>
        <li class="list-item <?= $issue->weight;?>">
            <p class="title"><?= $issue->message;?></p>
            <datetime class="reported_on"><?= $issue->created_at->format( 'd M Y' );?></datetime>
            <div class="actions">
                <button class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                    <span><?= __( 'Ignore', 'product-health' );?></span>
                </button> 
            </div>
        </li>   
        <?php endforeach;?>
    </ul>
    <?php endif;?>
</div>

