<div class="basic">
  <h2 class="monster-name"><?= html::a($monster->url(), $monster->title()) ?></h2>
  <h3 class="monster-type">
    <span class="type"><?= $monster->type()->html() ?></span>
    <? if ($monster->alignment()->isNotEmpty()) { ?>
      <span class="alignment"><?= $monster->alignment()->html() ?></span>
    <? } ?>
  </h3>
</div>
