<div class="paginationFont">
    <div class="span-5 pagination_border">
        <span class="left"><?php echo $paginator->prev(); ?></span>
    </div>

    <div class="span-6 pagination_border">
        <?php echo $paginator->numbers(array('separator'=>' | ')); ?>
    </div>

    <div class="span-5 last">
        <div class="pagination_border">
            <span class="right"><?php echo $paginator->next(); ?></span>
        </div>
    </div>
</div>