Feature: Romanize
    In order to get the romanization form of a Korean text
    As an user that has no idea of Korean
    I need to be able to use the romanizer

Scenario: Romanize a common Korean word
        Given I have the word "대학원생"
        When I run the romanization
        Then I should get "daehagwonsaeng"

Scenario: Romanize a complex place-name
        Given I have the word "대학로"
        When I run the romanization
        Then I should get "daehangno"

