@extends('base.structure_pub_min')

@section('styles') 
    <link rel="stylesheet" href="/assets/styles/landing.css"/> <link rel="stylesheet" href="/assets/styles/base.styles.css"/> 
@endsection

@section('content')
    <section id="content" class='content-wrapper'></section> <script type="text/javascript">/*global declarations*/ const page=@json($page); </script>
@endsection

@section('scripts')
    <script src="/assets/js/content-manager.js" type="text/javascript"></script><script src="/assets/js/landing.js" type="text/javascript"></script>
@endsection