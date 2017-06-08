@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.slider')</h1>

<a href="{{ route('admin.slider.create') }}" class="btn fa fa-plus"> @lang('messages.create')</a>

<table class="table table-hover">
  <thead>
    <tr>
      <th>@lang('messages.action')</th>
      <th>@lang('messages.title')</th>
      <th>@lang('messages.slug')</th>
      <th>@lang('messages.image')</th>
      <th>@lang('messages.enabled')</th>
    </tr>
  </thead>
  @foreach($slider as $item)
    <tr>
      <td>
        <a href="{{ route('admin.slider.show', ['id'=>$item->id]) }}" class="btn fa fa-eye"></a>
        <a href="{{ route('admin.slider.edit', ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
        <a href="{{ route('admin.slider.destroy', ['id'=>$item->id]) }}" class="btn fa fa-trash-o delete-item"></a>
      </td>
      <td>{{$item->title}}</td>
      <td><a href="{{$item->slug}}">{{$item->slug}}</a></td>
      <td><img style="margin-right:15px;max-height:50px;" src="{{ $item->image }}"></td>
      <td>
        <a href="{{route('admin.ajax.status')}}" data-id="{{$item->id}}" data-model="Slider" class="status fa fa-lg {{($item->enabled == 1) ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}}" aria-hidden="true"></a>
      </td>
    </tr>
  @endforeach
</table>


@endsection
