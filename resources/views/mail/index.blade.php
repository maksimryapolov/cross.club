@component('mail::message')
# Вами оформлен заказ в магазине Cross-shop

Уважаемый {{ $params['user'] }}

Ваш заказ принят.

Стоимость заказа: {{ $params['price'] }}₽.

Состав заказ: {{ $params['product'] }}  &mdash; {{  $params['size'] }}

Спасибо за покупку!
@endcomponent