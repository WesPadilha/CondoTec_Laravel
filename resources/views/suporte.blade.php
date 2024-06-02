<x-app-layout>
    <x-slot name="header">
    </x-slot>

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
            <h1>Bem-vindo, {{ $user->name }}</h1>
            <h1>Apartamento: {{ $user->numero_apartamento ?? 'Número de apartamento não registrado' }}</h1>
            <h2>Número de registro: {{ $user->id }}</h2>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        </div>
    </div>
    <br/><br/>
    <div class="corpo">
        <div class="suporte">
            <form class="solicitacao" action="{{ route('suporte.store') }}" method="post">
                @csrf
                <div class="solimarg">
                    <label for="categoria">Categoria:</label>
                    <br/>
                    <select class="opcoes" name="categoria" id="categoria">
                        <option></option>
                        <option>Água</option>
                        <option>Eletricidade</option>
                        <option>Garagem</option>
                        <option>Manutenção</option>
                        <option>Salão</option>
                    </select>
                </div>
                <div class="solimarg">
                    <label for="informacao">Informação:</label>
                    <br/>
                    <input class="opcoes" type="text" name="informacao" id="informacao" required>
                </div>
                <div class="solimarg">
                    <label for="descricao">Descrição:</label>
                    <br/>
                    <textarea class="opcoes" name="descricao" id="descricao" required></textarea>
                </div>
                <div class="solimarg">
                    <label for="carater">Caráter:</label>
                    <br/>
                    <select class="opcoes" name="carater" id="carater">
                        <option>Normal</option>
                        <option>Urgência</option>
                    </select>
                </div>
                <br/>
                <div class="solimarg">
                    <button class="botao" type="submit">Registrar</button>
                </div>
            </form>
            <div class="solicitacao-info">
                <p>Neste campo, você pode fazer suas solicitações conforme necessário para seu apartamento. Todas as requisições serão encaminhadas ao administrador, que tomará as devidas providências.</p>
                <br/>
                <p>Em caso de dúvidas, não hesite em entrar em contato conosco pelos seguintes meios:</p>
                <br/>
                <ul>
                    <li class="espacado2">Telefone:(42)99999-9999 ou (42)99999-9999</li>
                    <br/>
                    <li class="espacado">Email: administrador@condotec.coop.br</li>
                </ul>
            </div>
        </div>
    </div>
    <br/><br/>
<footer>
    <div>
        &copy; Politicas, Central de agendamentos, Redes Sociais, Trabalhe conosco - Todos direitos reservados - CondoTec
    </div>
</footer>

</x-app-layout>
