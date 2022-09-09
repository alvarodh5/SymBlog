import {Controller} from '@hotwired/stimulus';

export default class extends Controller {

    search_toggle(event) {
        const searchHolder = $('.search-holder');

        if (searchHolder.hasClass('active')) {
            searchHolder.removeClass('active');
        } else {
            searchHolder.addClass('active');
        }
    }
}
