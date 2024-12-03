<?php $pager->setSurroundCount(2); ?>
    <div class="join w-full flex justify-end mt-4">
        <?php
        foreach ($pager->links() as $link) {
            $activeclass = $link['active']?'btn-active':'';
            ?>
                <a href="<?= $link['uri'] ?>" class="join-item btn <?= $activeclass ?>">
                    <?= $link['title'] ?>
                </a>
        <?php } ?>
    </div>