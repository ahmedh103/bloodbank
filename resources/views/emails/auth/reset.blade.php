<x-mail::message>
# Introduction

Blood Bank Reset password

<x-mail::button :url="''">
Reset
</x-mail::button>
<p>Your Reset Code is : {{$code}}  </p>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
