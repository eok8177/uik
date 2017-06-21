@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.property')</h1>

<a href="{{ route('admin.property.create') }}" class="btn fa fa-plus"> @lang('messages.create')</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th>@lang('messages.action')</th>
      <th>@lang('messages.title')</th>
      <th>@lang('messages.image')</th>
      <th>@lang('messages.enabled')</th>
    </tr>
  </thead>
  @foreach($property as $item)
    <tr>
      <td>
        <a href="{{ route('admin.property.show', ['id'=>$item->id]) }}" class="btn fa fa-eye"></a>
        <a href="{{ route('admin.property.edit', ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
        <a href="{{ route('admin.property.destroy', ['id'=>$item->id]) }}" class="btn fa fa-trash-o delete-item"></a>
      </td>
      <td>{{$item->title}}</td>
      <td><img src="/resize/90/50/?img={{urlencode($item->image)}}" class="img-thumbnail"></td>
      <td>
        <a href="{{route('admin.ajax.status')}}" data-id="{{$item->id}}" data-model="Property" class="status fa fa-lg {{($item->enabled == 1) ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}}" aria-hidden="true"></a>
      </td>
    </tr>
  @endforeach
</table>


@endsection
