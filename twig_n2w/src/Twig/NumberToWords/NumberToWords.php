<?php

declare(strict_types = 1);

namespace Drupal\twig_n2w\Twig\NumberToWords;

use Drupal\twig_n2w\Twig\NumberToWords\Locale\LocaleInterface;

/**
 * Class NumberToWords
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package NumberToWords
 */
class NumberToWords
{
    /**
     * @var null|LocaleInterface
     */
    protected $locale = null;

    /**
     * NumberToWords constructor
     *
     * @param LocaleInterface $locale
     */
    public function __construct(LocaleInterface $locale)
    {
        $this->locale = $locale;
    }

    /**
     * Convert numbers to words
     *
     * @param string $number
     * @return null|string
     */
    public function convert(string $number, string $unit = NULL ): ?string
    {
        return $this->locale->convert($number, $unit);
    }

    /**
     * @param int $exponent
     * @return string
     */
    public function nameOfLargeNumber(int $exponent)
    {
        return $this->locale->nameOfLargeNumber($exponent);
    }
}
