<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

global $APPLICATION;

$this->setFrameMode(true);

if (empty($arResult["ALL_ITEMS"]))
  return;
?>
<ul>
  <li class="main-page"><a href="/"><?= GetMessage('MAIN_PAGE') ?></a></li>
  <? foreach ($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):
    if ($arResult["ALL_ITEMS"][$itemID]["PERMISSION"] == 'D') continue;
    $menuTopClass = trim($APPLICATION->GetDirProperty('menu_top_class', $arResult["ALL_ITEMS"][$itemID]["LINK"]));
    ?> <!-- first level-->
    <li>
      <a href="<?= $arResult["ALL_ITEMS"][$itemID]["LINK"] ?>" <?=($menuTopClass ? ' class="' .$menuTopClass. '" ' : '') //Тернарник для вывода свойства если есть?>>
        <?= $arResult["ALL_ITEMS"][$itemID]["TEXT"] ?>
      </a>
      <? if (is_array($arColumns) && !empty($arColumns)): ?>
        <? foreach ($arColumns as $key => $arRow): ?>
          <ul>
            <?
            $menuTopText = trim($APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemID]["LINK"]));
            if ($menuTopText) echo '<div class="menu-text">' . $menuTopText . '</div>'
            ?>
            <? foreach ($arRow as $itemIdLevel_2 => $arLevel_3):
              if ($arResult["ALL_ITEMS"][$itemIdLevel_2]["PERMISSION"] == 'D') continue;
              ?>  <!-- second level-->
              <li>
                <a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"] ?>">
                  <?= $arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"] ?>
                </a>
                <? if (is_array($arLevel_3) && !empty($arLevel_3)): ?>
                  <ul>
                    <?
                    $menuTopText2 = trim($APPLICATION->GetDirProperty('menu_top_text', $arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]));
                    if ($menuTopText2) echo '<div class="menu-text">' . $menuTopText2 . '</div>'
                    ?>
                    <? foreach ($arLevel_3 as $itemIdLevel_3): ?>  <!-- third level-->
                      <li>
                        <a href="<?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"] ?>">
                          <?= $arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"] ?>
                        </a>
                      </li>
                    <? endforeach; ?>
                  </ul>
                <? endif ?>
              </li>
            <? endforeach; ?>
          </ul>
        <? endforeach; ?>
      <? endif ?>
    </li>
  <? endforeach; ?>
</ul>
