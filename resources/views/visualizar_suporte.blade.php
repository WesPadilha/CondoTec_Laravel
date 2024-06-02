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
        <h3 class="bv">Suas Solicitações:</h3>
        <br/><br/>
        <div class="pesquisa_box">
            <input class="pesquisa_text" type="text" id="searchProtocolo" placeholder="Pesquise por protocolo...">
            <button class="pesquisa_button" onclick="filterSupportRequests()"><img class="img" src="{{ asset('css/image/lupa.png') }}" width="35" height="35"/></button>
        </div>
        <br/><br/>
        <div class="att">
            <ul class="solicitacao">
                @foreach($suportes as $suporte)
                    <li class="lista">
                        Protocolo: {{ $suporte->protocolo }}<br>
                        Categoria: {{ $suporte->categoria }}<br>
                        Informação: {{ $suporte->informacao }}<br>
                        Descrição: {{ $suporte->descricao }}<br>
                        Caráter: {{ $suporte->carater }}<br>
                        <br/>
                        <button class="botao" onclick="editar('{{ $suporte->protocolo }}', '{{ $suporte->informacao }}', '{{ $suporte->descricao }}')">Editar</button>
                        <form action="{{ route('suporte.excluir', $suporte->protocolo) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="botao" type="submit">Excluir</button>
                        </form>
                    </li>
                    <br/>
                @endforeach
            </ul>
            <div id="editar_form" style="display: none;" class="solicitacao-att">
                <form class="lista" action="{{ route('suporte.atualizar', '') }}" method="POST" id="edit_form">
                    @csrf
                    <h2 class="bv">Atualização</h2>
                    <div>
                        <label for="informacao">Informação:</label>
                        <br/>
                        <input class="opcoes" type="text" name="informacao" id="edit_informacao">
                    </div>
                    <br/>
                    <div>
                        <label for="descricao">Descrição:</label>
                        <br/>
                        <textarea class="opcoes" name="descricao" id="edit_descricao"></textarea>
                    </div>
                    <br/>
                    <button class="botao" type="submit">Atualizar</button>
                </form>
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

<script>
function editar(protocolo, informacao, descricao) {
    document.getElementById('edit_informacao').value = informacao;
    document.getElementById('edit_descricao').value = descricao;
    document.getElementById('edit_form').action = "{{ route('suporte.atualizar', '') }}/" + protocolo;
    document.getElementById('editar_form').style.display = 'block';
}

function filterSupportRequests() {
    const input = document.getElementById('searchProtocolo');
    const protocoloValue = input.value.trim().toLowerCase();
    const supportList = document.querySelector('.solicitacao');

    if (!protocoloValue) {
        supportList.innerHTML = ''; // Limpa a lista se a busca estiver vazia
        return;
    }

    let filteredItems = '';
    Array.from(supportList.children).forEach(item => {
        const protocoloText = item.textContent.toLowerCase();
        if (protocoloText.includes(protocoloValue)) {
            filteredItems += item.outerHTML;
        }
    });

    supportList.innerHTML = filteredItems;
}

</script>
