const search = document.querySelector('#search')
search.addEventListener('input', (e) => {
    let filter = document.querySelector('input[name=search_filter]:checked').value

    if (filter === 'cpf_cnpj') {
        search.setAttribute('maxlength', 18)
        let input = e.target,
            value = input.value;

        value = value.replace(/\D/g, '');

        if (value.length <= 11) {
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        } else {
            value = value.replace(/^(\d{2})(\d)/, '$1.$2');
            value = value.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
            value = value.replace(/\.(\d{3})(\d)/, '.$1/$2');
            value = value.replace(/(\d{4})(\d)/, '$1-$2');
        }

        input.value = value;
    } else if (filter === 'phone_number') {
        search.setAttribute('maxlength', 15)
        let input = e.target,
            value = input.value;

        value = value.replace(/\D/g, '');

        if (value.length <= 10) {
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
            value = value.replace(/(\d{4})(\d)/, '$1-$2');
        } else {
            value = value.replace(/(\d{2})(\d)/, '($1) $2');
            value = value.replace(/(\d{5})(\d)/, '$1-$2');
        }

        input.value = value;
    } else {
        search.setAttribute('maxlength', 255)
    }
})
