function confirmation_cancel(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');

    Swal.fire({
        title: "Tem a certeza que deseja avançar?",
        text: "",
        icon: "success",
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Cancelar',
        cancelButtonText: 'Não',

    })
        .then((result) => {
            if (result.isConfirmed) {
                // var descricao = result.value; // Obtém o valor da caixa de texto
                var form = document.getElementById('create'); // Seleciona o formulário pelo ID
                form.submit(); // Submete o formulário

                // window.location.href = urlToRedirect;
            }
        });
}

//

function confirmation_cancel(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    var travelId = ev.currentTarget.getAttribute('name');
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
                console.log("ID da viagem:", travelId);
                console.log("Nome da Rota:", routeName);

                Swal.fire('Cancelamento feito com sucesso', '', 'info')
                    .then(() => {
                        $.ajax({
                            type: "POST",
                            url: `/${routeName}/update-description/${travelId}`,
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


// function confirmation_cancel1(ev) {
//     ev.preventDefault();
//     var urlToRedirect = ev.currentTarget.getAttribute('href');
//
//     Swal.fire({
//         position: 'top-end',
//         icon: 'success',
//         title: 'Salvo com sucesso',
//         showConfirmButton: false,
//         timer: 1500
//     });
// }

// function showSuccessToast(message) {
//     message.preventDefault()
//
//     const Toast = Swal.mixin({
//         toast: true,
//         position: 'center',
//         showConfirmButton: false,
//         timer: 700,
//         timerProgressBar: true,
//         didOpen: (toast) => {
//             toast.addEventListener('mouseenter', Swal.stopTimer);
//             toast.addEventListener('mouseleave', Swal.resumeTimer);
//         }
//     });
//
//     Toast.fire({
//         icon: 'success',
//         title: 'Login feito com sucesso'
//     }).then(() => {
//         // Redirecionar para a URL após o toast ser fechado
//         window.location.href = "/home";
//     });
// }


