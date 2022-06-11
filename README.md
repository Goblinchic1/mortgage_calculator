<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Ипотечный калькулятор на laravel


2 сущности: Квартиры и Программы ипотеки

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

Имеются страницы просмотра списка элементов и страницы по добавлению, изменению квартир и программ ипотеки в базу. Формы добавления, изменения элемента содержат поля как в сущности.

Пересчет ежемесячных платежей по всем программам, привязанным к квартире в момент изменения элемента сущности Квартира или Программа ипотеки, так как на платеж влияет и цена, и условия ипотеки.

