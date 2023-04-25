

<nav class="navbar navbar-expand-md navbar-dark ">
    <div class="container p-2">
     <a class="navbar-brand text-capitalize fw-bold" href="/">we fashion</a>
     <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
         aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="collapsibleNavId">
         <ul class="mt-2 ml-auto navbar-nav fw-semibold text-uppercase mt-lg-0">
             <li class="nav-item">
                 <a class="nav-link @if(Route::currentRouteName() == 'solde') active @endif"  href="{{ route('solde') }}">soldes</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link @if(Route::currentRouteName() == 'homme') active @endif" href="{{ route('homme') }}">homme</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link @if(Route::currentRouteName() == 'femme') active @endif" href="{{ route('femme') }}">femme</a>
             </li>
         </ul>
     </div>

    </div>
 </nav>