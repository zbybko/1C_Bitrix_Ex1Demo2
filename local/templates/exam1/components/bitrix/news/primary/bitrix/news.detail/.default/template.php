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
//\Bitrix\Main\Diag\Debug::writeToFile(array($arResult), 'detail', '1.txt');
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

$arDate = getdate(strtotime($arResult['ACTIVE_FROM'])); // strtotime() преобразовать строку в обычный формат времени, getdate возвращает массив разбитый начиная с секунд и до отсчет unix
$str = $arResult["NAME"] . ' ,' . $arDate["mday"] . ' ' . $month[(int)($arDate["mon"])] . ' ' . $arDate["year"] . ' г.';

if ($arResult['PROPERTIES']['POSITION']['VALUE']) $str .= ', ' . $arResult['PROPERTIES']['POSITION']['VALUE'];
if ($arResult['PROPERTIES']['COMPANY']['VALUE']) $str .= ', ' . $arResult['PROPERTIES']['COMPANY']['VALUE'];
if (isset($arResult["DETAIL_PICTURE"]["ID"])) {
  $arImgTmp = CFile::ResizeImageGet(
    $arResult["DETAIL_PICTURE"]["ID"],
    array("width" => 66, "height" => 66),
    BX_RESIZE_IMAGE_PROPORTIONAL
  );
  $src = $arImgTmp["src"];
} else {
  $src = SITE_TEMPLATE_PATH . '/img/no_photo.jpg';
}
?>
<hr>
<div class="review-block">
  <div class="review-text">
    <div class="review-text-cont">
      <?= $arResult["DETAIL_TEXT"] ?>
    </div>
    <div class="review-autor">
      <?= $str ?>
    </div>
  </div>
  <div style="clear: both;" class="review-img-wrap"><img src="<?= $src ?>" alt="img"></div>
</div>
<? if (is_array($arResult['PROPERTIES']['DOCUMENTS']['VALUE'])) : ?>
  <div class="exam-review-doc">
    <p><?= GetMessage("HEAD_FILE_BLOCK"); ?>
    <? foreach ($arResult['PROPERTIES']['DOCUMENTS']['VALUE'] as $file):
      $rsFile = CFile::GetByID($file);
      $arFile = $rsFile->Fetch();
      \Bitrix\Main\Diag\Debug::writeToFile(array($arFile), 'file', '1.txt')
      ?></p>
      <div class="exam-review-item-doc">
        <img class="rew-doc-ico" src=<?=SITE_TEMPLATE_PATH. "/img/icons/pdf_ico_40.png"?>>
        <a href="<?=$arFile["SRC"] ?>" download><?=$arFile["ORIGINAL_NAME"] ?></a>
      </div>
    <? endforeach; ?>
  </div>
<? endif; ?>
<hr>
<a href="<?= $arResult["LIST_PAGE_URL"] ?>" class="review-block_back_link"> &larr; К списку отзывов</a>
