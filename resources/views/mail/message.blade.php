@component('mail::message')
# Форма обратной связи

Пользователь оставил заявку {{ $params['user'] }}

- Телефон: {{ $params['phone'] }}
- Email: {{ $params['email'] }}
- Текст сообщения {{ $params['message'] }}

@endcomponent