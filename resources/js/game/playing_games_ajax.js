class PlayingGamesAjax {
    constructor(tableId) {

        $(() => {
            $(`${tableId} td:not(.player1, .player2)`).on('click', function () {
                const data = {
                    'x' : $(this).parent('tr').index(),
                    'y' : $(this).parent().children().index($(this)),
                };
                $.ajax({
                    url: `/api/games/${window.location.pathname.split("/").pop()}`,
                    type: 'patch',
                    data: data,
                    dataType: 'json',
                    context: this,
                    success: function (data) {
                        $(this).addClass(`player${data.hit}`);
                        $(this).off('click');
                        if(data.result)
                        {
                            $(`${tableId} td`).off('click');
                        }
                        console.log(data);
                    },
                });
            });
        });
    }
}

export default PlayingGamesAjax;
