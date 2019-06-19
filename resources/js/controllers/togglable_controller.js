import { Controller } from "stimulus"

export default class extends Controller {

    static targets = ['togglable']

    initialize() {
        if (!this.toggled) {
            this.data.delete('toggled')
        }
    }

    toggle() {
        if (!this.toggled)
            this.data.set('toggled', true);
        else 
            this.data.delete('toggled');
    }


    get toggled() {
        return this.data.get('toggled')
    }
}