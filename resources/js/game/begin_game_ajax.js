class BeginGameAjax {
    constructor(formId) {
        $(formId).submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (idGame) {
                    console.log(window.location.href =`/playing/${idGame}`);
                },
                error: function (response) {
                    console.log(response);
                }
            });
        });
    }
}

export default BeginGameAjax ;
