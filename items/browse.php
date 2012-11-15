<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyid'=>'items','bodyclass' => 'browse'));
?>

<div id="primary">

    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>

    <nav class="items-nav navigation" role="navigation">
        <?php echo public_nav_items(); ?>
    </nav>

    <?php echo pagination_links(); ?>

    <table id="items" cellspacing="0" cellpadding="0">
     <thead>
        <tr>
            <?php
            $browseHeadings[__('Item')] = 'Dublin Core,Title';
            $browseHeadings[__('Creator')] = 'Dublin Core,Creator';
            $browseHeadings[__('Type')] = null;
            $browseHeadings[__('Date Added')] = 'added';
            echo browse_sort_links($browseHeadings, array('link_tag' => 'th scope="col"', 'list_tag' => ''));
            ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach (loop('items') as $item): ?>
    <tr class="item">
        <td>
          <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
        <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>150))): ?>
        <div class="item-description">
            <p><?php echo $text; ?>.</p>
        </div>
        <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
        <div class="item-description">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>

        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>
        <?php fire_plugin_hook('public_append_to_items_browse_each', array('view' => $this)); ?>

        </td>
        <td><?php echo metadata('item', array('Dublin Core', 'Creator')); ?></td>
        <td><?php echo ($typeName = metadata('item', 'Item Type Name'))
                        ? $typeName
                        : metadata('item', array('Dublin Core', 'Type')); ?></td>
        <td><?php echo metadata('item', 'added'); ?></td>
    </tr><!-- end class="item hentry" -->
    <?php endforeach; ?>
    </tbody>
</table>
    <div id="pagination-bottom" class="pagination"><?php echo pagination_links(); ?></div>

    <?php fire_plugin_hook('public_append_to_items_browse', array('view' => $this)); ?>

</div><!-- end primary -->

<?php echo foot(); ?>
