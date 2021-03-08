@extends('errors::minimal')

@section('title', __('Error en el servidor'))
@section('code', '500')
@section('message', __('Ha ocurrido un error en el servidor'))
