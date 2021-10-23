<?php
use App\Enums\SeatType;
?>
@extends('layouts.main')
@section('title', __('edit_event'))

@section('content')
    <h1 class="h3 text-gray-800 mb-4">{{ __('edit_event') }}</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('events') }}">{{ __('event_list') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('edit_event') }}</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('post_edit_event', ['event_id' => $event->event_id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="event_name"
                                class="col-md-4 col-form-label text-md-right">{{ __('event_name') }}</label>
                            <div class="col-md-6">
                                <input id="event_name" type="text"
                                    class="form-control @error('event_name') is-invalid @enderror" name="event_name"
                                    value="{{ $event->name }}" required>
                                @error('event_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('date') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                    name="date" value="{{ $event->date }}" required>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="place" class="col-md-4 col-form-label text-md-right">{{ __('place') }}</label>
                            <div class="col-md-6">
                                <input id="place" type="text" class="form-control @error('place') is-invalid @enderror"
                                    name="place" value="{{ $event->place }}" required>
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="open_at"
                                class="col-md-4 col-form-label text-md-right">{{ __('open_at') }}</label>
                            <div class="col-md-6">
                                <input id="open_at" type="time" class="form-control @error('open_at') is-invalid @enderror"
                                    name="open_at" value="{{ date('H:i', strtotime($event->open_at)) }}">
                                @error('open_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_at"
                                class="col-md-4 col-form-label text-md-right">{{ __('start_at') }}</label>
                            <div class="col-md-6">
                                <input id="start_at" type="time"
                                    class="form-control @error('start_at') is-invalid @enderror" name="start_at"
                                    value="{{ date('H:i', strtotime($event->start_at)) }}">
                                @error('start_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_at" class="col-md-4 col-form-label text-md-right">{{ __('end_at') }}</label>
                            <div class="col-md-6">
                                <input id="end_at" type="time" class="form-control @error('end_at') is-invalid @enderror"
                                    name="end_at" value="{{ date('H:i', strtotime($event->end_at)) }}">
                                @error('end_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expire_at"
                                class="col-md-4 col-form-label text-md-right">{{ __('expire_at') }}</label>
                            <div class="col-md-6">
                                <input id="expire_at" type="datetime-local"
                                    class="form-control @error('expire_at') is-invalid @enderror" name="expire_at"
                                    value="{{ date('Y-m-d\TH:i', strtotime($event->expire_at)) }}" required>
                                @error('expire_at')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seat_type"
                                class="col-md-4 col-form-label text-md-right">{{ __('seat_type') }}</label>
                            <div class="col-md-6">
                                <select name="seat_type" id="seat_type"
                                    class="form-control @error('seat_type') is-invalid @enderror"
                                    value="{{ old('seat_type') }}" disabled required>
                                    <option value="{{ SeatType::RESERVED }}" {{ $event->seat_type == SeatType::RESERVED ? "selected" : "" }}>{{ __('reserved') }}</option>
                                    <option value="{{ SeatType::UNRESERVED }}" {{ $event->seat_type == SeatType::UNRESERVED ? "selected": "" }}>{{ __('unreserved') }}</option>
                                </select>
                                @error('seat_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
