<?php
/**
 * This file contains all romanization examples from The National Institute of The Korean Language:
 * http://www.korean.go.kr/eng/roman/roman.jsp
 * In case a 3rd field is included, it marks it doesn't follow pure romanization:
 * it's usually a half-translation or a complex case.
 */

//Basic examples
$romanizationExamples[2] = [
    ["구리",   "Guri"],
    ["설악",   "Seorak"],
    ["칠곡",   "Chilgok"],
    ["임실",   "Imsil"],
    ["울릉",   "Ulleung"],
    ["대관령",  "Daegwallyeong"]
];
//Examples from "Assimilation of adjacent consonants"
$romanizationExamples[311] = [
    ["백마",    "Baengma"],
    ["신문로",  "Sinmunno"],
    ["종로",    "Jongno"],
    ["왕십리",  "Wangsimni"],
    ["별내",    "Byeollae"],
    ["신라",    "Silla"]
];
//Examples from "the epenthetic ㄴ and ㄹ"
$romanizationExamples[312] = [
    ["학여울",  "Hangnyeoul"],
    ["알약",    "allyak"]
];
//Examples from "Palatalization"
$romanizationExamples[313] = [
    ["해돋이",  "haedoji"],
    ["같이",    "gachi"],
    ["맞히다",  "machida"]
];
//Examples from "where ㄱ, ㄷ, ㅂ, and ㅈ are adjacent to ㅎ"
$romanizationExamples[314] = [
    ["좋고",    "joko"],
    ["놓다",    "nota"],
    ["잡혀",    "japyeo"],
    ["낳지",    "nachi"],
    ["묵호",    "Mukho"],
    ["집현전",  "Jiphyeonjeon", true] //This case is imposible to test
];
//Examples from "Tense (or glottalized) sounds are not reflected in cases where morphemes are compounded"
$romanizationExamples[31] = [
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
$romanizationExamples[32] = [
    ["중앙",    "Jung-ang"],
    ["반구대",  "Ban-gudae"],
    ["세운",    "Se-un"],
    ["해운대",  "Hae-undae"]
];
//Examples from "The first letter is capitalized in proper names"
//Note: no testable unless a proper names' dictionary is added to the code
$romanizationExamples[33] = [
    ["부산",    "Busan"],
    ["세종",    "Sejong"]
];
//Examples from "Personal names"
$romanizationExamples[34] = [
    ['민용하',  'Min Yongha', true],
    ['송나리',  'Song Nari', true],
    ['한복남',  'Han Boknam', true],
    ['홍빛나',  'Hong Bitna', true],
];
//Examples from "Administrative units"
$romanizationExamples[35] = [
    ['충청북도', 'Chungcheongbuk-do', true],
    ['제주도', 'Jeju-do', true],
    ['의정부시', 'Uijeongbu-si', true],
    ['양주군', 'Yangju-gun', true],
    ['도봉구', 'Dobong-gu', true],
    ['신창읍', 'Sinchang-eup', true],
    ['삼죽면', 'Samjuk-myeon', true],
    ['인왕리', 'Inwang-ri', true],
    ['당산동', 'Dangsan-dong', true],
    ['봉천1동', 'Bongcheon 1(il)-dong', true],
    ['종로 2가', 'Jongno 2(i)-ga', true],
    ['퇴계로 3가', 'Toegyero 3(sam)-ga', true],
    ['청주시', 'Cheongju', true],
    ['함평군', 'Hampyeong', true],
    ['순창읍', 'Sunchang', true]
];
//Examples from "Names of geographic features"
$romanizationExamples[36] = [
    ['남산', 'Namsan'],
    ['속리산', 'Songnisan'],
    ['금강', 'Geumgang'],
    ['독도', 'Dokdo'],
    ['경복궁', 'Gyeongbokgung'],
    ['무량수전', 'Muryangsujeon'],
    ['연화교', 'Yeonhwagyo'],
    ['극락전', 'Geungnakjeon'],
    ['안압지', 'Anapji'],
    ['남한산성', 'Namhansanseong'],
    ['화랑대', 'Hwarangdae'],
    ['불국사', 'Bulguksa'],
    ['현충사', 'Hyeonchungsa'],
    ['독립문', 'Dongnimmun'],
    ['오죽헌', 'Ojukheon'],
    ['촉석루', 'Chokseongnu'],
    ['종묘', 'Jongmyo'],
    ['다보탑', 'Dabotap']
];
