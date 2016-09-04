<div class="actions">
  <? $actions = $monster->actions()->toStructure() ?>
  <? if ($actions->count()) { ?>
    <ul class="actions">
      <? foreach ($actions as $action) { ?>
        <li class="action">
          <strong><?= $action->name()->html() ?></strong>
          <?= $action->description()->kirbytext() ?>
        </li>
      <? } ?>
    </ul>
  <? } else { ?>
    This creature does not have any <?= Architect::field_label('monster', 'actions') ?>.
  <? } ?>
</div>
