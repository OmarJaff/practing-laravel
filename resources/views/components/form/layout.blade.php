@props(['method' => 'POST', 'action', 'enctype' => 'application/x-www-form-urlencoded'])

<form method="{{$method}}" action="{{$action}}" class="rounded border-gray-100 bg-gray-50 p-4" enctype="{{$enctype}}">
@csrf

    {{$slot}}

</form>
