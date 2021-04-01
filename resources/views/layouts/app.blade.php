<!DOCTYPE html>
<html lang="fr-FR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/favicon.ico">
  @yield('head')
  <title>Plomberie sur Paris & Île de France</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="font-sans">
  @auth
    <div class="text-white md:flex p-3 md:px-12 xl:px-52 bg-gray-500 justify-center">
      <p class="block bg-indigo-900 px-3 py-2 rounded-md text-md font-medium capitalize">{{auth()->user()->name}}</p>
      <a href="{{route('about.edit',$id=1)}}" class="block hover:bg-purple-800 hover:underline px-3 py-2 rounded-md text-md font-medium">Modifier la présentation</a>
      <a href="{{route('posts')}}" class="block hover:bg-purple-800 hover:underline px-3 py-2 rounded-md text-md font-medium">Ajouter une prestation</a>
      <a href="{{route('file')}}" class="block hover:bg-purple-800 hover:underline px-3 py-2 rounded-md text-md font-medium">Ajouter une photo</a>
      <a href="{{route('contact')}}" class="block hover:bg-purple-800 hover:underline px-3 py-2 rounded-md text-md font-medium">Voir les contacts</a>
      <form action="{{route('logout')}}" method="post">
      @csrf
      <button type="submit" class="block hover:bg-red-900 hover:text-white hover:underline focus:bg-gray-800 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium">Deconnexion</a>                
      </form>
    </div>
  @endauth
  <header class="bg-c-d text-white font-bold px-3 md:flex md:px-12 xl:px-52 justify-between px-2 relative py-3 shadow-lg md:text-xl">
    <div class="flex">
      <img src="/img/lys-w.png" class="h-10 w-8" alt="Fleur de Lys">
      <h1 class="text-blue-300 uppercase px-3 my-auto relative font-serif">Atelier de <br class="md:hidden">la Forge Royale</h1>
      <img src="/img/lys-w.png" class="h-10 w-8" alt="Fleur de Lys">
    </div>
    <span class="my-auto">Contactez-nous <a href="tel:0143701120" class="text-blue-300 rounded hover:bg-gray-700 focus:bg-gray-700 p-1">01 43 70 11 20</a> 7j/7</span>
    <div class="absolute inset-y-0 right-0 flex md:items-center md:hidden">
      <button id="burger" class="inline-flex items-center justify-center p-6 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </header>
  <nav id="nav" class="bg-blue-400 hidden md:block shadow-lg text-lg">
    <ul class="px-2 md:flex md:justify-center md:items-center md:h-16 text-white">
          <li class="p-1"><a href="{{  route('home')  }}" class="block hover:bg-gray-900 hover:text-white hover:underline focus:bg-gray-900 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium @yield('home')">Accueil</a></li>
          <li class="p-1"><a href="{{  route('about')  }}" class="block hover:bg-gray-900 hover:text-white hover:underline focus:bg-gray-900 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium @yield('about')">Qui sommes-nous ?</a></li>
          <li class="p-1"><a href="{{  route('prestations')  }}" class="block hover:bg-gray-900 hover:text-white hover:underline focus:bg-gray-900 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium @yield('post')">Prestations</a></li>
          <li class="p-1"><a href="{{  route('realisations') }}" class="block hover:bg-gray-900 hover:text-white hover:underline focus:bg-gray-900 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium @yield('file')">Réalisations</a></li>
          <li class="p-1"><a href="{{  route('home')  }}#contact" class="block hover:bg-gray-900 hover:text-white hover:underline focus:bg-gray-900 focus:text-white focus:underline px-3 py-2 rounded-md text-md font-medium">Contactez-nous</a></li>
    </ul>
  </nav>
<main>
  @yield('content')
  <span id="toTop">&#129045;</span>
</main>

<footer class="p-3 mt-6 md:px-12 xl:px-52 md:flex md:flex-wrap justify-between bg-c-d text-white">
  <ul class="p-3 md:w-1/4">
    <p class="p-2 font-bold text-lg">Plan du site</p>
    <li class="py-1"><a href="{{ route('home') }}" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Accueil</a></li>
    <li class="py-1"><a href="{{ route('about') }}" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Qui sommes-nous ?</a></li>
    <li class="py-1"><a href="{{ route('prestations') }}" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Prestations</a></li>
    <li class="py-1"><a href="{{ route('realisations') }}" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Réalisations</a></li>
    <li class="py-1"><a href="{{ route('home') }}#contact" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Contactez-nous</a></li>
  </ul>
  <ul class="p-3 md:w-1/4">
    <li class="py-1"><a href="{{ route('prestations') }}" class="font-bold text-lg hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">Toutes nos prestations</a></li>
    @if(isset($links))
    @foreach ($links as $link)
      <li class="py-1"><a href="{{route('post',$link->id)}}" class="hover:text-blue-300 hover:underline focus:text-blue-300 focus:underline p-2">{{$link->title}}</a></li>
    @endforeach
    @endif
  </ul>
  <div class="p-3 md:w-1/4">
    <p class="p-2 font-bold text-lg">Rayon d'action</p>
    <ul class="px-2">
      <li class="py-1">Île-de-France</li>
      <li class="py-1">Val-de-Marne</li>
      <li class="py-1">Créteil</li>
      <li class="py-1">Maisons-Alfort</li>
      <li class="py-1">Paris</li>
    </ul>
    <ul class="px-2 flex flex-wrap">
      <p class="w-full">Arrondissements :</p>
      <li class="pr-3">1er,</li>
      <li class="pr-3">2ème,</li>
      <li class="pr-3">3ème,</li>
      <li class="pr-3">4ème,</li>
      <li class="pr-3">5ème,</li>
      <li class="pr-3">6ème,</li>
      <li class="pr-3">7ème,</li>
      <li class="pr-3">8ème,</li>
      <li class="pr-3">9ème,</li>
      <li class="pr-3">10ème,</li>
      <li class="pr-3">11ème,</li>
      <li class="pr-3">12ème,</li>
      <li class="pr-3">13ème,</li>
      <li class="pr-3">14ème,</li>
      <li class="pr-3">15ème,</li>
      <li class="pr-3">16ème,</li>
      <li class="pr-3">17ème,</li>
      <li class="pr-3">18ème,</li>
      <li class="pr-3">19ème,</li>
      <li class="pr-3">20ème</li>
    </ul>
  </div>
  <ul class="p-3 md:w-1/4">
    <p class="p-2 font-bold text-lg font-serif">Atelier de la Forge Royale</p>
    <li class="py-1"><a href="https://www.google.fr/maps/place/53+Rue+de+Montreuil,+75011+Paris" class="hover:text-blue-300 rounded hover:bg-gray-700 focus:text-blue-300 focus:bg-gray-700 p-2 font-bold">53 Rue de Montreuil <br> &nbsp; 75011 Paris</a></li>
    <li class="py-1"><a href="tel:0143701120" class="hover:text-blue-300 rounded hover:bg-gray-700 focus:text-blue-300 focus:bg-gray-700 p-2 font-bold">01 43 70 11 20</a> / <a href="tel:0617910147" class="hover:text-blue-300 rounded hover:bg-gray-700 focus:text-blue-300 focus:bg-gray-700 p-2 font-bold">06 17 91 01 47</a></li>
  </ul>
</footer>
<p class="p-3 bg-black text-white text-center w-full m-auto text-sm">&copy; Atelier de la Forge Royale, 75011 Paris</p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/myapp.js') }}"></script>

</body>
</html>