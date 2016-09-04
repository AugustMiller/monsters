<article class="card monster">
  <div class="basic">
    <h2><?= html::a($monster->url(), $monster->title()) ?></h2>
    <h3>
      <span class="type"><?= $monster->type()->html() ?></span>
      <? if ($monster->alignment()->isNotEmpty()) { ?>
        <span class="alignment"><?= $monster->alignment()->html() ?></span>
      <? } ?>
    </h3>
  </div>

  <ul class="vitals">
    <li class="vital ac">
      <h4 class="label"><?= Architect::field_label('monster', 'ac') ?></h4>
      <span class="ac-value"><?= $monster->ac()->html() ?></span>
      <span class="ac-type"><?= $monster->ac_type()->html() ?></span>
    </li>
    <li class="vital hp">
      <h4 class="label"><?= Architect::field_label('monster', 'hp') ?></h4>
      <span class="hp-value"><?= $monster->hp()->html() ?></span>
      <? if ($monster->hp_formula()->isNotEmpty()) { ?>
        <span class="hp-formula"><code><?= $monster->hp_formula()->html() ?></code></span>
      <? } ?>
    </li>
    <li class="vital speed">
      <h4 class="label"><?= Architect::field_label('monster', 'speed') ?></h4>
      <span class="speed-value"><?= $monster->speed()->html() ?></span>
    </li>
  </ul>

  <ul class="core">
    <? $attrs = Architect::blueprint('fields/types-attributes') ?>
    <? foreach ($attrs['options'] as $attribute => $name) { ?>
      <li class="<?= $attribute ?>">
        <h5><abbr title="<?= Architect::field_label('monster', $attribute) ?>"><?= $attrs['abbreviations'][$attribute] ?></abbr></h5>
        <span class="value"><?= $monster->$attribute()->html() ?></span>
        <span class="modifier"><?= Help::adjustment($modifier = Help::ability_modifier($monster->$attribute()->int())) ?></span>
      </li>
    <? } ?>
  </ul>

  <div class="extended">
    <div class="saving-throws">
      <? $saving_throws = $monster->saving_throws()->toStructure() ?>
      <? if ($saving_throws->count()) { ?>
        <h5><?= Architect::field_label('monster', 'saving_throws') ?></h5>
        <ul class="attribute-types">
          <? foreach ($saving_throws as $throw) { ?>
            <li class="attribute">
              <strong class="type">
                <abbr title="<?= Architect::blueprint('fields/types-attributes')['options'][$throw->damage_type()->toString()] ?>"><?= Architect::blueprint('fields/types-attributes')['abbreviations'][$throw->damage_type()->toString()] ?></abbr>
              </strong>
              <span class="adjustment"><?= Help::adjustment($throw->adjustment()->int()) ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>

    <div class="skills">
      <? $skills = $monster->skills()->toStructure() ?>
      <? if ($skills->count()) { ?>
        <h5><?= Architect::blueprint('fields/skills')['label'] ?></h5>
        <ul class="skill-types">
          <? foreach ($skills as $skill) { ?>
            <li class="skill <?= $skill->skill() ?>">
              <strong class="type"><?= Architect::blueprint('fields/types-skills')['options'][$skill->skill()->toString()] ?></strong>
              <span class="adjustment"><?= Help::adjustment($skill->adjustment()->int()) ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>

    <div class="damage-resistance">
      <? $resistance_types = $monster->dmg_resistance()->toStructure() ?>
      <? if ($resistance_types->count()) { ?>
        <h5><?= Architect::field_label('monster', 'dmg_resistance') ?></h5>
        <ul class="damage-resistance-types">
          <? foreach ($resistance_types as $kind) { ?>
            <li class="resistance <?= $kind ?>">
              <strong class="type"><?= Architect::blueprint('fields/types-damage')['options'][$kind->damage_type()->toString()] ?></strong>
              <span class="adjustment"><?= Help::adjustment($kind->adjustment()->int()) ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>

    <div class="damage-immunities">
      <? $immunities = $immunities = $monster->dmg_immunities()->split() ?>
      <? if (count($immunities)) { ?>
        <h5><?= Architect::field_label('monster', 'dmg_immunities') ?></h5>
        <ul class="immunities">
          <? foreach ($immunities as $immunity) { ?>
            <li class="damage-immunity <?= $immunity ?>">
              <span class="type"><?= Architect::blueprint('fields/types-damage')['options'][$immunity] ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>

    <div class="condition-immunities">
      <? if (count($immunities = $monster->condition_immunities()->split())) { ?>
        <h5><?= Architect::field_label('monster', 'condition_immunities') ?></h5>
        <ul class="immunities">
          <? foreach ($immunities as $condition) { ?>
            <li class="condition-immunity <?= $condition ?>">
              <span class="type"><?= Architect::blueprint('fields/types-conditions')['options'][$condition] ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>

    <div class="languages">
      <? if (count($languages = $monster->languages()->split())) { ?>
        <h5><?= Architect::field_label('monster', 'languages') ?></h5>
        <ul class="languages">
          <? foreach ($languages as $language) { ?>
            <li class="language <?= $language ?>">
              <span class="type"><?= Architect::blueprint('fields/types-languages')['options'][$language] ?></span>
            </li>
          <? } ?>
        </ul>
      <? } ?>
    </div>
  </div>

  <div class="traits">
    <? $traits = $monster->special_traits()->toStructure() ?>
    <? if ($traits->count()) { ?>
      <ul class="special">
        <? foreach ($traits as $trait) { ?>
          <li class="trait">
            <strong><?= $trait->name()->html() ?></strong>
            <?= $trait->description()->kirbytext() ?>
          </li>
        <? } ?>
      </ul>
    <? } else { ?>
      This creature does not have any <?= Architect::field_label('monster', 'special_traits') ?>.
    <? } ?>
  </div>

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

  <div class="more">
    <?= $monster->description()->kirbytext() ?>
  </div>
</article>
