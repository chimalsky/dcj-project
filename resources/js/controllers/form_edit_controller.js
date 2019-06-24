import { Controller } from "stimulus"

export default class extends Controller {
    initialize() {
        this.form = this.data.get('form')
    }
    
    addItem() {
        console.log('cool')
    }
    
}