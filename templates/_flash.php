<?php $messages = getFlashMessage(); ?>
<?php if(!empty($messages)): ?>
  <div class="flash-messages">
    <?php foreach($messages as $type => $message): ?>
      <div class="flash-messages flash-<?php echo htmlspecialchars($type) ?>">
        <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
      </div> 
    <?php endforeach;?>
  </div>
  <?php endif; ?>