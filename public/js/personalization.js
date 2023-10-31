function confirmation_cancel(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');

    Swal.fire({
        title: "Tem a certeza de que deseja Cancelar?",
        text: "Não poderá reverter essa decisão!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Cancelar',
        cancelButtonText: 'Não',

    })
        .then((result) => {
            if (result.isConfirmed) {
                var descricao = result.value; // Obtém o valor da caixa de texto
                // Faça algo com a descrição, se necessário
                window.location.href = urlToRedirect;
            }
        });

}




function confirmation_cancel1(ev) {
    ev.preventDefault();
    var urlToRedirect = ev.currentTarget.getAttribute('href');

    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Salvo com sucesso',
        showConfirmButton: false,
        timer: 1500
    });
}

function teste(ev) {
    ev.preventDefault()

    swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar',
    }).then((result) => {
        if (result.isConfirmed) {
            swal.fire({
                input: 'textarea',
                inputLabel: 'Message',
                inputPlaceholder: 'Type your message here...',
                inputAttributes: {
                'aria-label': 'Type your message here'
            },
            showCancelButton: true})
        }
        else if (result.dismiss === Swal.DismissReason.cancel)
        {
            swal.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })

}




//
// const { value: text } = await Swal.fire({
//     input: 'textarea',
//     inputLabel: 'Message',
//     inputPlaceholder: 'Type your message here...',
//     inputAttributes: {
//         'aria-label': 'Type your message here'
//     },
//     showCancelButton: true
// })
//
// if (text) {
//     Swal.fire(text)
// }
