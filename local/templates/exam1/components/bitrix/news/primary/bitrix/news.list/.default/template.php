<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$month = array(
  1 => 'января',
  2 => 'февраля',
  3 => 'марта',
  4 => 'апреля',
  5 => 'мая',
  6 => 'июня',
  7 => 'июля',
  8 => 'августа',
  9 => 'сентября',
  10 => 'октября',
  11 => 'ноября',
  12 => 'декабря',
);
?>
<hr>
<? foreach ($arResult["ITEMS"] as $arItem): ?>
  <?
  $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
  $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

  $arDate = getdate(strtotime($arItem['ACTIVE_FROM'])); // strtotime() преобразовать строку в обычный формат времени, getdate возвращает массив разбитый начиная с секунд и до отсчет unix
  $str = $arDate["mday"].' '.$month[(int)($arDate["mon"])].' '.$arDate["year"]. ' г.';

  if ($arItem['PROPERTIES']['POSITION']['VALUE']) $str .= ', '. $arItem['PROPERTIES']['POSITION']['VALUE'];
  if ($arItem['PROPERTIES']['COMPANY']['VALUE']) $str .= ', '. $arItem['PROPERTIES']['COMPANY']['VALUE'];

  if (isset($arItem["PREVIEW_PICTURE"]["SRC"])) {
    $src = $arItem["PREVIEW_PICTURE"]["SRC"];
  }
  else {
    $src = SITE_TEMPLATE_PATH. '/img/no_photo.jpg';
  }
  ?>
  <div class="review-block">
    <div class="review-block-title">
      <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
        <span class="review-block-name">
				    <? echo $arItem["NAME"] ?>
          </span>
      <? endif; ?>
      <? if ($arItem["ACTIVE_FROM"]): ?>
        <span class="review-block-description"><? echo $str ?>
        </span>
      <? endif ?>
      <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
        <div class="review-text-cont"><? echo $arItem["PREVIEW_TEXT"]; ?></div>
      <? endif; ?>
    </div>

    <div class="review-img-wrap">
        <? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])): ?>
          <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
            <img src="<?=$src ?>"/>
          </a>
        <? else: ?>
          <img src="<?=$src ?>"/>
        <? endif; ?>
    </div>
  </div>
<? endforeach; ?>
