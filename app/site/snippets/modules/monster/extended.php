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
