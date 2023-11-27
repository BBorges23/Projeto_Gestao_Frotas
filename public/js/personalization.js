/*Botão de "Criar" em qualquer Form*/
function confirmation_create_edit_form(ev) {
    ev.preventDefault();

    // Exibe um popup de confirmação usando a biblioteca SweetAlert
    Swal.fire({
        title: "Tem a certeza que deseja avançar?",
        text: "",
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Não',
        confirmButtonText: 'Sim',

    })
        .then((result) => {
            if (result.isConfirmed) {
                // Submete o formulário se o usuário confirmar
                var form = document.getElementById('submit'); // Seleciona o formulário pelo ID
                form.submit(); // Submete o formulário

            }
        });
}

/*Botão de "Cancelar" que em seguida lhe apresenta uma caixa de texto para deixar uma observação que ocorreu durante a viagem*/
function confirmation_cancel(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    var id = ev.currentTarget.getAttribute('name');
    var routeName = ev.currentTarget.getAttribute('id');

    Swal.fire({
        title: 'Tem a certeza que quer cancelar?',
        text: "Não vai ser possivel reverter esta situação",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Cancelar',
        cancelButtonText: 'Não',
    }).then(async (result) => {
        if (result.isConfirmed) {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Observações',
                inputPlaceholder: 'Introduza as observações aqui...',
                inputAttributes: {
                    'aria-label': 'Escreva a sua mensagem'
                },
                showCancelButton: true
            });

            if (text) {
                console.log("Texto da descrição:", text);
                console.log("ID da viagem:", id);
                console.log("Nome da Rota:", routeName);

                Swal.fire('Cancelamento feito com sucesso', '', 'info')
                    .then(() => {
                        $.ajax({
                            type: "POST",
                            url: `/${routeName}/cancel/${id}`,
                            data: {
                                text: text,
                                "_token": $("meta[name='csrf-token']").attr('content')
                            },
                            success: function (response) {
                                window.location.href = urlToRedirect;
                            }
                        });
                    });
            }
        }
    });
}

/*Botão de "Concluir" que em seguida lhe apresenta uma caixa de texto para deixar uma observação que ocorreu durante a viagem*/
function confirmation_conclude(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    var id = ev.currentTarget.getAttribute('name');
    var routeName = ev.currentTarget.getAttribute('id');

    Swal.fire({
        title: 'Tem a certeza que quer concluir?',
        text: "Não vai ser possivel reverter esta situação",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Concluir',
        cancelButtonText: 'Não',
    }).then(async (result) => {
        if (result.isConfirmed) {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Observações',
                inputPlaceholder: 'Introduza as observações aqui...',
                inputAttributes: {
                    'aria-label': 'Escreva a sua mensagem'
                },

                showCancelButton: true
            });

            if (text) {

                console.log("Texto da descrição:", text);
                console.log("ID da viagem:", id);
                console.log("Nome da Rota:", routeName);

                Swal.fire('Concluído com sucesso', '', 'success')
                    .then(() => {
                        $.ajax({
                            type: "POST",
                            url: `/${routeName}/conclude/${id}`,
                            data: {
                                text: text,
                                "_token": $("meta[name='csrf-token']").attr('content')
                            },
                            success: function (response) {
                                window.location.href = urlToRedirect;
                            }
                        });
                    });
            }
        }
    });
}

/*Botão de "Aceitar" na informação de uma Viagem para o Motorista*/
function confirmation_accept(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    var id = ev.currentTarget.getAttribute('name');
    var routeName = ev.currentTarget.getAttribute('id');

    Swal.fire({
        title: 'Tem a certeza que quer aceitar?',
        text: "Não vai ser possivel reverter esta situação",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não',
    }).then(async (result) => {
        if (result.isConfirmed) {

                console.log("ID da viagem:", id);
                console.log("Nome da Rota:", routeName);

                Swal.fire('Concluído com sucesso', '', 'success')
                    .then(() => {
                        $.ajax({
                            type: "POST",
                            url: `/${routeName}/accept/${id}`,
                            data: {
                                "_token": $("meta[name='csrf-token']").attr('content')
                            },
                            success: function (response) {
                                window.location.href = urlToRedirect;
                            }
                        });
                    });
        }
    });
}

/*Botão de "Comunicar Problemas" para o motorista comunicar problemas na Viagem */
function confirmation_problems(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    var id = ev.currentTarget.getAttribute('name');
    var routeName = ev.currentTarget.getAttribute('id');

    Swal.fire({
        title: 'Tem a certeza que quer notificar este problema?',
        text: "Não vai ser possivel reverter esta situação",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Comunicar',
        cancelButtonText: 'Não',
    }).then(async (result) => {
        if (result.isConfirmed) {
            const { value: text } = await Swal.fire({
                input: 'textarea',
                inputLabel: 'Observações',
                inputPlaceholder: 'Introduza as observações aqui...',
                inputAttributes: {
                    'aria-label': 'Escreva a sua mensagem'
                },
                showCancelButton: true
            });

            if (text) {
                console.log("Texto da descrição:", text);
                console.log("ID da viagem:", id);
                console.log("Nome da Rota:", routeName);

                Swal.fire('Problema reportado com sucesso', '', 'info')
                    .then(() => {
                        $.ajax({
                            type: "POST",
                            url: `/${routeName}/problems/${id}`,
                            data: {
                                text: text,
                                "_token": $("meta[name='csrf-token']").attr('content')
                            },
                            success: function (response) {
                                window.location.href = urlToRedirect;
                            }
                        });
                    });
            }
        }
    });
}




