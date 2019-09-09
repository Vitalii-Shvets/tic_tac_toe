require('./bootstrap');

import BeginGameAjax from './game/begin_game_ajax';
import PlayingGamesAjax from './game/playing_games_ajax';


const beginGameAjax = new BeginGameAjax('#beginGame');

const playingGamesAjax = new PlayingGamesAjax('#click-table');







