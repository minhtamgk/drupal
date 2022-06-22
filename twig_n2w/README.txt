CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Example
 * Installation
 * Maintainers


INTRODUCTION
------------

Twig N2W allows users to add filter on numeric values to print it in words
This module converts numeric values in Bharat(Indian) or International number system in twig files


EXAMPLES
------------

 a. Bharat(Indian) format for words only use below:
 {{ 123456789012.56|n2w_format_bharat }}
 Output: One Kharab Twenty-Three Arab Fourty-Five Crore Sixty-Seven Lac Eighty-Nine Thousand Twelve Point Fifty-Six

 b. Bharat(Indian) format for words with currency use below: 
 {{ 123456789012.56|n2w_format_bharat('currency') }}
 Output: One Kharab Twenty-Three Arab Fourty-Five Crore Sixty-Seven Lac Eighty-Nine Thousand Twelve Rupees and Fifty-Six Paisa

 c. International format for words only use below: 
 {{ 123456789012.56|n2w_format_intl }}
 Output: One Hundred Twenty-Three Billion Four Hundred Fifty-Six Million Seven Hundred Eighty-Nine Thousand Twelve Point Fifty-Six

 d. International format for words with currency use below: 
 {{ 123456789012.56|n2w_format_intl('currency') }}
 Output: One Hundred Twenty-Three Billion Four Hundred Fifty-Six Million Seven Hundred Eighty-Nine Thousand Twleve Dollars and Fifty-Six Cents


INSTALLATION
------------

Install as you would normally install a contributed Drupal module. See:
https://drupal.org/documentation/install/modules-themes/modules-8 for further
information.


MAINTAINERS
-----------

Current maintainers:
 * Pankaj Gupta - https://www.drupal.org/u/pankajg
