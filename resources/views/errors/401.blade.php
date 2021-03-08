@extends('errors::minimal')

@section('title', __('Carece de autorización'))
@section('code', '401')
@section('message', __('Su petición ha sido rechazada porque no tiene autorización para el sitio solicitado'))
