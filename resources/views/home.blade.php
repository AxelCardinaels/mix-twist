@extends('app')
@section('content')

  @include("partials.filters")



  <section class="wrapper">
    <h2 class="content__title">Les Mixs les plus populaires</h2>

    @if (session('status'))
      <div class="alert__container alert--success">
          {{ session('status') }}
      </div>
    @endif

    <ul class="mix__list">
      @foreach($recettes as $recette)

        @if($recette->votes > 0)
          <li class="mix__item clearfix">
            <div class="mix__points">
              @include('forms/vote/upvote')
              <p class="points__total">{{$recette->votes}}</p>
              @include('forms/vote/downvote')
            </div>
            <div class="mix__infos">
              <div class="infos__container">
                <div class="container__align">
                  <h3 class="mix__title">
                    {{$recette->plat1}} + {{$recette->plat2}}
                  </h3>

                  <p class="mix__author">Proposé par <a href="{{url('/user/'.$recette->user->id)}}" title="Afficher le profil de {{$recette->user->name}}" class="author__link">{{$recette->user->name}}</a> {{$recette->date}}</p>
                </div>
              </div>
            </div>
          </li>
        @endif
      @endforeach
    </ul>
  </section>




@endsection
