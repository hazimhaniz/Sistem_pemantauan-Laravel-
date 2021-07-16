@component('mail::message')
# {{ addcslashes($subject , '#') }}

{!!
str_replace(
    array(
    	"[entity_name]"
    ),
    array(
    	$user->entity->name
    ),
    $template
)
!!}

<strong>{{ config('app.name') }}</strong>
@endcomponent
