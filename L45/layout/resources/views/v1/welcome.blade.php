@extends('v1.layouts.layout1')

@section('title','Home')



@section('content')
            <main>

                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis quibusdam culpa minima possimus corporis accusamus perferendis ratione iusto assumenda, tenetur hic sint quidem temporibus ea dolor? Voluptas qui nostrum cupiditate!

               @include('v1.partials.accordion')

            </main>
@endsection


@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
@endsection


@section('footer-scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
@endsection
