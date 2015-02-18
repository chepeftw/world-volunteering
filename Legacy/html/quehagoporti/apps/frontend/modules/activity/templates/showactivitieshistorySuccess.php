<?php include_partial('association/breadcrumb2', array('association' => $association, 'type' => 2)) ?>

<h1>Historico de <?php echo $association->getName() ?></h1>
<br>

<?php include_partial('association/menu', array('association' => $association)) ?>

<div class="innerblock-content">

	<div class="pic">
	<?php echo image_tag( '/uploads/thumbnail/'.$association->getLogo(), 'alt='.$association->getName().' title='.$association->getName() ) ?>
	</div>

	<?php include_partial('association/show', array('association' => $association, 'width_property' => 1)) ?>
	
</div>

<div class="cleanse"></div>
<br>
<br>
<br>

<?php if ( count( $pager->getResults() ) > 0 ): ?>

<?php foreach ($pager->getResults() as $activity): ?>
	<div class="innerblock-content">
		
		<div class="pic">
		<?php echo image_tag( '/uploads/activity_thumbnail/'.$activity->getPicture() ) ?>
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
		<strong><?php echo $activity->getDateSpanish() ?></strong><br>
		<a href="<?php echo url_for('activity_user2', $activity) ?>">Mas informacion</a>
		</div>
		<div class="cleanse"></div>
	</div>
	<br>
<?php endforeach; ?>

<?php else: ?>
<br>
<br>
<p> &nbsp;&nbsp;&nbsp; <strong>No hay actividades por el momento.</strong></p>

<?php endif; ?>


<?php if ($pager->haveToPaginate()): ?>

  <div class="pagination">
    <a href="<?php echo url_for('association_activities_history', $association) ?>?pagina=1">
      <img id="img-pagination" src="<?php echo image_path('icons/first.png') ?>" alt="Primera pagina" title="Primera pagina" />
    </a>
 
    <a href="<?php echo url_for('association_activities_history', $association) ?>?pagina=<?php echo $pager->getPreviousPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/previous.png') ?>" alt="Pagina anterior" title="Pagina anterior" />
    </a>
 
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('association_activities_history', $association) ?>?pagina=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
 
    <a href="<?php echo url_for('association_activities_history', $association) ?>?pagina=<?php echo $pager->getNextPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/next.png') ?>" alt="Pagina siguiente" title="Pagina siguiente" />
    </a>
 
    <a href="<?php echo url_for('association_activities_history', $association) ?>?pagina=<?php echo $pager->getLastPage() ?>">
      <img id="img-pagination" src="<?php echo image_path('icons/last.png') ?>" alt="Ultima pagina" title="Ultima pagina" />
    </a>
  </div>
 
<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> actividades
    - pagina <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
</div>
<?php endif; ?>
