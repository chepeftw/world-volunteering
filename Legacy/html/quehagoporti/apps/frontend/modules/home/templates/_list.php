<?php foreach ($pager->getResults() as $activity): ?>
<?php $association = $activity->getAssociation() ?>
	<div class="innerblock-content">
		<h4><a href="<?php echo url_for('association_user', $association, true) ?>"><?php echo $association ?></a></h4>
		
		<div class="pic">
		<?php echo image_tag( '/uploads/thumbnail/'.$association->getLogo() ) ?>
		</div>
		
		<div class="info">
		<strong><?php echo $activity->getTitle() ?><br></strong>
		
		<strong><?php echo substr( $activity->getPlace(), 0, 200 ) ?>
		<?php echo ( strlen( $activity->getPlace() ) > 200 )?' ...':'' ?><br></strong>
		
		<?php echo substr( $activity->getDescription(), 0, 200 ) ?>
		<?php echo ( strlen( $activity->getDescription() ) > 200 )?' ...':'' ?>
		<br><br><br>
		</div>
		
		<div class="functions">
		<br>
		<strong><?php echo $activity->getDateSpanish() ?></strong><br>
		<a href="<?php echo url_for('activity_user', $activity, true) ?>">Mas informacion</a>
		</div>
		
		<div class="cleanse"></div>
	</div>
<?php endforeach; ?>


<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('@homepage', true) ?>?pagina=1">
      <img id="img-pagination" src="<?php echo image_path('icons/first.png') ?>" alt="Primera pagina" title="Primera pagina" />
    </a>
 
    <a href="<?php echo url_for('@homepage', true) ?>?pagina=<?php echo $pager->getPreviousPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/previous.png') ?>" alt="Pagina anterior" title="Pagina anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('@homepage', true) ?>?pagina=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('@homepage', true) ?>?pagina=<?php echo $pager->getNextPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/next.png') ?>" alt="Pagina siguiente" title="Pagina siguiente" />
    </a>
 
    <a href="<?php echo url_for('@homepage', true) ?>?pagina=<?php echo $pager->getLastPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/last.png') ?>" alt="Ultima pagina" title="Ultima pagina" />
    </a>
  </div>
<?php endif; ?>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> actividades
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>
