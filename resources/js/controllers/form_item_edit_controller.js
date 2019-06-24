import { Controller } from "stimulus"

export default class extends Controller {

    static targets = ['type']
    
    changeType() {
        this.data.set('type', this.typeTarget.value)
    }

    get type() {
        return this.data.get('type')
    }
    
    set type(value) {
        this.data.set('type', value)
    }
}