@extends('admin.layout')

@section('content')
<h1 class="page-header">@lang('messages.page')</h1>

<a href="{{ route('admin.page.create') }}" class="btn fa fa-plus"> @lang('messages.create')</a>
<div class="">
  Показать: 
<div class="btn-group" role="group">
  <a href="{{ route('admin.page.index') }}" class="btn btn-{{$category ? 'default' : 'success'}}">Все</a>
  @foreach($cat as $item)
  <a href="?category={{$item->id}}" class="btn btn-{{$category == $item->id ? 'success' : 'default'}}" >{{$item->title}}</a>
  @endforeach
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th>@lang('messages.action')</th>
      <th>@lang('messages.title')</th>
      <th>@lang('messages.image')</th>
      <th>@lang('messages.enabled')</th>
      <th>@lang('messages.visits')</th>
    </tr>
  </thead>
  @foreach($page as $item)
    <tr>
      <td>
        <a href="{{ route('admin.page.show', ['id'=>$item->id]) }}" class="btn fa fa-eye"></a>
        <a href="{{ route('admin.page.edit', ['id'=>$item->id]) }}" class="btn fa fa-pencil"></a>
        <a href="{{ route('admin.page.destroy', ['id'=>$item->id]) }}" class="btn fa fa-trash-o delete-item"></a>
      </td>
      <td>{{$item->title}}</td>
      <td><img style="margin-right:15px;max-height:50px;" src="{{ $item->image }}"></td>
      <td>
        <a href="{{route('admin.ajax.status')}}" data-id="{{$item->id}}" data-model="Page" class="status fa fa-lg {{($item->enabled == 1) ? 'fa-check-circle text-success' : 'fa-times-circle text-danger'}}" aria-hidden="true"></a>
      </td>
      <td class="text-center">{{$item->visits}}</td>
    </tr>
  @endforeach
</table>


@endsection
