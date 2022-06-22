<?php

declare(strict_types = 1);

namespace Drupal\twig_n2w\Twig\NumberToWords\Locale;

/**
 * Interface LocaleInterface
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package NumberToWords
 */
interface LocaleInterface
{
    public function convert(string $number): ?string;

    public function nameOfLargeNumber(int $exponent);
}