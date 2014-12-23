<?php

use KoreanRomanizer\Romanizer;

class RomanizerTest extends PHPUnit_Framework_TestCase
{
    /**
    * @dataProvider examplesTestRomanize
    */
    public function testRomanizeCommonCases($sIn, $sOut)
    {
        $s = new Romanizer($sIn);
        $this->assertEquals($sOut, $s->romanize());
    }

    public function examplesTestRomanize()
    {
        //Basic Korean words without special cases
        $basic = [
            ["나비",    "nabi"],
            ["두부",    "dubu"],
            ["사랑해",  "saranghae"],
            ["안녕",    "annyeong"],
            ["고마워요","gomawoyo"],
            ["커피",    "kopi"]
        ];

        //Mixed with non-Korean chars
        $mix = [
            ["신촌역 4번출구", "sinchonyeok 4beonchulgu"],
            ["북한 1 - 한국 2", "bukhan 1 - hanguk 2"]
        ];

        return array_merge($basic, $mix);
    }

    /**
    * @dataProvider examplesSpecialCases
    */
    public function testRomanizeSpecialCases($sIn, $sOut)
    {
        $s = new Romanizer($sIn);
        $this->assertEquals(strtolower($sOut), $s->romanize());
    }

    public function examplesSpecialCases()
    {
        //Based on examples from http://www.korean.go.kr/eng/roman/roman.jsp
        //Examples from "Summary of the Romanization System"
        $examples2 = [
            ["구 리",   "Guri"],
            ["설 악",   "Seorak"],
            ["칠 곡",   "Chilgok"],
            ["임 실",   "Imsil"],
            ["울 릉",   "Ulleung"],
            ["대관령",  "Daegwallyeong"]
        ];

        //Examples from "Assimilation of adjacent consonants"
        $examples311 = [
            ["백마",    "Baengma"],
            ["신문로",  "Sinmunno"],
            ["종로",    "Jongno"],
            ["왕십리",  "Wangsimni"],
            ["별내",    "Byeollae"],
            ["신라",    "Silla"]
        ];
        //Examples from "the epenthetic ㄴ and ㄹ"
        $examples312 = [
            ["학여울",  "Hangnyeoul"],
            ["알약",    "allyak"]
        ];
        //Examples from "Palatalization"
        $examples313 = [
            ["해돋이",  "haedoji"],
            ["같이",    "gachi"],
            ["맞히다",  "machida"]
        ];
        //Examples from "where ㄱ, ㄷ, ㅂ, and ㅈ are adjacent to ㅎ"
        $examples314 = [
            ["좋고",    "joko"],
            ["놓다",    "nota"],
            ["잡혀",    "japyeo"],
            ["낳지",    "nachi"],
            ["묵호",    "Mukho"],
            ["집현전",  "Jiphyeonjeon"]
        ];
        //Examples from "Tense (or glottalized) sounds are not reflected in cases where morphemes are compounded"
        $examples31end = [
            ["압구정",  "Apgujeong"],
            ["낙동강",  "Nakdonggang"],
            ["죽변",    "Jukbyeon"],
            ["낙성대",  "Nakseongdae"],
            ["합정",    "Hapjeong"],
            ["팔당",    "Paldang"],
            ["샛별",    "saetbyeol"],
            ["울산",    "Ulsan"]
        ];
        //Examples from "When there is the possibility of confusion in pronunciation, a hyphen '-' may be used"
        $examples32 = [
            ["중앙",    "Jung-ang"],
            ["반구대",  "Ban-gudae"],
            ["세운",    "Se-un"],
            ["해운대",  "Hae-undae"]
        ];
        //Examples from "The first letter is capitalized in proper names"
        //Note: no testable unless a proper names' dictionary is added to the code
        $examples33 = [
            ["부산",    "Busan"],
            ["세종",    "Sejong"]
        ];

        //TODO: examples34 to examples36

        return array_merge($examples2, $examples311, $examples312, $examples313,
            $examples314, $examples31end, $examples32, $examples33);
    }
}
