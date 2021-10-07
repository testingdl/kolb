@extends('layouts.app')


@section('content')
	<div class="w-100" style="margin-top: 40px;">
		<div class="row w-100 d-none d-lg-flex">
			<div class="col-2">
			</div>
			<div class="col-6">
				<div class="speech-bubble-right mt-0 text-justify">
					<p class="h4 font-italic mt-3">
						En la página se le pedirá que complete 12 oraciones. 
						Cada una tiene cuatro terminaciones. 
						Evalúe las terminaciones de cada oración de acuerdo a 
						lo que usted estima sería más apropiado en relación con 
						la manera en que usted actuaría al tener que aprender algo. 
						Trate de recordar algunas situaciones recientes en las que tuvo 
						que aprender algo, talvez en su trabajo.
					</p>
				</div>
				<div class="text-center">
					<a 
						href="{{ route('home') }}" 
						class="btn btn-primary btn-lg mt-4 btn-main"
						role="button"
					>
						Iniciar
					</a>	
				</div>
			</div>
			<div class="col-4 text-left">
				<img src="img/maritza.png" alt="Maritza Ochoa" class="h-75" />
			</div>
		</div>
		<div class="row w-100 d-flex d-lg-none">
			<div class="col-12">
				<div class="speech-bubble-bottom mt-0 text-justify">
					<p class="h4 font-italic mt-3">
						En la página se le pedirá que complete 12 oraciones. 
						Cada una tiene cuatro terminaciones. 
						Evalúe las terminaciones de cada oración de acuerdo a 
						lo que usted estima sería más apropiado en relación con 
						la manera en que usted actuaría al tener que aprender algo. 
						Trate de recordar algunas situaciones recientes en las que tuvo 
						que aprender algo, talvez en su trabajo.
					</p>
				</div>
			</div>
		</div>
		<div class="row w-100 d-flex d-lg-none">
			<div class="col-6 text-center">
				<a 
					href="{{ route('home') }}" 
					class="btn btn-primary btn-lg mt-4 btn-main"
					role="button"
				>
					Iniciar
				</a>	
			</div>			
			<div class="col-6 text-right">
				<img src="img/maritza.png" alt="Maritza Ochoa" class="h-50" />
			</div>
		</div>		
	</div>

@endsection

	<style>
		body {
			overflow-y: hidden;
			overflow-x: hidden;			
			background-image: url(img/bkg-1.jpg);
		}
	</style>