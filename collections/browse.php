<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyid'=>'collections','bodyclass' => 'browse'));
?>
<div id="primary">
    <h1><?php echo $pageTitle; ?></h1>

    <?php if (total_records('Collection')): ?>
    <?php echo pagination_links(); ?>

    <?php foreach (loop('collections') as $collection): ?>
    <div class="collection">

        <h2><?php echo link_to_collection(); ?></h2>

        <?php if ($description = metadata('collection', array('Dublin Core', 'Description'), array('snippet' => 150))): ?>
        <div class="element">
            <p class="element-text"><?php echo $description; echo link_to_collection('show more.');?></p>
        </div>
        <?php endif; ?>
        
        <?php if ($collection->hasContributor()): ?>
        <div class="element">
            <h3><?php echo __('Contributors(s)'); ?></h3>
            <div class="element-text">
                <p><?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?></p>
            </div>
        </div>
        <?php endif; ?>

        <p class="view-items-link"><?php echo link_to_items_browse(__('View the items in %s', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>

        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

    </div><!-- end class="collection" -->
    <?php endforeach; ?>

    <?php echo pagination_links(); ?>

    <?php else: ?>

    <p><?php echo __('There are no collections.'); ?></p>

    <?php endif; ?>

    <?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

</div><!-- end primary -->

<?php echo foot(); ?>
