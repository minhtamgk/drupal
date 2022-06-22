<?php
namespace Drupal\twig_n2w\Twig;
use Drupal\twig_n2w\Twig\NumberToWords\NumberToWords;
use Drupal\twig_n2w\Twig\NumberToWords\Locale\German;
use Drupal\twig_n2w\Twig\NumberToWords\Locale\English;

class Numbers2WordsConversion extends \Twig_Extension {
  private const UNITS =  ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
  
  /**
   * Gets filters
   *
   * @return array
   */
  public function getFilters() {
    return array(
      new \Twig_SimpleFilter('n2w_format_intl', array($this, 'n2wFormatIntl')),
      new \Twig_SimpleFilter('format_salutation', array($this, 'formatSalutation')),
      new \Twig_SimpleFilter('number_format_lang', array($this, 'numberFormatLang')),
      new \Twig_SimpleFilter('format_pdf_date', array($this, 'formatPdfDate')),
    );
  }
  public function getName() {
    return 'twig_n2w';
  }

  /**
   * Convert number into words
   * @param type $number
   * @return type
   * @see - for language format 
   *   https://twig.symfony.com/doc/2.x/filters/format_currency.html
   */
  function n2wFormatIntl($input, $format= NULL, $unit= NULL) {

    if (empty($input) && empty($format)) {
      return '';
    }

    if ($format === 'en') {
      $value = new NumberToWords(new English());
    } else {
      $value = new NumberToWords(new German());
    }
   return  $value -> convert($input, $unit);
  }

  function formatSalutation($input, $lang = 'en') {

    if (empty($input)) {
      return '';
    }
    {
      $words= '';
      if ($lang === 'de') {
        if ($input === "Mr.") {
          $words .= "Lieber";
        } else {
          $words .= "Liebe";
        }
      } else {
        $words .= "Dear";
      }
      return trim($words);
    }
  }

  function numberFormatLang($num, $decimals = 2, $language = 'en')
  {
    if (empty($num) || $decimals > 2) {
      return '';
    }

    $num = (float)$num;
    
    if ($language === "en") {
      $num = str_replace(".00", "",number_format($num, $decimals, '.', ','));
    } else {
      $num = str_replace(",00", "",number_format($num, $decimals, ',', '.'));
    }
    return $num;
  }

  function formatPdfDate( $input, $modify= "+0 day", $lang= 'en' ): ?string
  {
    if (empty($input)) {
      return '';
    }

    $words = '';
    
    $date = date_create($input);
    date_modify($date, $modify);
    
    $month = date_format($date, "F");
    $month_de = date_format($date, "m");
    $month_format = self::UNITS[number_format($month_de - 1)];
    
    $day = date_format($date, "j");
    $year = date_format($date, "Y");
    $words = $day . ($lang === 'en' ? ',' : '.') .' ' . ($lang === 'en' ? $month : $month_format) . " " . $year ;
    return $words;
  }
}