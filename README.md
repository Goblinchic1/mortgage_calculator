<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Ипотечный калькулятор на laravel

Тестовое задание по вакансии backend-developer
Задача: разработать заполнение квартир и программ ипотеки в базу, и пересчет платежей по ипотеке после срабатывания событий изменения элемента

Требования:
Язык программирования PHP. Фреймворк symfony, laravel, yii2.
Результат
публичная ссылка на сайт для проверки добавления элементов и пересчета платежей,
FTP-доступы для проверки кода.

Описание:

Создать 2 сущности: Квартиры и Программы ипотеки, связать их.

Сущность Квартиры имеет свойства:
Название
Тип квартиры
Цена
Программа ипотеки - множественная привязка элемента сущности программы ипотеки
Ежемесячный платеж по программе

Сущность Программа ипотеки:
Название
Процентная ставка - число с процентом
Максимальный срок - лет
Минимальный первоначальный взнос - проценты

Создать страницы просмотра списка элементов и страницы по добавлению, изменению квартир и программ ипотеки в базу. Формы добавления, изменения элемента содержат поля как в сущности.

Формулу расчета ипотеки можно взять из интернета, она типовая. https://www.raiffeisen.ru/wiki/formuly-dlya-samostoyatelnogo-rascheta-ipoteki/ 

https://mortgage-calculator.ru/%D1%84%D0%BE%D1%80%D0%BC%D1%83%D0%BB%D0%B0-%D1%80%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%B0-%D0%B8%D0%BF%D0%BE%D1%82%D0%B5%D0%BA%D0%B8/ 

Необходимо реализовать пересчет ежемесячных платежей по всем программам, привязанным к квартире в момент изменения элемента сущности Квартира или Программа ипотеки, так как на платеж влияет и цена, и условия ипотеки.

Визуал не имеет значение, главное работающие расчеты.
