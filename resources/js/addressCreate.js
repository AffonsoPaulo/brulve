const cep = document.querySelector('input[name=zip]');

cep.addEventListener('input', () => {
    let number = cep.value.replace(/\D/g, '');
    cep.value = number;
    if (number.length === 8) {
        fetch(`https://viacep.com.br/ws/${number}/json/`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar CEP');
                }
                return response;
            })
            .then(response => response.json())
            .then(data => {
                if(data.erro) throw new Error('CEP não encontrado');
                document.querySelector('input[name=street]').value = data.logradouro;
                document.querySelector('input[name=district]').value = data.bairro;
                document.querySelector('input[name=city]').value = data.localidade;
                document.querySelector('input[name=state]').value = data.uf;
            });
    } else {
        document.querySelector('input[name=street]').value = '';
        document.querySelector('input[name=district]').value = '';
        document.querySelector('input[name=city]').value = '';
        document.querySelector('input[name=state]').value = '';
    }
})
