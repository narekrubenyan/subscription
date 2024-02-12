@component('mail::message')
    New Post on website 
    <div>
        {{ $title }}
        <hr>
        {{ $description }}
    </div>
@endcomponent