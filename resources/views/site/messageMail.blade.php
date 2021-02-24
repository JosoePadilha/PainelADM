@component('mail::message')
# Alteração de senha

{{$user->name}}, você solicitou alteração de senha diretamente pela plataforma!

@component('mail::panel')
Clique no botão abaixo para alterar!
@endcomponent

@component('mail::button', ['url' => $link])
Alterar senha
@endcomponent

Se você não solicitou esta ação, por favor despreze esta mensagem.<br><br>
Obrigado,<br>
{{ config('app.name') }}
@endcomponent
