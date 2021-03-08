@extends('errors::minimal')

@section('title', __('Solicitud denegada por el servidor'))
@section('code', '403')
@section('message', __( 'El servidor ha denegado su solicitud'))
