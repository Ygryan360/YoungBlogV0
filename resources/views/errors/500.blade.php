@extends('layouts.error')
@section('title', 'Erreur interne du serveur')
@section('code', '500')
@section('message', "Oups ! Quelque chose s'est mal passé côté serveur. Veuillez réessayer plus tard ou me contacter
    si le problème persiste.")
