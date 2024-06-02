<x-app-layout>
    <x-slot name="header">
    </x-slot>

</x-app-layout>

<header id="topo">
    <div class="container">
        <div>
            <img src="{{ asset('css/image/condominio1.png') }}" width="150" height="150" alt="CondoTEC"/>
            <h1 style="font-size: 48px;"><span class="condo">Condo</span><strong class="tec">TEC</strong></h1>
        </div>
        <ul class="menu">
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="{{ route('suporte') }}">Suporte</a></li>
            <li><a href="{{ route('visualizar_suporte') }}">Visualizar Suporte</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
            </li>
        </ul>
    </div>
</header>

<br/><br/>

<div class="corpo">
    <div class="conteudo">
        <h1>Bem vindo, {{ $user->name }}</h1>
        <h1>Apartamento: {{ $numero_apartamento }}</h1>
        <h2>Número de registro: {{ $user->id }}</h2>

        <div>
            @if ($numero_apartamento == 'Número de apartamento não registrado')
                <form action="{{ route('register_apartment') }}" method="post">
                    @csrf
                    <h4>Ainda não registrou o número do apartamento?</h4>
                    <br/>
                    <div>
                        <input name="numero_apartamento" placeholder="insira o número aqui">
                    </div>
                    <br/>
                    <div>
                        <button class="botao" type="submit">Registrar</button>
                    </div>
                </form>
            @endif
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
<br/><br/>
<div class="corpo">
    <div class="container-imagem">
        <img class="img" src="{{ asset('css/image/ap2.jpg') }}" width="400" height="250" alt="CondoTEC"/>
        <img class="img" src="{{ asset('css/image/ap1.jpg') }}" width="400" height="250" alt="CondoTEC"/>
    </div>
    <br/>
    <h1 class="bv">Bem-vindo ao CondoTec</h1>
    <br/>
    <p class="texto">Estamos entusiasmados em recebê-lo em nossa comunidade. O CondoTec é mais do que apenas um lugar para morar – é um espaço projetado para oferecer conforto, segurança e comodidade a todos os nossos residentes.</p>
    <br/>
    <p class="texto">Nosso site é uma ferramenta essencial para facilitar sua vida no condomínio. Aqui, você pode:</p>
    <br/>
    <li class="texto"><strong>Solicitar Suporte para o Apartamento:</strong> Encontre rapidamente a ajuda que precisa. Nossa equipe está pronta para resolver qualquer problema ou atender a qualquer necessidade que possa surgir em seu apartamento.</>
    <br/><br/>
    <li class="texto"><Strong>Visualizar Suas Solicitações:</Strong> Acompanhe o status das suas solicitações de suporte de forma prática e transparente. Veja o histórico de atendimentos e mantenha-se informado sobre cada etapa do processo.</>
    <br/><br/>
    <p class="texto">Agradecemos por escolher o CondoTec como seu lar. Esperamos que você aproveite todas as vantagens que nossa plataforma tem a oferecer. Seja bem-vindo e conte conosco para tornar sua experiência a melhor possível!</p>
</div>
<br/><br/>
<div class="quatro">
    <a class="item" href="{{ route('suporte') }}">
        <img class="imgbutton" src="{{ asset('css/image/soli.png') }}" width="250" height="250" alt="CondoTEC"/>
        <span>Suporte</span>
    </a>
    <a class="item" href="{{ route('visualizar_suporte') }}">
        <img class="imgbutton" src="{{ asset('css/image/visualizar.png') }}" width="250" height="250" alt="CondoTEC"/>
        <span>Visualizar Suporte</span>
    </a>
    <a class="item">
        <img class="imgbutton" src="{{ asset('css/image/garagem.png') }}" width="250" height="250" alt="CondoTEC"/>
        <span>Garagem</span>
    </a>
    <a class="item">
        <img class="imgbutton" src="{{ asset('css/image/financ.png') }}" width="250" height="250" alt="CondoTEC"/>
        <span>Financiamento</span>
    </a>
</div>

<br/><br/>
<footer>
    <div>
        &copy; Politicas, Central de agendamentos, Redes Sociais, Trabalhe conosco - Todos direitos reservados - CondoTec
    </div>
</footer>
