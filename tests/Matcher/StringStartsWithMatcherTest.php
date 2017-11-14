<?php

namespace PHPCD\Tests\Matcher;

use PHPUnit\Framework\TestCase;

use PHPCD\Matcher\StringMatcher;
use PHPCD\Matcher\StringStartsWithMatcher;

final class StringStartsWithMatcherTest extends TestCase
{

    /**
     * @test
     * @dataProvider provideMatchingStrings
     */
    function itStartsWithASubString(StringStartsWithMatcher $matcher, $haystack, $needle)
    {
        $this->assertTrue($matcher($haystack, $needle));
    }

    public function provideMatchingStrings()
    {
        $sensitiveMatcher   = new StringStartsWithMatcher(StringMatcher::CASE_SENSITIVE);
        $insensitiveMatcher = new StringStartsWithMatcher(StringMatcher::CASE_INSENSITIVE);
        $haystack           = 'aBcDef';

        return [
            "insensitive match" => [ $insensitiveMatcher, $haystack, 'abC' ],
            "sensitive match"   => [ $sensitiveMatcher  , $haystack, 'aBc' ],
        ];
    }

    /**
     * @test
     * @dataProvider provideNonMatchingStrings
     */
    function itDoesNotStartWithASubString(StringStartsWithMatcher $matcher, $haystack, $needle)
    {
        $this->assertFalse($matcher($haystack, $needle));
    }

    public function provideNonMatchingStrings()
    {
        $sensitiveMatcher   = new StringStartsWithMatcher(StringMatcher::CASE_SENSITIVE);
        $insensitiveMatcher = new StringStartsWithMatcher(StringMatcher::CASE_INSENSITIVE);
        $haystack           = 'aBcDef';

        return [
            "insensitive match" => [ $insensitiveMatcher, $haystack, 'BcD' ],
            "sensitive match"   => [ $sensitiveMatcher  , $haystack, 'abc' ],
        ];
    }

}

